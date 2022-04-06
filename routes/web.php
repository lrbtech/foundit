<?php

use Illuminate\Support\Facades\Route;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!9
|
*/

session(['lang'=>'english']);
Route::get('/update-language/{lang}', [App\Http\Controllers\HomeController::class, 'updatelanguage']);

Route::get('/get-ip', [App\Http\Controllers\HomeController::class, 'getClientIP']);

Route::get('/about', [App\Http\Controllers\PageController::class, 'about']);
Route::get('/contact', [App\Http\Controllers\PageController::class, 'contact']);
Route::get('/faq', [App\Http\Controllers\PageController::class, 'faq']);
Route::get('/how-it-works', [App\Http\Controllers\PageController::class, 'howitworks']);
Route::get('/our-story', [App\Http\Controllers\PageController::class, 'ourstory']);
// Route::get('/careers', [App\Http\Controllers\PageController::class, 'careers']);
Route::get('/auto-dealerships', [App\Http\Controllers\PageController::class, 'autodealerships']);
Route::get('/trust-saftey', [App\Http\Controllers\PageController::class, 'trustsaftey']);
Route::get('/terms', [App\Http\Controllers\PageController::class, 'terms']);
Route::get('/community', [App\Http\Controllers\PageController::class, 'community']);
Route::get('/blog', [App\Http\Controllers\PageController::class, 'blog']);
Route::get('/view-blog/{id}', [App\Http\Controllers\PageController::class, 'viewblog']);
// Route::get('/press', [App\Http\Controllers\PageController::class, 'press']);
// Route::get('/help', [App\Http\Controllers\PageController::class, 'help']);
// Route::get('/privacy', [App\Http\Controllers\PageController::class, 'privacy']);

Route::get('/packages', [App\Http\Controllers\PageController::class, 'packages']);


Route::post('/contact-send-mail', [App\Http\Controllers\PageController::class, 'contactsendmail']);

Route::post('/save-newsletter-mail', [App\Http\Controllers\PageController::class, 'savenewslettermail']);


Route::POST('/save-user-register', [App\Http\Controllers\PageController::class, 'saveuserregister']);
Route::get('/send-mail/{id}', [App\Http\Controllers\PageController::class, 'sendMail']);
Route::get('/verify-account/{id}', [App\Http\Controllers\PageController::class, 'verifyAccount']);

Route::get('/activate-plan/{customer_id}/{package_id}', [App\Http\Controllers\PageController::class, 'activateplan']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'home']);

Route::get('/search-category', [App\Http\Controllers\CategoryController::class, 'getsearchcategetgory']);
Route::get('/category-list', [App\Http\Controllers\CategoryController::class, 'category']);
Route::get('/get-all-category', [App\Http\Controllers\CategoryController::class, 'getallcategory']);

Route::get('/category-post/{id}', [App\Http\Controllers\HomeController::class, 'categorypost']);
Route::get('/sub-category-post/{id}', [App\Http\Controllers\HomeController::class, 'subcategorypost']);
Route::get('/city-post/{id}', [App\Http\Controllers\HomeController::class, 'citypost']);

Route::get('/search-post/{search}/{city}/{category}/{subcategory}/{sort}', [App\Http\Controllers\HomeController::class, 'searchpost']);

Route::get('/view-post/{id}', [App\Http\Controllers\HomeController::class, 'viewpost']);
Route::get('/view-user/{id}', [App\Http\Controllers\HomeController::class, 'viewuser']);
Route::get('/get-sub-category/{id}', [App\Http\Controllers\PageController::class, 'getsubcategory']);

Route::get('/get-area/{id}', [App\Http\Controllers\PageController::class, 'getArea']);
Route::get('/get-city-name/{city}/{area}', [App\Http\Controllers\PageController::class, 'getCityName']);

Route::post('/save-report', [App\Http\Controllers\PageController::class, 'savereport']);

Route::post('/save-review', [App\Http\Controllers\PageController::class, 'savereview']);
Route::post('/update-review', [App\Http\Controllers\PageController::class, 'updatereview']);

Route::get('/update-search-status', [App\Http\Controllers\PageController::class, 'updatesearchstatus']);
Route::get('/update-search-alerts', [App\Http\Controllers\PageController::class, 'updatesearchalerts']);

Route::get('/user-login/{id}', [App\Http\Controllers\PageController::class, 'userlogin']);
Route::get('/admin-edit-post/{id}', [App\Http\Controllers\PageController::class, 'admineditpost']);

Route::group(['prefix' => 'admin'],function(){

	Route::get('/login', [App\Http\Controllers\AdminLogin\LoginController::class, 'showLoginForm'])->name('admin.login');
	Route::post('/login', [App\Http\Controllers\AdminLogin\LoginController::class, 'login'])->name('admin.login.submit');
	Route::get('/logout', [App\Http\Controllers\AdminLogin\LoginController::class, 'logout'])->name('admin.logout');

	Route::post('/password/email', [App\Http\Controllers\AdminLogin\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
	Route::get('/password/reset', [App\Http\Controllers\AdminLogin\ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
	Route::post('/password/reset', [App\Http\Controllers\AdminLogin\ResetPasswordController::class, 'reset'])->name('admin.password.reset');
	Route::get('/password/reset/{token}', [App\Http\Controllers\AdminLogin\ResetPasswordController::class, 'showResetForm'])->name('admin.password.resetform');

	Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/all-customer', [App\Http\Controllers\Admin\CustomerController::class, 'allcustomer']);
    Route::POST('/get-all-customer', [App\Http\Controllers\Admin\CustomerController::class, 'getallcustomer']);
    Route::get('/delete-customer/{id}/{status}', [App\Http\Controllers\Admin\CustomerController::class, 'deletecustomer']);


    Route::get('/post-ads', [App\Http\Controllers\Admin\PostController::class, 'postads']);
    Route::POST('/get-post-ads/{date1}/{date2}/{customer}/{category}/{from_range}/{to_range}', [App\Http\Controllers\Admin\PostController::class, 'getpostads']);
    Route::get('/delete-post-ads/{id}/{status}', [App\Http\Controllers\Admin\PostController::class, 'deletepostads']);
    Route::get('/approved-post-ads/{id}', [App\Http\Controllers\Admin\PostController::class, 'approvedpostads']);

    Route::get('/customer-post-ads/{id}', [App\Http\Controllers\Admin\PostController::class, 'customerpostads']);
    Route::POST('/get-customer-post-ads/{id}', [App\Http\Controllers\Admin\PostController::class, 'getcustomerpostads']);
	

    Route::get('/change-password', [App\Http\Controllers\Admin\SettingsController::class, 'changepassword']);
    Route::POST('/change-password', [App\Http\Controllers\Admin\SettingsController::class, 'updatechangepassword']);

    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'settings']);
    Route::POST('/update-settings', [App\Http\Controllers\Admin\SettingsController::class, 'updatesettings']);

    Route::get('/sms-api', [App\Http\Controllers\Admin\SettingsController::class, 'smsapi']);
    Route::POST('/update-sms-api', [App\Http\Controllers\Admin\SettingsController::class, 'updatesmsapi']);

    Route::get('/about-us', [App\Http\Controllers\Admin\SettingsController::class, 'aboutus']);
    Route::POST('/update-about-us', [App\Http\Controllers\Admin\SettingsController::class, 'updateaboutus']);

    Route::get('/how-it-works', [App\Http\Controllers\Admin\SettingsController::class, 'howitworks']);
    Route::POST('/update-how-it-works', [App\Http\Controllers\Admin\SettingsController::class, 'updatehowitworks']);

    Route::get('/privacy-policy', [App\Http\Controllers\Admin\SettingsController::class, 'privacypolicy']);
    Route::POST('/update-privacy-policy', [App\Http\Controllers\Admin\SettingsController::class, 'updateprivacypolicy']);

    Route::get('/terms-and-conditions', [App\Http\Controllers\Admin\SettingsController::class, 'termsandconditions']);
    Route::POST('/update-terms-and-conditions', [App\Http\Controllers\Admin\SettingsController::class, 'updatetermsandconditions']);

    Route::get('/our-story', [App\Http\Controllers\Admin\SettingsController::class, 'ourstory']);
    Route::POST('/update-ourstory', [App\Http\Controllers\Admin\SettingsController::class, 'updateourstory']);

    Route::get('/careers', [App\Http\Controllers\Admin\SettingsController::class, 'careers']);
    Route::POST('/update-careers', [App\Http\Controllers\Admin\SettingsController::class, 'updatecareers']);

    Route::get('/auto-dealerships', [App\Http\Controllers\Admin\SettingsController::class, 'autodealerships']);
    Route::POST('/update-autodealerships', [App\Http\Controllers\Admin\SettingsController::class, 'updateautodealerships']);

    Route::get('/trust-saftey', [App\Http\Controllers\Admin\SettingsController::class, 'trustsaftey']);
    Route::POST('/update-trustsaftey', [App\Http\Controllers\Admin\SettingsController::class, 'updatetrustsaftey']);

    Route::get('/community', [App\Http\Controllers\Admin\SettingsController::class, 'community']);
    Route::POST('/update-community', [App\Http\Controllers\Admin\SettingsController::class, 'updatecommunity']);

    Route::get('/press', [App\Http\Controllers\Admin\SettingsController::class, 'press']);
    Route::POST('/update-press', [App\Http\Controllers\Admin\SettingsController::class, 'updatepress']);

    Route::get('/help', [App\Http\Controllers\Admin\SettingsController::class, 'help']);
    Route::POST('/update-help', [App\Http\Controllers\Admin\SettingsController::class, 'updatehelp']);


    //package
	Route::get('/package', [App\Http\Controllers\Admin\PackageController::class, 'package']);
    Route::POST('/save-package', [App\Http\Controllers\Admin\PackageController::class, 'savepackage']);
    Route::POST('/update-package', [App\Http\Controllers\Admin\PackageController::class, 'updatepackage']);
    Route::get('/edit-package/{id}', [App\Http\Controllers\Admin\PackageController::class, 'editpackage']);
	Route::get('/delete-package/{id}/{status}', [App\Http\Controllers\Admin\PackageController::class, 'deletepackage']);

    //category
	Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'category']);
    Route::POST('/save-category', [App\Http\Controllers\Admin\CategoryController::class, 'savecategory']);
    Route::POST('/update-category', [App\Http\Controllers\Admin\CategoryController::class, 'updatecategory']);
    Route::get('/edit-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editcategory']);
	Route::get('/delete-category/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deletecategory']);


    //subcategory
	Route::get('/subcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'subcategory']);
    Route::POST('/save-subcategory', [App\Http\Controllers\Admin\CategoryController::class, 'savesubcategory']);
    Route::POST('/update-subcategory', [App\Http\Controllers\Admin\CategoryController::class, 'updatesubcategory']);
    Route::get('/edit-subcategory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editsubcategory']);
	Route::get('/delete-subcategory/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deletesubcategory']);

    //city
	Route::get('/city', [App\Http\Controllers\Admin\CityController::class, 'City']);
    Route::POST('/save-city', [App\Http\Controllers\Admin\CityController::class, 'saveCity']);
    Route::POST('/update-city', [App\Http\Controllers\Admin\CityController::class, 'updateCity']);
    Route::get('/edit-city/{id}', [App\Http\Controllers\Admin\CityController::class, 'editCity']);
    Route::get('/city-delete/{id}/{status}', [App\Http\Controllers\Admin\CityController::class, 'deleteCity']);

    //area
	Route::get('/area/{id}', [App\Http\Controllers\Admin\CityController::class, 'Area']);
    Route::POST('/save-area', [App\Http\Controllers\Admin\CityController::class, 'saveArea']);
    Route::POST('/update-area', [App\Http\Controllers\Admin\CityController::class, 'updateArea']);
    Route::get('/edit-area/{id}', [App\Http\Controllers\Admin\CityController::class, 'editArea']);
    Route::get('/area-delete/{id}/{status}', [App\Http\Controllers\Admin\CityController::class, 'deleteArea']);

    //category
	Route::get('/report-category', [App\Http\Controllers\Admin\CategoryController::class, 'reportcategory']);
    Route::POST('/save-report-category', [App\Http\Controllers\Admin\CategoryController::class, 'savereportcategory']);
    Route::POST('/update-report-category', [App\Http\Controllers\Admin\CategoryController::class, 'updatereportcategory']);
    Route::get('/edit-report-category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editreportcategory']);
	Route::get('/delete-report-category/{id}/{status}', [App\Http\Controllers\Admin\CategoryController::class, 'deletereportcategory']);


    Route::get('/trending-today', [App\Http\Controllers\Admin\SettingsController::class, 'trendingtoday']);
    Route::POST('/save-trending-today', [App\Http\Controllers\Admin\SettingsController::class, 'savetrendingtoday']);
    Route::POST('/update-trending-today', [App\Http\Controllers\Admin\SettingsController::class, 'updatetrendingtoday']);
    Route::get('/delete-trending-today/{id}', [App\Http\Controllers\Admin\SettingsController::class, 'deletetrendingtoday']);

    Route::get('/live-ads', [App\Http\Controllers\Admin\PostController::class, 'liveads']);
    Route::POST('/save-live-ads', [App\Http\Controllers\Admin\PostController::class, 'saveliveads']);
    Route::POST('/update-live-ads', [App\Http\Controllers\Admin\PostController::class, 'updateliveads']);
    Route::get('/delete-live-ads/{id}', [App\Http\Controllers\Admin\PostController::class, 'deleteliveads']);

    Route::get('/report-post-ads', [App\Http\Controllers\Admin\PostController::class, 'reportpostads']);
    Route::POST('/get-report-post-ads/{date1}/{date2}', [App\Http\Controllers\Admin\PostController::class, 'getreportpostads']);

    Route::get('/ad-banner', [App\Http\Controllers\Admin\SettingsController::class, 'adbanner']);
    Route::POST('/update-ad-banner', [App\Http\Controllers\Admin\SettingsController::class, 'updateadbanner']);


    //post-ads
    // Route::get('/new-post-ads', [App\Http\Controllers\Admin\PostController::class, 'newpostads']);
    // Route::POST('/save-post-ads', [App\Http\Controllers\Admin\PostController::class, 'savepostads']);
    // Route::POST('/update-post-ads', [App\Http\Controllers\Admin\PostController::class, 'updatepostads']);
    // Route::get('/edit-post-ads/{id}', [App\Http\Controllers\Admin\PostController::class, 'editpostads']);
    // //Route::get('/delete-post-ads/{id}/{status}', [App\Http\Controllers\Admin\PostController::class, 'deletepostads']);
    // Route::get('/delete-post-image/{id}', [App\Http\Controllers\Admin\PostController::class, 'deletepostimge']);

    //languages modules
    Route::get('/languages', [App\Http\Controllers\Admin\SettingsController::class, 'languageTable']);
    Route::get('/fetch_language', [App\Http\Controllers\Admin\SettingsController::class, 'fetchLanguage']);
    Route::POST('/insert_language', [App\Http\Controllers\Admin\SettingsController::class, 'insertLanguage']);
    Route::POST('/update_language', [App\Http\Controllers\Admin\SettingsController::class, 'updateLanguage']);
    Route::POST('/delete_language', [App\Http\Controllers\Admin\SettingsController::class, 'deleteLanguage']);

    Route::get('/change-language/{language}', [App\Http\Controllers\Admin\SettingsController::class, 'changelanguage']);

    Route::get('/package-report', [App\Http\Controllers\Admin\ReportController::class, 'packagereport']);
    Route::POST('/get-package-report/{date1}/{date2}/{user_id}', [App\Http\Controllers\Admin\ReportController::class, 'getpackagereport']);

    Route::get('/visitor-logs', [App\Http\Controllers\Admin\ReportController::class, 'visitorlogs']);
    Route::POST('/get-visitor-logs/{date1}/{date2}/{user_id}/{category}', [App\Http\Controllers\Admin\ReportController::class, 'getvisitorlogs']);

    Route::get('/user-logs', [App\Http\Controllers\Admin\SettingsController::class, 'userlogs']);
    Route::POST('/get-user-logs', [App\Http\Controllers\Admin\SettingsController::class, 'getuserlogs']);

    Route::get('/homepage-seo', [App\Http\Controllers\Admin\SettingsController::class, 'homepageseo']);
    Route::POST('/update-homepage-seo', [App\Http\Controllers\Admin\SettingsController::class, 'updatehomepageseo']);

     //blog
	Route::get('/blog', [App\Http\Controllers\Admin\BlogController::class, 'blog']);
    Route::POST('/save-blog', [App\Http\Controllers\Admin\BlogController::class, 'saveblog']);
    Route::POST('/update-blog', [App\Http\Controllers\Admin\BlogController::class, 'updateblog']);
    Route::get('/edit-blog/{id}', [App\Http\Controllers\Admin\BlogController::class, 'editblog']);
	Route::get('/delete-blog/{id}/{status}', [App\Http\Controllers\Admin\BlogController::class, 'deleteblog']);

    Route::get('/faq', [App\Http\Controllers\Admin\BlogController::class, 'faq']);
    Route::POST('/save-faq', [App\Http\Controllers\Admin\BlogController::class, 'savefaq']);
    Route::POST('/update-faq', [App\Http\Controllers\Admin\BlogController::class, 'updatefaq']);
    Route::get('/edit-faq/{id}', [App\Http\Controllers\Admin\BlogController::class, 'editfaq']);
	Route::get('/delete-faq/{id}/{status}', [App\Http\Controllers\Admin\BlogController::class, 'deletefaq']);

    Route::get('/newsletter', [App\Http\Controllers\Admin\BlogController::class, 'newsletter']);
    Route::POST('/save-newsletter', [App\Http\Controllers\Admin\BlogController::class, 'savenewsletter']);
    Route::POST('/update-newsletter', [App\Http\Controllers\Admin\BlogController::class, 'updatenewsletter']);
    Route::get('/edit-newsletter/{id}', [App\Http\Controllers\Admin\BlogController::class, 'editnewsletter']);
	Route::get('/delete-newsletter/{id}', [App\Http\Controllers\Admin\BlogController::class, 'deletenewsletter']);
    Route::get('/send-newsletter/{id}', [App\Http\Controllers\Admin\BlogController::class, 'sendnewsletter']); 

    Route::get('/chat-customer', [App\Http\Controllers\Admin\ChatController::class, 'chatcustomer']);
	Route::get('/get-customer-chat/{id}', [App\Http\Controllers\Admin\ChatController::class, 'getcustomerchat']);
    Route::get('/view-customer-chat/{id}', [App\Http\Controllers\Admin\ChatController::class, 'viewcustomerchat']);
    Route::get('/view-customer-chat-count/{id}', [App\Http\Controllers\Admin\ChatController::class, 'viewcustomerchatcount']);
	Route::POST('/save-customer-chat', [App\Http\Controllers\Admin\ChatController::class, 'savecustomerchat']);

    Route::get('/google-ads', [App\Http\Controllers\Admin\SettingsController::class, 'googleads']);
    Route::POST('/update-google-ads', [App\Http\Controllers\Admin\SettingsController::class, 'updategoogleads']);
});



Route::group(['prefix' => 'customer'],function(){
	Route::get('/dashboard', [App\Http\Controllers\User\HomeController::class, 'dashboard'])->name('customer.dashboard');
    Route::get('/change-language/{language}', [App\Http\Controllers\User\HomeController::class, 'changelanguage']);
    Route::get('/review-delete/{id}', [App\Http\Controllers\User\HomeController::class, 'reviewdelete']);

    Route::get('/choosepackage', [App\Http\Controllers\User\HomeController::class, 'choosepackage']);
    Route::get('/apply-package/{id}', [App\Http\Controllers\User\HomeController::class, 'applypackage']);
    Route::get('/packages', [App\Http\Controllers\User\HomeController::class, 'packages']);

    Route::get('/search-history', [App\Http\Controllers\User\HomeController::class, 'searchhistory']);
    Route::get('/search-history-delete/{id}', [App\Http\Controllers\User\HomeController::class, 'searchhistorydelete']);


    Route::get('/profile', [App\Http\Controllers\User\CustomerController::class, 'profile']);
	Route::get('/settings', [App\Http\Controllers\User\CustomerController::class, 'profilesettings']);
    Route::POST('/update-profile-settings', [App\Http\Controllers\User\CustomerController::class, 'updateprofilesettings']);

	Route::get('/my-ads', [App\Http\Controllers\User\PostController::class, 'myads']);

    //post-ads
    Route::get('/create-post-ad', [App\Http\Controllers\User\PostController::class, 'createpostad']);
    Route::POST('/post-validate-first', [App\Http\Controllers\User\PostController::class, 'postvalidatefirst']);
    Route::POST('/post-validate-second', [App\Http\Controllers\User\PostController::class, 'postvalidatesecond']);
    Route::POST('/editpost-validate-first', [App\Http\Controllers\User\PostController::class, 'editpostvalidatefirst']);
    Route::POST('/editpost-validate-second', [App\Http\Controllers\User\PostController::class, 'editpostvalidatesecond']);
    Route::POST('/save-post-ad', [App\Http\Controllers\User\PostController::class, 'savepostad']);
    Route::POST('/update-post-ad', [App\Http\Controllers\User\PostController::class, 'updatepostad']);
    Route::get('/edit-post-ad/{id}', [App\Http\Controllers\User\PostController::class, 'editpostad']);
    Route::get('/delete-post-ad/{id}', [App\Http\Controllers\User\PostController::class, 'deletepostad']);
    Route::get('/delete-post-image/{id}', [App\Http\Controllers\User\PostController::class, 'deletepostimge']);


    Route::get('/change-password', [App\Http\Controllers\User\AccountController::class, 'ChangePassword']);
    Route::POST('/update-change-password', [App\Http\Controllers\User\AccountController::class, 'UpdateChangePassword']);

    Route::get('/bookmark', [App\Http\Controllers\User\FavouriteController::class, 'bookmark']);
    Route::get('/save-favourite-post/{id}', [App\Http\Controllers\User\FavouriteController::class, 'savefavouritepost']);
    Route::get('/delete-favourite-post/{id}', [App\Http\Controllers\User\FavouriteController::class, 'deletefavouritepost']);


    Route::get('/choosepackage', [App\Http\Controllers\User\HomeController::class, 'choosepackage']);
    Route::get('/apply-package/{id}', [App\Http\Controllers\User\HomeController::class, 'applypackage']);
    Route::get('/packages', [App\Http\Controllers\User\HomeController::class, 'packages']);

    Route::get('/message', [App\Http\Controllers\User\ChatController::class, 'message']);
    // Route::get('/chat-notification/{id}/{id1}', [App\Http\Controllers\User\ChatController::class, 'chatnotification']);
    Route::get('/get-new-chat-count/{user_id}/{post_id}', [App\Http\Controllers\User\ChatController::class, 'getnewchatcount']);

    Route::get('/save-chat-view/{id}', [App\Http\Controllers\User\ChatController::class, 'savechatview']);
    Route::POST('/save-chat-customer', [App\Http\Controllers\User\ChatController::class, 'savechatcustomer']);
    Route::POST('/chat-upload-document', [App\Http\Controllers\User\ChatController::class, 'chatuploaddocument']);

    Route::get('/get-chat/{user_id}/{post_id}', [App\Http\Controllers\User\ChatController::class, 'getchat']);
    Route::get('/reload-chat/{user_id}/{post_id}', [App\Http\Controllers\User\ChatController::class, 'reloadchat']);

    Route::get('/chat-delete/{user_id}/{post_id}', [App\Http\Controllers\User\ChatController::class, 'chatdelete']);
    Route::get('/chat-bulk-delete', [App\Http\Controllers\User\ChatController::class, 'chatbulkdelete']);

    Route::get('/chat-admin', [App\Http\Controllers\User\ChatController::class, 'chatadmin']);
    Route::get('/get-new-chat-admin-count', [App\Http\Controllers\User\ChatController::class, 'getnewchatadmincount']);
    Route::get('/reload-chat-admin', [App\Http\Controllers\User\ChatController::class, 'reloadchatadmin']);
    Route::POST('/save-chat-admin', [App\Http\Controllers\User\ChatController::class, 'savechatadmin']);


});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
