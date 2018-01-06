<?php

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

// Direct Page Access Routes
Route::get('/', 'PublicPageController@index'); //return index page
//Route::get('contact-us','PublicPageController@getContactus');

// public user Signup pages
Route::get('/user-signup-page','UserPageController@getUserRegistration'); //return user registration view
Route::get('/vendor-signup-page','VendorPageController@getVendorRegistration');//return vendor registration
Route::get('/user/active/{remember_token}','SigninSignupController@activeUser' );//form active user and vendor
Route::get('/signin-page','PublicPageController@getSignin')->middleware('revalidate'); //return signin page
Route::post('/login','SigninSignupController@loginCheck'); //Login for both customer and vendor
Route::post('/user-signup-submission','SigninSignupController@signupUser'); //Signup for customer
Route::post('/vendor-signup-submission','SigninSignupController@signupUser'); //Signup for vendor

Route::get('/gift_details/{alias}','PublicPageController@getGiftDetailsPage' );//gift details page
Route::post('/getratings','PublicPageController@singleGift_rating' );//gift details page
Route::get('/gift-listing/{alias}','PublicPageController@getGiftListingPage' );//gift Listing page

// Ajax Request 
Route::post('/user-subscription','PublicPageController@subscribe');
Route::get('/search-gifts','PublicPageController@searchGifts');
Route::post('/gift-search-results','PublicPageController@searchGifts_post');



/*User route*/
Route::group(['middleware' => 'user'],function (){
Route::get('/user-profile','UserPageController@getUserProfile');//return user profile
Route::post('/save-user-profile','UserController@updateUserProfile'); //Save user profile
Route::post('/save-shipping-address','UserController@updateShippingAddress');
Route::get('/account-security','UserPageController@getUser_accountSecurity');
Route::post('/account-security-save','UserPageController@getUser_accountSecurity_save');
Route::get('/user-settings','UserPageController@getUser_settings'); // get user settings page
Route::post('/user-settings-save','UserPageController@getUser_settings_save'); // get user settings submission
Route::post('/save-user-wishlist','UserController@saveUserWishlist');
Route::get('/manage-user-wishlist','UserPageController@getManage_wishlist'); // get user settings page
Route::get('/wishlist-status-update/{param1}/{param2}','UserPageController@get_wishlist_status'); // get user settings page
Route::post('/delete-user-wishlist/{param1}','UserPageController@get_deleteUser_wishlist'); // get user settings page
Route::get('/update-user-wishlist/{param1}','UserPageController@get_editUser_wishlist'); // Update user wishlist
Route::post('/update-user-wishlist-save/{param1}','UserPageController@get_editUser_wishlist_save'); // Update user wishlist
Route::get('/search-user-wishlist','PublicPageController@getWishlistSearch');//search user wishlist
Route::post('/search-wishlist','PublicPageController@searchWishlist');
});




/*Vendor route*/
Route::group(['middleware' => 'vendor'],function (){
Route::get('/vendor-profile','VendorPageController@getVendorProfile');//return vendor profile
Route::get('/vendor-dashboard','VendorPageController@getVendorDashboard');//return vendor profile
Route::post('/save-vendor-profile','VendorController@updateVendorProfile'); // save vendor profile
Route::get('/vendor-account-security','VendorPageController@getAccountSecurity');//return vendor account security
Route::post('/vendor-account-security-save','VendorController@updateCredential');//return vendor credential

});





/* Admin Routes */
Route::group(['middleware' => 'admin'],function (){
Route::get('/dashboard', 'AdminPageController@index'); //return index page
//Route::get('/manage_users', 'AdminPageController@getManageUsers_users'); //return index page

Route::get('/manage_users', 'admin\AdminUsersController@index'); //return index page
Route::post('/manage_users_edit/{id}/{params}', 'admin\AdminUsersController@index'); //return index page
Route::post('/manage_users_delete/{id}/{params}', 'admin\AdminUsersController@index'); //return index page
Route::post('/manage_users_enable/{id}/{params}', 'admin\AdminUsersController@index'); //return index page
Route::post('/manage_users_disable/{id}/{params}', 'admin\AdminUsersController@index'); //return index page

Route::get('/approve_vendors', 'AdminPageController@getManageUsers_approveVendors'); //return index page
Route::get('/manage_admin_users', 'AdminPageController@getManageUsers_AdminUsers'); //Manage Vendors


Route::get('/manage_vendors', 'admin\AdminVendorsController@index'); //Manage Vendors
Route::post('/manage_vendors_edit/{id}/{params}', 'admin\AdminVendorsController@index'); //return index page
Route::post('/manage_vendors_delete/{id}/{params}', 'admin\AdminVendorsController@index'); //return index page
Route::post('/manage_vendors_enable/{id}/{params}', 'admin\AdminVendorsController@index'); //return index page
Route::post('/manage_vendors_disable/{id}/{params}', 'admin\AdminVendorsController@index'); //return index page

// Gift Routs
Route::get('/gift-categories', 'AdminPageController@getGift_categories'); //Manage Vendors
Route::post('/save-gift-category','AdminPageController@saveGiftCategory');
Route::post('/update-gift-category/{id}','AdminPageController@updateGiftCategory');
Route::get('/publish-category/{id}','AdminPageController@publishCategory');
Route::get('/unpublish-category/{id}','AdminPageController@unpublishCategory');
Route::post('/delete-category/{id}','AdminPageController@deleteCategory');


Route::get('/create-gifts', 'AdminPageController@getCreate_gifts'); // Create Gifts
Route::post('/create-gifts-save/{param1}/{param2}', 'AdminPageController@getCreate_gifts_dataSave'); // Create Gifts
Route::get('/list-of-gifts', 'AdminPageController@getList_of_gifts'); // Create Gifts
Route::post('/delete-gifts/{param1}', 'AdminPageController@AdminDelete_gifts'); // Delete Gifts
Route::get('/update-gifts/{id}', 'AdminPageController@update_gifts'); // Delete Gifts
Route::post('/update-gift-save/{param1}/{param2}', 'AdminPageController@update_gifts_save'); // Delete Gifts

Route::get('/gift-default-image/{param1}/{param2}', 'AdminPageController@giftDefault_Image'); // Delete Gifts

Route::get('/delete-gift-images/{param1}', 'AdminPageController@AdminDelete_gifts_Images'); // Delete Gifts

Route::get('/delete-attribute-name/{param1}', 'AdminPageController@AdminDelete_AttributeName'); // Delete Gifts
Route::get('/delete-attribute-value/{param1}', 'AdminPageController@AdminDelete_AttributeValue'); // Delete Gifts


Route::get('/gift-publish-status/{param1}/{param2}', 'AdminPageController@AdminPublishUnpublish_gifts'); // Gift Publish Status
Route::get('/gift-attributes', 'AdminPageController@getGift_attributes'); // Create Gifts Attributes and Listing
Route::post('/gift-attributes-save/{param1}/{param2}', 'AdminPageController@getGift_attributes_save'); // Create Gifts Attributes and Listing
Route::get('/gift-attributes-status/{param1}/{param2}', 'AdminPageController@getGift_attributes_status'); // Create Gifts Attributes Status

//wishlist
Route::get('/wishlist-categories', 'AdminPageController@getWishlist_categories'); // Create Wishlist Categories and Listing
Route::post('/save-wishlist','WishlistController@saveWishlist');
Route::post('/update-wishlist-category/{id}','WishlistController@updateWishlistCategory');
Route::get('/delete-wishlist-category/{id}','WishlistController@deleteWishlistCategory');
Route::get('/manage-wishlist', 'AdminPageController@getMmanage_user_wishlist'); // Wishlist Manage



Route::get('/manage-order-list', 'AdminPageController@getManage_orderlist'); // Manage Order List

Route::get('/system-settings', 'AdminPageController@getSystem_settings'); // System Settings
Route::post('/system-settings-save/{param1}', 'AdminPageController@getSystem_settings_save'); // System Settings data save

});

Route::get('/admin_signin_mygift', 'AdminPageController@getAdminlogin')->middleware('revalidate_admin'); //return index page
Route::post('/admin_signin_submission', 'AdminSigninController@AdminLoginCheck'); //return index page

/*Login Registration and logout route*/
Route::post('/user-signup-submission','SigninSignupController@signupUser'); //Signup for customer
Route::post('/vendor-signup-submission','SigninSignupController@signupUser'); //Signup for vendor

Route::get('/signout','SigninSignupController@logout'); 
Route::get('/edit-user','UserController@editUserProfile'); //get user info from db

