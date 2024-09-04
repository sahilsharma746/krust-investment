<?php

use App\Http\Controllers\Admin\AdminDepositController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminIdentyVerificationController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminWithdrawController;
use App\Http\Controllers\Auth\LoginController;

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserDepositController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserMarktWatchController;
use App\Http\Controllers\User\UserPersoanlInformation;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserWithdrawController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;



Auth::routes();

Route::get('/reboot', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    Artisan::call('view:cache');
    // composer dump-autoload
    dd('Done');
});

Auth::routes(['reset' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/about-us', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/account-plan', [FrontendController::class, 'accountPlan'])->name('frontend.accountPlan');
Route::get('/faq', [FrontendController::class, 'faq'])->name('frontend.faq');


// frontend users dashboard urls 
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'is_user']], function () {
    
    Route::get('/dashboard', [UserHomeController::class, 'index'])->name('user.dashboard');
    Route::get('/market-news', [UserHomeController::class, 'news'])->name('user.market.news');
    Route::get('/persoanl-information', [UserProfileController::class, 'personalInfo'])->name('user.personal.info');
    Route::post('/persoanl-information', [UserProfileController::class, 'personalInfoUpdate'])->name('user.personal.info.update');
    Route::post('/avatar', [UserProfileController::class, 'avatarUpdate'])->name('user.profile.avatarUpdate');
    Route::get('/verification', [UserProfileController::class, 'verification'])->name('user.profile.verification');
    Route::post('/verification', [UserProfileController::class, 'verificationUpdate'])->name('user.profile.verificationUpdate');
    Route::get('/security-setting', [UserProfileController::class, 'securitySetting'])->name('user.profile.securitySetting');
    Route::post('/update-password', [UserProfileController::class, 'updatePassword'])->name('user.profile.updatePassword');

    Route::get('/market-watch', [UserMarktWatchController::class, 'index'])->name('user.marketWatch.index');

    Route::get('/deposit-method', [UserDepositController::class, 'index'])->name('user.deposit.getway');
    Route::post('/deposit-store/{id}', [UserDepositController::class, 'store'])->name('user.deposit.store');


    Route::get('/withdraw', [UserWithdrawController::class, 'index'])->name('user.withdraw.index');
    Route::post('/withdraw', [UserWithdrawController::class, 'store'])->name('user.withdraw.store');

});




Route::get('/admin', [AdminHomeController::class, 'adminLogin'])->name('admin.login');

Route::group(['prefix' => 'admin', 'middleware' => ['is_admin']], function () {

    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/all-user', [AdminUserController::class, 'index'])->name('admin.user.index');
    Route::get('/active-users', [AdminUserController::class, 'activeUsers'])->name('admin.user.activeUsers');
    Route::get('/kyc-unverified', [AdminUserController::class, 'kycUnverified'])->name('admin.user.kycUnverified');
    Route::get('/kyc-verified', [AdminUserController::class, 'kycVerified'])->name('admin.user.kycVerified');
    Route::get('/email-verified', [AdminUserController::class, 'emailVerified'])->name('admin.user.emailVerified');
    Route::get('/phone-verified', [AdminUserController::class, 'phoneVerified'])->name('admin.user.phoneVerified');
    Route::get('/banned-users', [AdminUserController::class, 'bannedVerified'])->name('admin.user.bannedVerified');



    Route::get('/details/{user}', [AdminUserController::class, 'details'])->name('admin.user.details');
    Route::get('/user_verification/{user}', [AdminUserController::class, 'user_verification'])->name('admin.user.details');
    Route::get('/editBalance/{user}', [AdminUserController::class, 'editBalance'])->name('admin.user.editBalance');
    Route::post('/updateBalance/{user}', [AdminUserController::class, 'updateBalance'])->name('admin.user.updateBalance');
    Route::get('/banUser/{user}', [AdminUserController::class, 'banUser'])->name('admin.user.banUser');
    Route::get('/deleteUser/{user}', [AdminUserController::class, 'deleteUser'])->name('admin.user.deleteUser');

    // Route::get('/form', [AdminUserController::class, 'form'])->name('form');

    Route::get('/verification', [AdminIdentyVerificationController::class, 'index'])->name('admin.identyVerification.index');
    Route::get('/verification/pending', [AdminIdentyVerificationController::class, 'pending'])->name('admin.identyVerification.pending');
    Route::get('/verification/approved', [AdminIdentyVerificationController::class, 'approved'])->name('admin.identyVerification.approved');
    Route::get('/verification/rejected', [AdminIdentyVerificationController::class, 'rejected'])->name('admin.identyVerification.rejected');
    Route::get('/verification/{id}/approvedStatus', [AdminIdentyVerificationController::class, 'approvedStatus'])->name('admin.identification.approvedStatus');
    Route::get('/verification/{id}/rejectedStatus', [AdminIdentyVerificationController::class, 'rejectedStatus'])->name('admin.identification.rejectedStatus');
    Route::get('/verification/{id}/delete', [AdminIdentyVerificationController::class, 'delete'])->name('admin.identification.delete');

    Route::get('/deposits', [AdminDepositController::class, 'index'])->name('admin.deposit.index');
    Route::get('/deposit/pending', [AdminDepositController::class, 'pending'])->name('admin.deposit.pending');
    Route::get('/deposit/approved', [AdminDepositController::class, 'approved'])->name('admin.deposit.approved');
    Route::get('/deposit/rejected', [AdminDepositController::class, 'rejected'])->name('admin.deposit.rejected');
    Route::get('/deposit/{id}/approvedStatus', [AdminDepositController::class, 'approvedStatus'])->name('admin.deposit.approvedStatus');
    Route::get('/deposit/{id}/rejectedStatus', [AdminDepositController::class, 'rejectedStatus'])->name('admin.deposit.rejectedStatus');
    Route::get('/deposit/{id}/delete', [AdminDepositController::class, 'delete'])->name('admin.deposit.delete');


    Route::get('/withdraw', [AdminWithdrawController::class, 'index'])->name('admin.withdraw.index');
    Route::get('/withdraw/pending', [AdminWithdrawController::class, 'pending'])->name('admin.withdraw.pending');
    Route::get('/withdraw/approved', [AdminWithdrawController::class, 'approved'])->name('admin.withdraw.approved');
    Route::get('/withdraw/rejected', [AdminWithdrawController::class, 'rejected'])->name('admin.withdraw.rejected');
    Route::get('/withdraw/{id}/approvedStatus', [AdminWithdrawController::class, 'approvedStatus'])->name('admin.withdraw.approvedStatus');
    Route::get('/withdraw/{id}/rejectedStatus', [AdminWithdrawController::class, 'rejectedStatus'])->name('admin.withdraw.rejectedStatus');
    Route::get('/withdraw/{id}/delete', [AdminWithdrawController::class, 'delete'])->name('admin.withdraw.delete');

});


