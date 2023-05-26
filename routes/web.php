<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    
    Route::get('/', 'IndexController@index');

    Route::get('login', [ 'as' => 'login', 'uses' => 'IndexController@index']);
    
    Route::post('login', 'IndexController@postLogin');
    Route::get('logout', 'IndexController@logout');
     
    Route::get('dashboard', 'DashboardController@index');   
    Route::get('profile', 'AdminController@profile');   
    Route::post('profile', 'AdminController@updateProfile');
    Route::get('verify_purchase', 'AdminController@verify_purchase');
    //Route::post('verify_purchase', 'AdminController@verify_purchase_update');     
    
    Route::get('settings', 'SettingsController@settings');

    Route::get('find_imdb_movie', 'ImportImdbController@find_imdb_movie');
    Route::get('find_imdb_show', 'ImportImdbController@find_imdb_show');
    Route::get('find_imdb_episode', 'ImportImdbController@find_imdb_episode');  


    Route::get('language', 'LanguageController@languag_list');  
    Route::get('language/add_language', 'LanguageController@addLanguage'); 
    Route::get('language/edit_language/{id}', 'LanguageController@editLanguage');   
    Route::post('language/add_edit_language', 'LanguageController@addnew'); 
    Route::get('language/delete/{id}', 'LanguageController@delete');

    Route::get('genres', 'GenresController@genres_list');   
    Route::get('genres/add_genre', 'GenresController@addGenre'); 
    Route::get('genres/edit_genre/{id}', 'GenresController@editGenre'); 
    Route::post('genres/add_edit_genre', 'GenresController@addnew');    
    Route::get('genres/delete/{id}', 'GenresController@delete');
    
    Route::get('movies', 'MoviesController@movies_list');   
    Route::get('movies/add_movie', 'MoviesController@addMovie'); 
    Route::get('movies/edit_movie/{id}', 'MoviesController@editMovie'); 
    Route::post('movies/add_edit_movie', 'MoviesController@addnew');    
    Route::get('movies/delete/{id}', 'MoviesController@delete');


    Route::get('series', 'SeriesController@series_list');   
    Route::get('series/add_series', 'SeriesController@addSeries'); 
    Route::get('series/edit_series/{id}', 'SeriesController@editSeries');   
    Route::post('series/add_edit_series', 'SeriesController@addnew');   
    Route::get('series/delete/{id}', 'SeriesController@delete');


    Route::get('season', 'SeasonController@season_list');   
    Route::get('season/add_season', 'SeasonController@addSeason'); 
    Route::get('season/edit_season/{id}', 'SeasonController@editSeason');   
    Route::post('season/add_edit_season', 'SeasonController@addnew');   
    Route::get('season/delete/{id}', 'SeasonController@delete');

    Route::get('episodes', 'EpisodesController@episodes_list'); 
    Route::get('episodes/add_episode', 'EpisodesController@addEpisode'); 
    Route::get('episodes/edit_episode/{id}', 'EpisodesController@editEpisode'); 
    Route::post('episodes/add_edit_episode', 'EpisodesController@addnew');  
    Route::get('episodes/delete/{id}', 'EpisodesController@delete');    

    Route::get('ajax_get_season/{id}', 'EpisodesController@ajax_get_season_list'); 

    Route::get('sports_category', 'SportsCategoryController@category_list');    
    Route::get('sports_category/add_category', 'SportsCategoryController@addCategory'); 
    Route::get('sports_category/edit_category/{id}', 'SportsCategoryController@editCategory');  
    Route::post('sports_category/add_edit_category', 'SportsCategoryController@addnew');    
    Route::get('sports_category/delete/{id}', 'SportsCategoryController@delete');

    Route::get('sports', 'SportsController@sports_video_list'); 
    Route::get('sports/add_video', 'SportsController@addVideo'); 
    Route::get('sports/edit_video/{id}', 'SportsController@editVideo'); 
    Route::post('sports/add_edit_video', 'SportsController@addnew');    
    Route::get('sports/delete/{id}', 'SportsController@delete');

    Route::get('tv_category', 'TvCategoryController@category_list');    
    Route::get('tv_category/add_category', 'TvCategoryController@addCategory'); 
    Route::get('tv_category/edit_category/{id}', 'TvCategoryController@editCategory');  
    Route::post('tv_category/add_edit_category', 'TvCategoryController@addnew');    
    Route::get('tv_category/delete/{id}', 'TvCategoryController@delete');

    Route::get('live_tv', 'LiveTvController@live_tv_list'); 
    Route::get('live_tv/add_live_tv', 'LiveTvController@addTv'); 
    Route::get('live_tv/edit_live_tv/{id}', 'LiveTvController@editTv'); 
    Route::post('live_tv/add_edit_live_tv', 'LiveTvController@addnew'); 
    Route::get('live_tv/delete/{id}', 'LiveTvController@delete');


    Route::get('slider', 'SliderController@slider_list');   
    Route::get('slider/add_slider', 'SliderController@addSlider'); 
    Route::get('slider/edit_slider/{id}', 'SliderController@editSlider');   
    Route::post('slider/add_edit_slider', 'SliderController@addnew');   
    Route::get('slider/delete/{id}', 'SliderController@delete');

    Route::get('home_sections', 'HomeSectionsController@list'); 
    Route::get('home_sections/add', 'HomeSectionsController@add'); 
    Route::get('home_sections/edit/{id}', 'HomeSectionsController@edit');   
    Route::post('home_sections/add_edit', 'HomeSectionsController@addnew'); 
    Route::get('home_sections/delete/{id}', 'HomeSectionsController@delete');


    Route::get('users', 'UsersController@user_list');   
    Route::get('users/add_user', 'UsersController@addUser'); 
    Route::get('users/edit_user/{id}', 'UsersController@editUser'); 
    Route::post('users/add_edit_user', 'UsersController@addnew');   
    Route::get('users/delete/{id}', 'UsersController@delete');
    Route::get('users/history/{id}', 'UsersController@user_history');
    Route::get('users/export', 'UsersController@user_export');  

    Route::get('sub_admin', 'UsersController@admin_user_list'); 
    Route::get('sub_admin/add_user', 'UsersController@admin_addUser'); 
    Route::get('sub_admin/edit_user/{id}', 'UsersController@admin_editUser');   
    Route::post('sub_admin/add_edit_user', 'UsersController@admin_addnew'); 
    Route::get('sub_admin/delete/{id}', 'UsersController@admin_delete');

    Route::get('subscription_plan', 'SubscriptionPlanController@subscription_plan_list');   
    Route::get('subscription_plan/add_plan', 'SubscriptionPlanController@addSubscriptionPlan'); 
    Route::get('subscription_plan/edit_plan/{id}', 'SubscriptionPlanController@editSubscriptionPlan');  
    Route::post('subscription_plan/add_edit_plan', 'SubscriptionPlanController@addnew');    
    Route::get('subscription_plan/delete/{id}', 'SubscriptionPlanController@delete');

    Route::get('transactions', 'TransactionsController@transactions_list');
    Route::post('transactions/export', 'TransactionsController@transactions_export');    
 
    Route::get('pages', 'PagesController@pages_list');  
    Route::get('pages/add', 'PagesController@add'); 
    Route::get('pages/edit/{id}', 'PagesController@edit');  
    Route::post('pages/add_edit', 'PagesController@addnew');    
    Route::get('pages/delete/{id}', 'PagesController@delete');


    Route::get('general_settings', 'SettingsController@general_settings');
    Route::post('general_settings', 'SettingsController@update_general_settings');
    Route::get('email_settings', 'SettingsController@email_settings');
    Route::post('email_settings', 'SettingsController@update_email_settings');
    Route::get('payment_settings', 'SettingsController@payment_settings');
    Route::post('payment_settings', 'SettingsController@update_payment_settings');
    Route::get('social_login_settings', 'SettingsController@social_login_settings');
    Route::post('social_login_settings', 'SettingsController@update_social_login_settings');
    
    Route::get('menu_settings', 'SettingsController@menu_settings');
    Route::post('menu_settings', 'SettingsController@update_menu_settings');

    Route::get('player_settings', 'SettingsPlayerController@player_settings');
    Route::post('player_settings', 'SettingsPlayerController@update_player_settings');
 
    Route::get('ads_list', 'AdsController@ads_list');
    Route::get('ads_edit/{id}', 'AdsController@ads_edit');
    Route::post('ads_edit', 'AdsController@addnew');

    Route::get('verify_purchase_app', 'SettingsAndroidAppController@verify_purchase_app');
    Route::post('verify_purchase_app', 'SettingsAndroidAppController@verify_purchase_app_update');

    Route::get('android_settings', 'SettingsAndroidAppController@android_settings');
    Route::post('android_settings', 'SettingsAndroidAppController@update_android_settings');
    Route::get('android_notification', 'SettingsAndroidAppController@android_notification');
    Route::post('android_notification', 'SettingsAndroidAppController@send_android_notification');

    Route::get('ad_list', 'AppAdsController@list');
    Route::get('ad_list/edit/{id}', 'AppAdsController@edit');   
    Route::post('ad_list/admob', 'AppAdsController@admob');
    Route::post('ad_list/startapp', 'AppAdsController@startapp');
    Route::post('ad_list/facebook', 'AppAdsController@facebook');
    Route::post('ad_list/applovins', 'AppAdsController@applovins');
    Route::post('ad_list/wortise', 'AppAdsController@wortise');
    
    Route::get('coupons', 'CouponsController@coupons'); 
    Route::get('coupons/addcoupon', 'CouponsController@addeditCoupons'); 
    Route::get('coupons/addcoupon/{id}', 'CouponsController@editCoupons');  
    Route::post('coupons/addcoupon', 'CouponsController@addnew');   
    Route::get('coupons/delete/{id}', 'CouponsController@delete');  

    Route::get('actor', 'ActorController@list');    
    Route::get('actor/add', 'ActorController@add'); 
    Route::get('actor/edit/{id}', 'ActorController@edit');  
    Route::post('actor/add_edit', 'ActorController@addnew');    
    Route::get('actor/delete/{id}', 'ActorController@delete');

    Route::get('director', 'DirectorController@list');  
    Route::get('director/add', 'DirectorController@add'); 
    Route::get('director/edit/{id}', 'DirectorController@edit');    
    Route::post('director/add_edit', 'DirectorController@addnew');  
    Route::get('director/delete/{id}', 'DirectorController@delete');

    Route::get('payment_gateway', 'PaymentGatewayController@list');
    Route::get('payment_gateway/edit/{id}', 'PaymentGatewayController@edit');   
    Route::post('payment_gateway/paypal', 'PaymentGatewayController@paypal');
    Route::post('payment_gateway/stripe', 'PaymentGatewayController@stripe');
    Route::post('payment_gateway/razorpay', 'PaymentGatewayController@razorpay');
    Route::post('payment_gateway/paystack', 'PaymentGatewayController@paystack');
    Route::post('payment_gateway/instamojo', 'PaymentGatewayController@instamojo');
    Route::post('payment_gateway/payu', 'PaymentGatewayController@payu');
    Route::post('payment_gateway/mollie', 'PaymentGatewayController@mollie');
    Route::post('payment_gateway/flutterwave', 'PaymentGatewayController@flutterwave');
    Route::post('payment_gateway/paytm', 'PaymentGatewayController@paytm');
    Route::post('payment_gateway/cashfree', 'PaymentGatewayController@cashfree');
    
});

//Site

Route::get('/', 'IndexController@index');

Route::get('collections/{slug}/{id}', 'IndexController@home_collections');

Route::get('movies', 'MoviesController@movies');
Route::get('movies/details/{slug}/{id}', 'MoviesController@movies_details');
Route::get('movies/watch/{slug}/{id}', 'MoviesController@movies_watch');

Route::get('movies/{slug}/{id}', 'MoviesController@movies_single')->name('movies_single');
 
if(getcong('menu_shows'))
{
Route::get('shows', 'ShowsController@shows');
 
Route::get('shows/details/{series_slug}/{id}', 'ShowsController@show_details');

Route::get('shows/{series_slug}/seasons/{season_slug}/{id}', 'ShowsController@season_episodes');

Route::get('shows/{series_slug}/{episodes_slug}/{id}', 'ShowsController@episodes_details')->name('episodes_single');
}

if(getcong('menu_sports'))
{
Route::get('sports', 'SportsController@sports');
Route::get('sports/{slug}', 'SportsController@sports_by_category');
Route::get('sports/details/{slug}/{id}', 'SportsController@sports_details');
Route::get('sports/watch/{slug}/{id}', 'SportsController@sports_watch');
}

if(getcong('menu_livetv'))
{
Route::get('livetv', 'LiveTvController@live_tv_list');
Route::get('livetv/{slug}', 'LiveTvController@live_tv_by_category');
Route::get('livetv/details/{slug}/{id}', 'LiveTvController@live_tv_details');
Route::get('livetv/watch/{slug}/{id}', 'LiveTvController@live_tv_single');
} 

/*========================================*/


Route::get('login', 'IndexController@login');
Route::post('login', 'IndexController@postLogin');

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

Route::get('signup', 'IndexController@signup');
Route::post('signup', 'IndexController@postSignup');

Route::get('logout', 'IndexController@logout');

Route::get('dashboard', 'UserController@dashboard');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@editprofile');
Route::post('phone_update', 'UserController@phone_update');
Route::get('watchlist', 'UserController@my_watchlist');

Route::get('membership_plan', 'UserController@membership_plan');
Route::get('payment_method/{plan_id}', 'UserController@payment_method');

//Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
//Route::get('paypal', array('as' => 'payment.status','uses' => 'PaypalController@getPaymentStatus',)); 

/*Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');*/

Route::post('paypal/pay', 'PaypalController@paypal_pay');
Route::get('paypal/success', 'PaypalController@paypal_success');
Route::get('paypal/fail', 'PaypalController@paypal_fail');


Route::get('stripe/pay', 'StripeController@stripe_pay');
Route::get('stripe/success', 'StripeController@stripe_success');
Route::get('stripe/fail', 'StripeController@stripe_fail');

Route::post('razorpay_get_order_id', 'RazorpayController@get_order_id');
Route::post('razorpay-success', 'RazorpayController@payment_success');

Route::post('pay', 'PaystackController@redirectToGateway')->name('pay');
Route::get('payment/callback', 'PaystackController@handleGatewayCallback');

Route::post('payu_success', 'PayuController@payu_success');
Route::post('payu_fail', 'PayuController@payu_fail');

Route::post('instamojo/pay', 'InstamojoController@instamojo_pay');
Route::get('instamojo/success', 'InstamojoController@instamojo_success');

Route::post('mollie/pay', 'MollieController@mollie_pay');
Route::get('mollie/success', 'MollieController@mollie_success');

Route::post('flutterwave/pay', 'FlutterwaveController@flutterwave_pay');
Route::get('flutterwave/success', 'FlutterwaveController@flutterwave_success');

Route::get('paytm/pay', 'PaytmController@paytm_pay');
Route::post('paytm/success', 'PaytmController@paytm_success');

Route::get('cashfree/pay', 'CashfreeController@cashfree_pay');
Route::get('cashfree/success', 'CashfreeController@cashfree_success');

Route::get('language/series', 'LanguageController@series_language');
Route::get('language/series/{slug}', 'LanguageController@series_by_language');
Route::get('language/movies', 'LanguageController@movies_language');
Route::get('language/movies/{slug}', 'LanguageController@movies_by_language');


Route::get('genres/series', 'GenresController@series_genres');
Route::get('genres/series/{slug}', 'GenresController@series_by_genres');
Route::get('genres/movies', 'GenresController@movies_genres');
Route::get('genres/movies/{slug}', 'GenresController@movies_by_genres');



Route::get('actors/{slug}/{id}', 'ActorDirectorController@actor_details');
Route::get('directors/{slug}/{id}', 'ActorDirectorController@director_details');

Route::get('page/{slug}', 'PagesController@get_page');
Route::post('contact_send', 'PagesController@contact_send');

Route::get('search', 'IndexController@search');
Route::get('search_elastic', 'IndexController@search_elastic');

Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset')->name('password_reset_form');
Route::post('password/reset', 'Auth\PasswordController@postReset')->name('password.reset');

Route::get('sitemap.xml', 'IndexController@sitemap');
Route::get('sitemap-misc.xml', 'IndexController@sitemap_misc');
Route::get('sitemap-movies.xml', 'IndexController@sitemap_movies');
Route::get('sitemap-show.xml', 'IndexController@sitemap_show');
Route::get('sitemap-sports.xml', 'IndexController@sitemap_sports');
Route::get('sitemap-livetv.xml', 'IndexController@sitemap_livetv');

 
Route::get('watchlist/add', 'UserController@watchlist_add');
Route::get('watchlist/remove', 'UserController@watchlist_remove');

Route::post('apply_coupon_code', 'UserController@apply_coupon_code');

//Clear Cache
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Clear View cache
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
}); 