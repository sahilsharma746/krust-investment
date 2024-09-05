<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use App\Models\Identification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class UserProfileController extends Controller
{
    public function personalInfo() {
        $user = Auth::user();
        $user_data = User::with('addresses')->where([['role', 'user'], ['id', $user->id]])->first();
        $countries = config('countries');
        
        return view('users.profile.personal-info', compact('user_data', 'countries'));

    }

    public function personalInfoUpdate(Request $request) {

        $user = Auth::user();

        $request->validate([
            'first_name' => 'required | string | max:255',
            'last_name' => 'required | string | max:255',
            'email' => 'required | email | unique:users,email,'.$user->id.',id',
            'phone' => 'required',
            'country' => 'required',
        ]);
        
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        UserAddress::where('user_id', $user->id)
                ->update(['country' => $request->country]);

        session()->put('user_name', "{$request->first_name} {$request->last_name}");


        return back()->with('success', 'Updated successfully');

    }


    public function avatarUpdate(Request $request) {
        $user = Auth::user();
        
        $request->validate([
            'avatar' => 'required | image | mimes:jpg,png,jpeg'
        ]);

        $base_path = public_path('uploads/user_avatar/');
    
        if (!File::exists($base_path)) {
            File::makeDirectory($base_path, 0755, true);
        }

        $file = $request->file('avatar');
        $file_name = time() . '-user-avatar-' . $user->id . '.' . $file->getClientOriginalExtension();
        $file->move($base_path, $file_name);

        User::where('id', $user->id)
                ->update(['avatar' => $file_name]);


return back()->with(['success' => 'Avatar updated successfully', 'user' => $user]);
    }


    public function verification() {
        $identification = Identification::where('user_id', auth()->user()->id)->first();
        return view('users.profile.verification', compact('identification'));
    }

    public function securitySetting() {
        return view('users.profile.security');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'password' => 'required | string | min:6 | max:16',
            'confirmation_password' => 'required_with:password|same:password'
        ]);
        $user = User::where('id', auth()->user()->id)->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->with('success', 'Updated Successfully');
    }

    public function updateSettings(Request $request)
    {
        $user = auth()->user(); 

        $settings = $request->only(['dashboard_currency', 'profile_language']);

        foreach ($settings as $optionName => $optionValue) {
            UserSetting::updateOrCreate(
                ['user_id' => $user->id, 'option_name' => $optionName],
                ['option_value' => $optionValue]
            );
        }

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

    

    public function verificationUpdate (Request $request) {
        $request->validate([
            'nid_front' => 'required | image | mimes:jpg,png,jpeg',
            'nid_back' => 'required | image | mimes:jpg,png,jpeg',
            'proof_address' => 'required | image | mimes:jpg,png,jpeg',
            'selfe' => 'required | image | mimes:jpg,png,jpeg',
        ]);

        $path = 'uploads/';

        $file1 = $request->file('nid_front');
        $fileName1 = time().'-nid_front.'.auth()->user()->id.'.'.$file1->getClientOriginalExtension();
        $request->nid_front->move($path, $fileName1);

        $file2 = $request->file('nid_back');
        $fileName2 = time().'-nid_back.'.auth()->user()->id.'.'.$file2->getClientOriginalExtension();
        $request->nid_back->move($path, $fileName2);

        $file3 = $request->file('proof_address');
        $fileName3 = time().'-proof_address.'.auth()->user()->id.'.'.$file3->getClientOriginalExtension();
        $request->proof_address->move($path, $fileName3);

        $file4 = $request->file('selfe');
        $fileName4 = time().'-selfe.'.auth()->user()->id.'.'.$file4->getClientOriginalExtension();
        $request->selfe->move($path, $fileName4);

        Identification::insert([
            'user_id' => auth()->user()->id,
            'nid_front' => $path.$fileName1,
            'nid_back' => $path.$fileName2,
            'proof_address' => $path.$fileName3,
            'selfe' => $path.$fileName4,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success', 'Submited Successfully');

    }
}
