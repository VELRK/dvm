<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Additional routes
$route['home'] = 'Home/redirect_root';
$route['our-projects'] = 'Listing/index';
$route['listing'] = 'Listing/redirect_legacy';
$route['about'] = 'About/index';
$route['blog'] = 'Blog/index';
$route['blog/post/13'] = 'Redirects/blog/why-coimbatore-is-indias-best-retirement-destination';
$route['blog/post/6']  = 'Redirects/blog/the-future-of-artificial-intelligence-in-everyday-life';
$route['blog/post/5']  = 'Redirects/blog/why-coimbatore-is-the-best-city-for-real-estate-investment-in-2026';
$route['blog/post/4']  = 'Redirects/blog/top-emerging-real-estate-areas-in-coimbatore-for-property-investment';
$route['blog/post/3']  = 'Redirects/blog/why-investing-in-plots-in-coimbatore-is-a-smart-choice';
$route['blog/post/2']  = 'Redirects/blog/how-to-choose-the-perfect-home-location';
$route['blog/post/1']  = 'Redirects/blog/top-10-real-estate-investment-tips-for-2026';

$route['blog/(:any)'] = 'Blog/slug/$1';
$route['blog/create'] = 'Blog/create';
$route['blog/edit/(:num)'] = 'Blog/edit/$1';
$route['blog/delete/(:num)'] = 'Blog/delete/$1';
$route['blog/manage'] = 'Blog/manage';
$route['blog/search'] = 'Blog/search';
$route['contact'] = 'Contact/index';
$route['blog-detail'] = 'Blog_detail/index';
$route['property-detail/(:any)'] = 'Redirects/property/$1';
$route['plots-in-coimbatore/(:any)'] = 'Property_detail/index/$1';


$route['plots-in-coimbatore/(:any)'] = 'Property_detail/index/$1';
// Support for old HTML file names
$route['property-details-v1'] = 'Property_detail/index';
$route['property-details-v1/(:any)'] = 'Property_detail/index/$1';
$route['property-details-v2'] = 'Property_detail/index';
$route['property-details-v2/(:any)'] = 'Property_detail/index/$1';
$route['property-details-v3'] = 'Property_detail/index';
$route['property-details-v3/(:any)'] = 'Property_detail/index/$1';
$route['property-details-v4'] = 'Property_detail/index';
$route['property-details-v4/(:any)'] = 'Property_detail/index/$1';
$route['login'] = 'Login/index';
$route['register'] = 'Register/index';

// ============================================
// Authentication API Routes
// ============================================
// All routes support both underscore and hyphen formats
// Both /auth/ and /api/auth/ prefixes work the same way

// OTP Management
$route['auth/send_otp'] = 'Auth/send_otp';
$route['auth/send-otp'] = 'Auth/send_otp';
$route['auth/verify_otp'] = 'Auth/verify_otp';
$route['auth/verify-otp'] = 'Auth/verify_otp';
$route['auth/resend_otp'] = 'Auth/resend_otp';
$route['auth/resend-otp'] = 'Auth/resend_otp';

// Profile Management
$route['auth/save_profile'] = 'Auth/save_profile';
$route['auth/save-profile'] = 'Auth/save_profile';
$route['auth/update_profile'] = 'Auth/update_profile';
$route['auth/update-profile'] = 'Auth/update_profile';
$route['auth/profile'] = 'Auth/profile';

// Session Management
$route['auth/check'] = 'Auth/check';
$route['auth/check_auth'] = 'Auth/check';
$route['auth/check-auth'] = 'Auth/check';
$route['auth/refresh_session'] = 'Auth/refresh_session';
$route['auth/refresh-session'] = 'Auth/refresh_session';
$route['auth/logout'] = 'Auth/logout';

// Phone Management
$route['auth/check_phone_exists'] = 'Auth/check_phone_exists';
$route['auth/check-phone-exists'] = 'Auth/check_phone_exists';
$route['auth/check-phone'] = 'Auth/check_phone_exists';
$route['auth/change_phone'] = 'Auth/change_phone';
$route['auth/change-phone'] = 'Auth/change_phone';
$route['auth/verify_phone_change'] = 'Auth/verify_phone_change';
$route['auth/verify-phone-change'] = 'Auth/verify_phone_change';

// Account & Instruction Management
$route['deleteInstruction']   = 'Home/deleteInstruction';
$route['delete-instruction']  = 'Home/deleteInstruction';
$route['delete_account']      = 'Auth/delete_account';
$route['delete-account']      = 'Auth/delete_account';
$route['auth/delete_account'] = 'Auth/delete_account';
$route['auth/delete-account'] = 'Auth/delete_account';

// API routes with /api/ prefix for mobile apps (same endpoints)
$route['api/auth/send_otp'] = 'Auth/send_otp';
$route['api/auth/send-otp'] = 'Auth/send_otp';
$route['api/auth/verify_otp'] = 'Auth/verify_otp';
$route['api/auth/verify-otp'] = 'Auth/verify_otp';
$route['api/auth/resend_otp'] = 'Auth/resend_otp';
$route['api/auth/resend-otp'] = 'Auth/resend_otp';
$route['api/auth/save_profile'] = 'Auth/save_profile';
$route['api/auth/save-profile'] = 'Auth/save_profile';
$route['api/auth/update_profile'] = 'Auth/update_profile';
$route['api/auth/update-profile'] = 'Auth/update_profile';
$route['api/auth/profile'] = 'Auth/profile';
$route['api/auth/check'] = 'Auth/check';
$route['api/auth/check_auth'] = 'Auth/check';
$route['api/auth/check-auth'] = 'Auth/check';
$route['api/auth/refresh_session'] = 'Auth/refresh_session';
$route['api/auth/refresh-session'] = 'Auth/refresh_session';
$route['api/auth/logout'] = 'Auth/logout';
$route['api/auth/check_phone_exists'] = 'Auth/check_phone_exists';
$route['api/auth/check-phone-exists'] = 'Auth/check_phone_exists';
$route['api/auth/check-phone'] = 'Auth/check_phone_exists';
$route['api/auth/change_phone'] = 'Auth/change_phone';
$route['api/auth/change-phone'] = 'Auth/change_phone';
$route['api/auth/verify_phone_change'] = 'Auth/verify_phone_change';
$route['api/auth/verify-phone-change'] = 'Auth/verify_phone_change';
$route['api/auth/delete_account'] = 'Auth/delete_account';
$route['api/auth/delete-account'] = 'Auth/delete_account';
$route['test-update'] = 'TestUpdate/index';

// Service Worker routes
// $route['firebase-messaging-sw.js'] = 'ServiceWorker/firebase_messaging_sw'; // Removed - Firebase not used

// API routes
$route['api/enquiry_store'] = 'Api/enquiry_store';
$route['api/enquiry/store'] = 'Api/enquiry_store';
$route['api/wishlist/store'] = 'Api/wishlist_store';
$route['api/wishlist/check'] = 'Api/wishlist_check';
$route['api/track_video_play'] = 'Api/track_video_play';
$route['api/video/play'] = 'Api/track_video_play';

// ==================== CRUD API Routes ====================
// Properties
$route['api/crud/properties'] = 'Api_crud/properties';
$route['api/crud/properties/by-location'] = 'Api_crud/properties_by_location';
$route['api/crud/properties/by-location/(:num)'] = 'Api_crud/properties_by_location/$1';
$route['api/crud/properties/by-category'] = 'Api_crud/properties_by_category';
$route['api/crud/properties/by-category/(:num)'] = 'Api_crud/properties_by_category/$1';
$route['api/crud/properties/by-city'] = 'Api_crud/properties_by_city';
$route['api/crud/properties/by-city/(:num)'] = 'Api_crud/properties_by_city/$1';
$route['api/crud/properties/(:num)'] = 'Api_crud/property/$1';
$route['api/crud/properties/(:num)/update'] = 'Api_crud/update_property/$1';
$route['api/crud/properties/(:num)/delete'] = 'Api_crud/delete_property/$1';

// Blogs
$route['api/crud/blogs'] = 'Api_crud/blogs';
$route['api/crud/blogs/(:num)'] = 'Api_crud/blog/$1';
$route['api/crud/blogs/(:num)/update'] = 'Api_crud/update_blog/$1';
$route['api/crud/blogs/(:num)/delete'] = 'Api_crud/delete_blog/$1';

// Categories
$route['api/crud/categories'] = 'Api_crud/categories';
$route['api/crud/categories/(:num)'] = 'Api_crud/category/$1';
$route['api/crud/categories/(:num)/update'] = 'Api_crud/update_category/$1';
$route['api/crud/categories/(:num)/delete'] = 'Api_crud/delete_category/$1';

// Cities
$route['api/crud/cities'] = 'Api_crud/cities';
$route['api/crud/cities/(:num)'] = 'Api_crud/city/$1';
$route['api/crud/cities/(:num)/update'] = 'Api_crud/update_city/$1';
$route['api/crud/cities/(:num)/delete'] = 'Api_crud/delete_city/$1';

// Locations
$route['api/crud/locations'] = 'Api_crud/locations';
$route['api/crud/locations/(:num)'] = 'Api_crud/location/$1';
$route['api/crud/locations/(:num)/update'] = 'Api_crud/update_location/$1';
$route['api/crud/locations/(:num)/delete'] = 'Api_crud/delete_location/$1';

// Banners
$route['api/crud/banners'] = 'Api_crud/banners';
$route['api/crud/banners/(:num)'] = 'Api_crud/banner/$1';
$route['api/crud/banners/(:num)/update'] = 'Api_crud/update_banner/$1';
$route['api/crud/banners/(:num)/delete'] = 'Api_crud/delete_banner/$1';
$route['api/crud/mobile_banners'] = 'Api_crud/mobile_banners';
$route['api/crud/mobile_banners/all'] = 'Api_crud/mobile_banners_all';
$route['api/crud/mobile_banners/(:num)'] = 'Api_crud/mobile_banner/$1';

// Offer Banners
$route['api/crud/offer-banners'] = 'Api_crud/offer_banners';
$route['api/crud/offer-banners/(:num)'] = 'Api_crud/offer_banner/$1';
$route['api/crud/offer-banners/(:num)/update'] = 'Api_crud/update_offer_banner/$1';
$route['api/crud/offer-banners/(:num)/delete'] = 'Api_crud/delete_offer_banner/$1';

// Contacts
$route['api/crud/contacts'] = 'Api_crud/contacts';
$route['api/crud/contacts/(:num)'] = 'Api_crud/contact/$1';
$route['api/crud/contacts/(:num)/update'] = 'Api_crud/update_contact/$1';
$route['api/crud/contacts/(:num)/delete'] = 'Api_crud/delete_contact/$1';

// Enquiries
$route['api/crud/enquiries'] = 'Api_crud/enquiries';
$route['api/crud/enquiries/create'] = 'Api_crud/create_enquiry';
$route['api/crud/enquiries/user/(:num)'] = 'Api_crud/enquiries_by_user/$1';
$route['api/crud/enquiries/(:num)'] = 'Api_crud/enquiry/$1';
$route['api/crud/enquiries/(:num)/update'] = 'Api_crud/update_enquiry/$1';
$route['api/crud/enquiries/(:num)/delete'] = 'Api_crud/delete_enquiry/$1';

// Users
$route['api/crud/users'] = 'Api_crud/users';
$route['api/crud/users/(:num)'] = 'Api_crud/user/$1';
$route['api/crud/users/(:num)/update'] = 'Api_crud/update_user/$1';
$route['api/crud/users/(:num)/delete'] = 'Api_crud/delete_user/$1';

// Notifications
$route['api/crud/notifications'] = 'Api_crud/notifications';
$route['api/crud/notifications/(:num)'] = 'Api_crud/notification/$1';
$route['api/crud/notifications/(:num)/update'] = 'Api_crud/update_notification/$1';
$route['api/crud/notifications/(:num)/delete'] = 'Api_crud/delete_notification/$1';

// Reels Videos
$route['api/crud/reels-videos'] = 'Api_crud/reels_videos';
$route['api/crud/reels-videos/(:num)'] = 'Api_crud/reel_video/$1';
$route['api/crud/reels-videos/(:num)/update'] = 'Api_crud/update_reel_video/$1';
$route['api/crud/reels-videos/(:num)/delete'] = 'Api_crud/delete_reel_video/$1';

// Videos
$route['api/crud/videos'] = 'Api_crud/videos';
$route['api/crud/videos/(:num)'] = 'Api_crud/video/$1';
$route['api/crud/videos/(:num)/update'] = 'Api_crud/update_video/$1';
$route['api/crud/videos/(:num)/delete'] = 'Api_crud/delete_video/$1';

// Dashboard routes
$route['dashboard/wishlist'] = 'Dashboard/wishlist';
$route['dashboard/enquiries'] = 'Dashboard/enquiries';

// Admin routes
$route['admin'] = 'Admin/index';
$route['admin/login'] = 'Admin/login';
$route['admin/dashboard'] = 'Admin/dashboard';
$route['admin/enquiries'] = 'Admin/enquiries';
$route['admin/contacts'] = 'Admin/contacts';
$route['admin/logout'] = 'Admin/logout';
$route['admin/clear-cache'] = 'Admin/clear_cache_public';
$route['clear-cache'] = 'Admin/clear_cache_public';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Additional routes
// Note: Routes for about, our-projects (listing), and blog are defined earlier in this file
// $route['about'] = 'Home/about'; // Removed - using About controller instead (uncomment line 59)
// $route['properties'] = 'Home/properties'; // Removed - not used
// $route['listing'] = 'Home/properties'; // Removed - use Listing controller via our-projects / listing redirect
// $route['blog'] = 'Home/blog'; // Removed - using Blog controller instead (defined on line 60)
// $route['blog/(:num)'] = 'Home/blog_detail/$1'; // Removed - using Blog controller instead
// $route['contact'] = 'Home/contact'; // Removed - using Contact controller instead (defined on line 67)
$route['property/(:num)'] = 'Home/property_detail/$1';
$route['property-detail/(:num)'] = 'Home/property_detail/$1';
$route['privacy-policy'] = 'Home/privacy_policy';
$route['terms-conditions'] = 'Home/terms_conditions';
$route['testimonials'] = 'Home/testimonials';

// SEO Settings
$route['admin/seo_settings'] = 'Admin/seo_settings';
$route['admin/seo_settings_save'] = 'Admin/seo_settings_save';

// Admin routes
$route['admin'] = 'Admin/login';
$route['admin/login'] = 'Admin/login';
$route['admin/logout'] = 'Admin/logout';
$route['admin/dashboard'] = 'Admin/dashboard';
$route['admin/properties'] = 'Admin/properties';
$route['admin/property_create'] = 'Admin/property_create';
$route['admin/property_edit/(:num)'] = 'Admin/property_edit/$1';
$route['admin/property_delete/(:num)'] = 'Admin/property_delete/$1';
$route['admin/banners'] = 'Admin/banners';
$route['admin/offer_banners'] = 'Admin/offer_banners';
$route['admin/offer_banner_create'] = 'Admin/offer_banner_create';
$route['admin/offer_banner_edit/(:num)'] = 'Admin/offer_banner_edit/$1';
$route['admin/offer_banner_delete/(:num)'] = 'Admin/offer_banner_delete/$1';
$route['admin/banner_create'] = 'Admin/banner_create';
$route['admin/banner_edit/(:num)'] = 'Admin/banner_edit/$1';
$route['admin/banner_delete/(:num)'] = 'Admin/banner_delete/$1';
$route['admin/banner_toggle/(:num)'] = 'Admin/banner_toggle/$1';
$route['admin/mobile_banners'] = 'Admin/mobile_banners';
$route['admin/mobile_banner_create'] = 'Admin/mobile_banner_create';
$route['admin/mobile_banner_edit/(:num)'] = 'Admin/mobile_banner_edit/$1';
$route['admin/mobile_banner_delete/(:num)'] = 'Admin/mobile_banner_delete/$1';
$route['admin/mobile_banner_toggle/(:num)'] = 'Admin/mobile_banner_toggle/$1';
$route['admin/enquiries'] = 'Admin/enquiries';
$route['admin/enquiry_view/(:num)'] = 'Admin/enquiry_view/$1';
$route['admin/enquiry_delete/(:num)'] = 'Admin/enquiry_delete/$1';
$route['admin/contacts'] = 'Admin/contacts';
$route['admin/contact_view/(:num)'] = 'Admin/contact_view/$1';
$route['admin/contact_delete/(:num)'] = 'Admin/contact_delete/$1';
$route['admin/cities'] = 'Admin/cities';
$route['admin/city_create'] = 'Admin/city_create';
$route['admin/location_update_order'] = 'Admin/location_update_order';
$route['admin/city_edit/(:num)'] = 'Admin/city_edit/$1';
$route['admin/city_delete/(:num)'] = 'Admin/city_delete/$1';
$route['admin/locations'] = 'Admin/locations';
$route['admin/location_create'] = 'Admin/location_create';
$route['admin/location_edit/(:num)'] = 'Admin/location_edit/$1';
$route['admin/location_delete/(:num)'] = 'Admin/location_delete/$1';
$route['admin/blogs'] = 'Admin/blogs';
$route['admin/blog_create'] = 'Admin/blog_create';
$route['admin/blog_edit/(:num)'] = 'Admin/blog_edit/$1';
$route['admin/blog_delete/(:num)'] = 'Admin/blog_delete/$1';
$route['admin/notifications'] = 'Admin/notifications';
$route['admin/notification_create'] = 'Admin/notification_create';
$route['admin/notification_edit/(:num)'] = 'Admin/notification_edit/$1';
$route['admin/notification_delete/(:num)'] = 'Admin/notification_delete/$1';
$route['admin/notification_toggle/(:num)'] = 'Admin/notification_toggle/$1';
$route['admin/reels'] = 'Admin/reels';
$route['admin/reel_create'] = 'Admin/reel_create';
$route['admin/reel_edit/(:num)'] = 'Admin/reel_edit/$1';
$route['admin/reel_delete/(:num)'] = 'Admin/reel_delete/$1';
$route['admin/reel_update_order'] = 'Admin/reel_update_order';
$route['admin/videos'] = 'Admin/videos';
$route['admin/video_create'] = 'Admin/video_create';
$route['admin/video_edit/(:num)'] = 'Admin/video_edit/$1';
$route['admin/video_delete/(:num)'] = 'Admin/video_delete/$1';
$route['admin/video_update_order'] = 'Admin/video_update_order';
$route['admin/users'] = 'Admin/users';
$route['admin/user_create'] = 'Admin/user_create';
$route['admin/user_edit/(:any)'] = 'Admin/user_edit/$1';
$route['admin/user_delete/(:any)'] = 'Admin/user_delete/$1';
$route['admin/bulk_delete_users'] = 'Admin/bulk_delete_users';
$route['admin/bulk_update_status_users'] = 'Admin/bulk_update_status_users';
$route['admin/referrals'] = 'Admin/referrals';
$route['admin/referral_create'] = 'Admin/referral_create';
$route['admin/referral_edit/(:any)'] = 'Admin/referral_edit/$1';
$route['admin/referral_delete/(:any)'] = 'Admin/referral_delete/$1';
$route['admin/wishlists'] = 'Admin/wishlists';
$route['admin/wishlist_view/(:num)'] = 'Admin/wishlist_view/$1';
$route['admin/wishlist_delete/(:num)'] = 'Admin/wishlist_delete/$1';

// API routes
$route['property/store'] = 'Property/store';
$route['contact/save'] = 'Contact/save';
$route['enquiry/save'] = 'Enquiry/save';
$route['property_search/filter'] = 'Property_search/filter';

// Mobile API routes
$route['api/mobile/home'] = 'Api_mobile/home';
$route['api/mobile/properties'] = 'Api_mobile/properties';
$route['api/mobile/properties/featured'] = 'Api_mobile/featured_properties';
$route['api/mobile/properties/latest'] = 'Api_mobile/latest_properties';
$route['api/mobile/properties/search'] = 'Api_mobile/search_properties';
$route['api/mobile/properties/(:num)'] = 'Api_mobile/property/$1';
$route['api/mobile/blogs'] = 'Api_mobile/blogs';
$route['api/mobile/blogs/(:num)'] = 'Api_mobile/blog/$1';
$route['api/mobile/notifications'] = 'Api_mobile/notifications';
$route['api/mobile/notifications/(:num)'] = 'Api_mobile/notification/$1';
$route['api/mobile/categories'] = 'Api_mobile/categories';
$route['api/mobile/categories/(:num)'] = 'Api_mobile/category/$1';
$route['api/mobile/cities'] = 'Api_mobile/cities';
$route['api/mobile/cities/(:num)'] = 'Api_mobile/city/$1';
$route['api/mobile/locations'] = 'Api_mobile/locations';
$route['api/mobile/locations/(:num)'] = 'Api_mobile/location/$1';
$route['api/mobile/locations/city/(:num)'] = 'Api_mobile/locations_by_city/$1';
$route['api/mobile/banners'] = 'Api_mobile/banners';
$route['api/mobile/offer_banner'] = 'Api_mobile/offer_banner';
$route['api/mobile/offer_banners'] = 'Api_mobile/offer_banners';
$route['api/mobile/contact'] = 'Api_mobile/contact';
$route['api/mobile/enquiry'] = 'Api_mobile/enquiry';
$route['api/mobile/enquiries/user/(:any)'] = 'Api_mobile/enquiries_by_user/$1';
$route['api/mobile/enquiries/customer/(:num)'] = 'Api_mobile/enquiries_by_customer/$1';
$route['api/mobile/enquiries_by_customer/(:num)'] = 'Api_mobile/enquiries_by_customer/$1';

// Mobile API Authentication Routes
$route['api/mobile/send_otp'] = 'Api_mobile/send_otp';
$route['api/mobile/send-otp'] = 'Api_mobile/send_otp';
$route['api/mobile/verify_otp'] = 'Api_mobile/verify_otp';
$route['api/mobile/verify-otp'] = 'Api_mobile/verify_otp';
$route['api/mobile/resend_otp'] = 'Api_mobile/resend_otp';
$route['api/mobile/resend-otp'] = 'Api_mobile/resend_otp';
$route['api/mobile/save_profile'] = 'Api_mobile/save_profile';
$route['api/mobile/save-profile'] = 'Api_mobile/save_profile';
$route['api/mobile/update_profile'] = 'Api_mobile/update_profile';
$route['api/mobile/update-profile'] = 'Api_mobile/update_profile';
$route['api/mobile/profile'] = 'Api_mobile/profile';
$route['api/mobile/check'] = 'Api_mobile/check';
$route['api/mobile/check_auth'] = 'Api_mobile/check';
$route['api/mobile/check-auth'] = 'Api_mobile/check';
$route['api/mobile/refresh_session'] = 'Api_mobile/refresh_session';
$route['api/mobile/refresh-session'] = 'Api_mobile/refresh_session';
$route['api/mobile/logout'] = 'Api_mobile/logout';
$route['api/mobile/check_phone_exists'] = 'Api_mobile/check_phone_exists';
$route['api/mobile/check-phone-exists'] = 'Api_mobile/check_phone_exists';
$route['api/mobile/check-phone'] = 'Api_mobile/check_phone_exists';
$route['api/mobile/change_phone'] = 'Api_mobile/change_phone';
$route['api/mobile/change-phone'] = 'Api_mobile/change_phone';
$route['api/mobile/verify_phone_change'] = 'Api_mobile/verify_phone_change';
$route['api/mobile/verify-phone-change'] = 'Api_mobile/verify_phone_change';
$route['api/mobile/delete_account'] = 'Api_mobile/delete_account';
$route['api/mobile/delete-account'] = 'Api_mobile/delete_account';

// Wishlist
$route['api/mobile/wishlist/store']  = 'Api_mobile/wishlist_store';
$route['api/mobile/wishlist/check']  = 'Api_mobile/wishlist_check';
$route['api/mobile/wishlist/list']   = 'Api_mobile/wishlist_list';
$route['api/mobile/wishlist/remove'] = 'Api_mobile/wishlist_remove';

// Referral
$route['api/mobile/referral/apply']  = 'Api_mobile/referral_apply';
$route['api/mobile/referral/list']   = 'Api_mobile/referral_list';
$route['api/mobile/referral/stats']  = 'Api_mobile/referral_stats';
