<?php

use App\Events\forceRefresh;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AdIssueController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\MarketerController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MediaOwnerController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\ScreenGroupController;
use App\Http\Controllers\SequenceController;
use App\Http\Controllers\Socialite\GoogleAuthController;
use App\Http\Controllers\UploadController;
use App\Models\Category;
use App\Models\Screen;
use App\Models\ScreenGroup;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Module: General Purposes Routes
 * #####################################################################################################################
 * */

Auth::routes();

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/forceRefresh/allScreens', function () {
    if (auth()->guard('admin')->check()) {
        event(new forceRefresh());
    }
});

Route::get('/CreateAd', function () {
    return view('layout.advertiser.ad_create', [
        "categories" => Category::all()
    ]);
});

Route::get('/terms', function () {
    return view('layout.terms_and_conditions');
})->name('terms_and_conditions');

Route::get('/help', function () {
    return view('layout.help');
})->name('help');

Route::get('/email', function () {
    return view('emails.email_layout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

/*
 * Module: MediaOwner
 * #####################################################################################################################
 * */

Route::prefix('MediaOwner')->group(callback: function () {

    Route::get('/register', [MediaOwnerController::class, 'registerPage'])->name('MORegister');
    //
    Route::post('/register', [MediaOwnerController::class, 'register']);
    //
    Route::get('/login', [MediaOwnerController::class, 'loginPage'])->name('MOLogin')->middleware('guest');
    //
    Route::post('/login', [MediaOwnerController::class, 'login']);
    //
    Route::post('/logout', [MediaOwnerController::class, 'logout'])->name('media_owner.logout');
    //
    Route::get('/dashboard', [MediaOwnerController::class, 'dashboard'])->name('MODashboard')->middleware('auth:media_owner');
    //
    Route::get('/screens', [MediaOwnerController::class, 'screens'])->name('MOScreens')->middleware('auth:media_owner');
    //
    Route::get('/sequence', [MediaOwnerController::class, 'sequence'])->name('MOsequence')->middleware('auth:media_owner');
    //
    Route::get('/template', [MediaOwnerController::class, 'template'])->name('MOtemplate')->middleware('auth:media_owner');
    //
    Route::get('/media', [MediaOwnerController::class, 'media'])->name('MOmedia')->middleware('auth:media_owner');
    //
    Route::get('/media/folders/{parentFolderId}', [MediaOwnerController::class, 'mediaFolders'])->name('media_owner.media_folders')->middleware('auth:media_owner');
    //
    Route::get('/settings', [MediaOwnerController::class, 'settings'])->name('MOSettings')->middleware('auth:media_owner');
    //
    Route::get('/scanQR', [MediaOwnerController::class, 'scanQR'])->name('scanQR')->middleware('auth:media_owner');
    //
    Route::get('/wallet', [MediaOwnerController::class, 'wallet'])->name('wallet')->middleware('auth:media_owner');
    //
    Route::get('/generate-media-owner-contract/{id}', [MediaOwnerController::class, 'generateMediaOwnerContract'])->name('media_owner.generate_media_owner_contract')->middleware('auth:media_owner');
    //
    Route::post('/create-folder/', [MediaOwnerController::class, 'createFolder'])->name('media_owner.create_folder')->middleware('auth:media_owner');
    //
    Route::post('/create-child-folder/{parentFolderId}', [MediaOwnerController::class, 'createChildFolder'])->name('media_owner.create_child_folder')->middleware('auth:media_owner');
    //
    Route::get('/media/folders/{id}', [MediaOwnerController::class, 'getFolder'])->name('media_owner.get_folder')->middleware('auth:media_owner');
    //
    Route::post('/upload-media', [UploadController::class, 'uploadMedia'])->name('media_owner.upload_media')->middleware('auth:media_owner');
    //
    Route::post('/upload-media/{id}', [UploadController::class, 'uploadMedia'])->name('media_owner.upload_child_media')->middleware('auth:media_owner');
    //
    Route::post('/remove-media', [MediaOwnerController::class, 'removeMedia'])->name('media_owner.remove_media')->middleware('auth:media_owner');
    //
    Route::get('/get-screen-group-and-its-screens/{id}', [ScreenGroupController::class, 'getScreenGroupAndItScreens'])->name('media_owner.get_screen_group_and_its_screens')->middleware('auth:media_owner');
    //
    Route::post('/createScreenGroup', [ScreenGroupController::class, 'createScreenGroup'])->name('media_owner.createScreenGroup')->middleware('auth:media_owner');
    //
    Route::post('/update-screen-group/{id}', [ScreenGroupController::class, 'update'])->name('media_owner.update_screen_group')->middleware('auth:media_owner');
    //
    Route::post('/store-sequence', [SequenceController::class, 'storeSequence'])->name('media_owner.store_sequence')->middleware('auth:media_owner');
    //
    Route::get('/update-sequence/edit/{id}', [SequenceController::class, 'editSequencePageView'])->name('media_owner.edit_sequence')->middleware('auth:media_owner');
    //
    Route::post('/update-sequence/{id}', [SequenceController::class, 'updateSequence'])->name('media_owner.update_sequence')->middleware('auth:media_owner');
    //
    Route::post('/delete-sequence/{id}', [SequenceController::class, 'deleteSequence'])->name('media_owner.delete_sequence')->middleware('auth:media_owner');
    //
    Route::get('/prepare-folder-tree', [FolderController::class, 'prepareFolderTree'])->name('media_onwer.prepare_folder_tree')->middleware('auth:media_owner');
    //
    Route::post('/update-screen/{screen_id}', [ScreenController::class, 'updateScreen'])->name('media_onwer.update_screen')->middleware();
    //
    Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirectToGoogle'])->name('media_onwer.redirect_to_google')->middleware('auth:media_owner');
    //
    Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('media_onwer.handle_google_callback')->middleware('auth:media_owner');
    //
    Route::get('/screen-active-group-check', [Screen::class, 'checkIsScreenActiveInAnotherScreenGroup'])->name('media_onwer.screen_active_group_check')->middleware('auth:media_owner');
    //
    Route::get('/fetch-screen-group-media-info/{id}', [ScreenGroupController::class, 'fetchScreenGroupSequenceMediaWithTheirDuration'])->name('media_onwer.fetch_screen_group_media_info')->middleware('auth:media_owner');
    //
    Route::get('/delete-screen-group/{id}', [ScreenGroupController::class, 'destroy'])->name('media_onwer.delete_screen_group')->middleware('auth:media_owner');
    //
    Route::post('/save-ad-issue', [AdIssueController::class, 'store'])->name('media_owner.store_ad_issue')->middleware('auth:media_owner');
    //
    Route::post('/edit-account-info/{id}', [MediaOwnerController::class, 'editAccountInfo'])->name('media_owner.edit_account_info')->middleware('auth:media_owner');;
    //
    Route::post('/change-password/{id}', [MediaOwnerController::class, 'changePassword'])->name('media_owner.change_password')->middleware('auth:media_owner');
    //
    Route::post('/save-card/{id}', [CardController::class, 'saveCard'])->name('media_owner.save_card')->middleware('auth:media_owner');
    //
    Route::post('/make-card-primary/{id}', [CardController::class, 'makeCardPrimary'])->name('media_owner.make_card_primary')->middleware('auth:media_owner');;
    //
    Route::post('/delete-card/{id}', [CardController::class, 'deleteCard'])->name('media_owner.delete_card')->middleware('auth:media_owner');;
    //
    Route::post('/delete-media/{id}', [MediaController::class, 'deleteMedia'])->name('media_owner.delete_media')->middleware('auth:media_owner');
    //
    Route::post('/rename-media/{id}', [MediaController::class, 'renameMedia'])->name('media_owner.rename_media')->middleware('auth:media_owner');
    //
    Route::get('/download-media/{id}', [MediaController::class, 'downloadMedia'])->name('media_owner.download_media')->middleware('auth:media_owner');
    //
    Route::post('/rename-folder/{id}', [FolderController::class, 'renameFolder'])->name('media_owner.rename_folder')->middleware('auth:media_owner');
    //
    Route::post('/delete-folder/{id}', [FolderController::class, 'deleteFolder'])->name('media_owner.delete_folder')->middleware('auth:media_owner');
    //
    Route::post('/move-folder/{id}', [FolderController::class, 'moveFolder'])->name('media_owner.move_folder')->middleware('auth:media_owner');
    //
    Route::get('/download-folder/{id}', [FolderController::class, 'downloadFolder'])->name('media_owner.download_folder')->middleware('auth:media_owner');
    //
    Route::post('/move-media/{id}', [MediaController::class, 'moveMedia'])->name('media_owner.move_media')->middleware('auth:media_owner');
    //
    Route::get('/get-folders-ajax/{id}', [FolderController::class, 'getFoldersByFolderId'])->name('media_owner.get_folders')->middleware('auth:media_owner');
    //
    Route::get('/get-media-ajax/{id}', [FolderController::class, 'getMediaByFolderId'])->name('media_owner.get_media')->middleware('auth:media_owner');
    //
    Route::get('/get-folders-path-ajax/{id}', [FolderController::class, 'getFoldersPath'])->name('media_owner.get_folders_path')->middleware('auth:media_owner');
    //
    Route::get('/get-parent-folder-id-ajax/{id}', [FolderController::class, 'getParentFolderId'])->name('media_owner.get_parent_folder_id')->middleware('auth:media_owner');
    //
    Route::get('/get-main-folder-content-ajax', [FolderController::class, 'getMainFolderContent'])->name('media_owner.get_main_folder_content')->middleware('auth:media_owner');
    //
    Route::post('/choose-plan', [PlanController::class, 'choosePlan'])->name('media_owner.choose_plan')->middleware('auth:media_owner');
    //
    Route::post('/cancel-plan/{id}', [PlanController::class, 'cancelPlan'])->name('media_owner.cancel_plan')->middleware('auth:media_owner');
    //
    Route::post('/upgrade-plan/{id}', [PlanController::class, 'updatePlan'])->name('media_owner.upgrade_plan')->middleware('auth:media_owner');
    //
    Route::get('/check-subscription/{id}', [PlanController::class, 'checkIfHasPlanSubscription'])->name('media_owner_check_subscription')->middleware('auth:media_owner');
    //
    Route::post('/change-screen-orientation/{id}', [ScreenController::class, 'changeScreenOrientation'])->name('media_owner.change_screen_orientation')->middleware('auth:media_owner');
    //
    Route::post('/change-screen-rotation/{id}', [ScreenController::class, 'changeScreenRotation'])->name('media_owner.change_screen_rotation')->middleware('auth:media_owner');
    //
    Route::get('/forgot-password', [ForgotPasswordController::class, 'renderForgotPasswordPage'])->name('media_owner.render_forgot_password_page')->middleware('guest');
    //
    Route::post('/forgot-password', [ForgotPasswordController::class, 'forgotPassword'])->name('media_owner.forgot_password')->middleware('guest');;
    //
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    //
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
    //
    Route::get('/check-is-screen-in-one-group/{screenId}', [ScreenController::class, 'checkIsScreenInOneGroup'])->name('media_owner.check_is_screen_in_one_group');
    //
    Route::get('/relink_screen_view/{screenId}', [ScreenController::class, 'linkScreenView'])->name('relinkScreenView')->middleware('auth:media_owner');;
    //
    Route::get('/relink_screen/{enteredScreenID}/{actualScreenID}', [ScreenController::class, 'linkScreen'])->name('relinkScreen')->middleware('auth:media_owner');;
    Route::get('/relink_screen_qr/{actualScreenID}', [ScreenController::class, 'linkScreenQR'])->name('relinkScreenQR')->middleware('auth:media_owner');;
});

/*
 * Module: Advertiser
 * #####################################################################################################################
 * */

Route::prefix('Advertiser')->group(function () {
    Route::get('/register', [AdvertiserController::class, 'registerPage'])->name('ADRegister');
    Route::post('/register', [AdvertiserController::class, 'register']);
    Route::get('/login', [AdvertiserController::class, 'loginPage'])->name('ADLogin')->middleware('guest');
    Route::post('/login', [AdvertiserController::class, 'login']);
    Route::post('/logout', [AdvertiserController::class, 'logout'])->name('advertiser.logout');
    Route::get('/dashboard', [AdvertiserController::class, 'dashboard'])->name('advertiser.dashboard')->middleware('auth:advertiser');
    Route::get('/wallet', [AdvertiserController::class, 'wallet'])->name('advertiser.wallet')->middleware('auth:advertiser');
    Route::get('/summary', [AdvertiserController::class, 'summary'])->name('advertiser.summary')->middleware('auth:advertiser');
});

/*
 * Module: Screen
 * #####################################################################################################################
 * */

Route::prefix('newScreen')->group(function () {
    Route::get('/{screenId}', [ScreenController::class, 'newScreenEvent'])->name('newScreenEvent')->middleware('auth:media_owner');
    Route::post('/{screenId}', [ScreenController::class, 'store'])->middleware('auth:media_owner');
});


Route::prefix('screen')->group(function () {
    Route::post('/getScreensData', [ScreenController::class, 'getScreensData'])->name('getScreensData');
    Route::get('/', [ScreenController::class, 'show'])->name('screen.show');
});

Route::get('/ns', [ScreenController::class, 'newScreenPage'])->name('newScreen');
Route::get('/rs/{screenId}', [MediaOwnerController::class, 'scanQRRelink'])->name('scanQRRelink');

/*
 * Module: Advertiser
 * #####################################################################################################################
 * */

Route::prefix('ad')->group(function () {
    Route::get('/create', [AdController::class, 'create'])->name('ad.create')->middleware('auth:advertiser');
    Route::post('/store', [AdController::class, 'store'])->name('ad.store')->middleware('auth:advertiser');
    Route::post('/uploadVideo', [AdController::class, 'uploadVideo'])->name('ad.uploadVideo')->middleware('auth:advertiser');
    Route::post('/approveAd/{ad_id}', [AdController::class, 'approveAd'])->name('approveAd');
    Route::post('/rejectAd/{ad_id}', [AdController::class, 'rejectAd'])->name('rejectAd');
});

/*
 * Module: Admin
 * #####################################################################################################################
 * */

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index')->middleware('auth:admin');
    Route::get('/login', [AdminController::class, 'loginPage'])->name('AdminLogin')->middleware('guest');
    Route::post('/login', [AdminController::class, 'login']);
    Route::get('/register', [AdminController::class, 'registerPage'])->name('AdminRegister');
    Route::post('/register', [AdminController::class, 'register']);
    Route::post('/charge', [AdminController::class, 'charge'])->name('admin.charge')->middleware('auth:admin');
    Route::get('/wallets', [AdminController::class, 'getWallets'])->name('admin.wallets')->middleware('auth:admin');
    Route::get('/wallet', [AdminController::class, 'wallets'])->name('admin.wallets')->middleware('auth:admin');
    Route::get('/chargeWallets', [AdminController::class, 'chargeWallets'])->name('admin.chargeWallets')->middleware('auth:admin');
    Route::get('/inbox', [AdminController::class, 'inbox'])->name('admin.inbox')->middleware('auth:admin');
    Route::get('/subscriptions', [AdminController::class, 'subscriptions'])->name('admin.subscriptions')->middleware('auth:admin');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings')->middleware('auth:admin');
    Route::get('/{id}', [AdvertiserController::class, 'getAdvertiser'])->name('advertiser.get_advertiser')->middleware('auth:admin');

});

/*
 * Module: Markter
 * #####################################################################################################################
 * */

Route::prefix('marketer')->group(function () {
    Route::post('/store', [MarketerController::class, 'store'])->name('marketer.store');
});