<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Identification;
use App\Models\User;
use Illuminate\Http\Request;

class AdminIdentyVerificationController extends Controller
{
    public function index() {
        $datas = Identification::with('withUser')->get();
        // $datas = Identification::with('withUser')->where('status', 'pending')->get();
        return view('admin.identification.index', compact('datas'));
    }
    public function pending() {
        $datas = Identification::with('withUser')->where('status', 'pending')->get();
        return view('admin.identification.index', compact('datas'));
    }
    public function approved() {
        $datas = Identification::with('withUser')->where('status', 'approved')->get();
        return view('admin.identification.index', compact('datas'));
    }
    public function rejected() {
        $datas = Identification::with('withUser')->where('status', 'rejected')->get();
        return view('admin.identification.index', compact('datas'));
    }

    public function approvedStatus($id) {
        $data = Identification::where('id', $id)->first();
        if ($data && $data->status == 'pending') {
            $data->update([
                'status' => 'approved'
            ]);
            User::where('id', $data->user_id)->update([
                'verify_status' => 'Verified'
            ]);
            return back()->with('success', 'Approved Successfully');
        }
    }

    public function rejectedStatus($id) {
        $data = Identification::where('id', $id)->first();
        if ($data && $data->status == 'pending') {
            $data->update([
                'status' => 'rejected'
            ]);
            return back()->with('success', 'Rejected Successfully');
        }
    }

    public function delete($id) {
        $data = Identification::where('id', $id)->first();
        if ($data) {
            unlink(base_path($data->nid_front));
            unlink(base_path($data->nid_back));
            unlink(base_path($data->proof_address));
            unlink(base_path($data->selfe));
            $data->delete();
            return back()->with('success', 'Deleted Successfully');
        }
    }



    public function banUsers () {
        $all_users = User::with('')->where([['role', 'user'], ['status', 'active']])->get();
        return view('admin.users.index', compact('all_users', ''));
    }
    
}
