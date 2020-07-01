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

Route::get('/', function () {
    // return view('welcome');
   
});

Route::get('/', 'indexController@index');
Route::get('/explorehome', 'indexController@explorehome');
Route::get('/map', 'indexController@map');
Route::post('/search_property', 'SearchController@search_property');
Route::post('/set_search_params', 'SearchController@set_search_params');
Route::get('/search_properties', 'SearchController@search_properties');
Route::get('/filter_property_by_price', 'SearchController@filter_property_by_price');
Route::get('/filter_property_by_place', 'SearchController@filter_property_by_place');
Route::get('/filter_property_by_guests', 'SearchController@filter_property_by_guests');
Route::get('/filter_property_by_amenities', 'SearchController@filter_property_by_amenities');
Route::get('/filter_property_by_activities', 'SearchController@filter_property_by_activities');
Route::get('/filter_property_by_preferables', 'SearchController@filter_property_by_preferables');
Route::get('/set_search_dates', 'SearchController@set_search_dates');
Route::get('/get_search_properties', 'SearchController@get_search_properties');

Route::get('/myPlace/{id}', 'SearchController@myPlace');
Route::get('/myHoliday/{id}', 'SearchController@myHoliday');
Route::get('/myComfort/{id}', 'SearchController@myComfort');
Route::get('/mySeason/{id}', 'SearchController@mySeason');


Route::get('/searchDetails/{id}', 'SearchController@searchDetails');
Route::post('/setSessionDataForPurchase', 'SearchController@setSessionDataForPurchase');
Route::get('/front_foodblog', 'FoodController@front_foodblog');
Route::get('/contact', 'indexController@contact');
Route::get('/customer_signup', 'indexController@customer_signup');
Route::get('/foodblog_details_front/{id}', 'FoodController@foodblog_details_front');
Route::get('/terms_and_conditions', 'indexController@terms_and_conditions');
Route::get('/cancellation_policy', 'indexController@cancellation_policy');

//places to see details
Route::get('/pl_details_front/{id}', 'placeController@pl_details_front');

Route::get('/grace_details_front/{id}', 'FoodController@grace_details_front');
Route::get('/topexp_details_front/{id}', 'FoodController@topexp_details_front');

Route::get('/star_details/{id}', 'indexController@star_details');
Route::get('/exp_details_front/{id}', 'indexController@exp_details_front');
Route::get('/bigday/{id}', 'indexController@bigday');
Route::get('/adventure/{id}', 'indexController@adventure');
Route::get('/host_details/{id}', 'HostController@host_details');
Route::get('/front_grace', 'FoodController@front_grace');
Route::get('/front_exp', 'FoodController@front_exp');
Route::get('/all_place', 'placeController@all_place');

Route::get('/grace_all/{id}', 'FoodController@grace_all');
Route::get('/toprated_all/{id}', 'FoodController@toprated_all');
Route::get('/food_all/{id}', 'FoodController@food_all');
Route::get('/placeall', 'indexController@placeall');
Route::get('/allholiday', 'indexController@allHolidaySpots');
Route::get('/comfort', 'indexController@allComfortCategory');
Route::get('/allStartsExp', 'indexController@allStartsExprience');
Route::get('/allTopRatedExp', 'indexController@allTopratedExpData');
Route::get('/allRecomandedFoU', 'indexController@allRecomandedProperty');
Route::get('/allBigDay', 'indexController@allBigDay');
Route::get('/allSuperHost', 'indexController@allSuperHostData');
Route::get('/explore_all_homestays/{id}', 'FoodController@explore_all_homestays');





// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {

    Route::get('/', 'AdminController@login')->name('admin.login');
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    Route::post('/authenticate', 'AdminController@authenticate')->name('admin.authenticate');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/edit-profile', 'AdminController@editprofile')->name('admin.editprofile');
	//updatepass
	Route::post('/updatepass', 'AdminController@updatepass');
	Route::get('/main-categories', 'categoriesController@maincategoryListings');
	Route::get('/holiday-categories', 'categoriesController@holidaycategoryListings');
	Route::get('/holidayEditview/{id}', 'categoriesController@holidayEditview');
	//updateholiday
	Route::post('/updateholiday', 'categoriesController@updateholiday');
	Route::get('/comfort-categories', 'categoriesController@comfortcategoryListings');
	//addcomfort
	Route::post('/addcomfort', 'categoriesController@addcomfort');
	//comfortEditview
	Route::get('/comfortEditview/{id}', 'categoriesController@comfortEditview');
	//updateComfort
	Route::post('/updateComfort', 'categoriesController@updateComfort');
	Route::get('/place', 'placeController@managePlace');
	Route::post('/addplace', 'placeController@addplace');
	//Route::post('/updateplace', 'placeController@updateplace');
	//placeEdit
	Route::get('/placeEditview/{id}', 'placeController@placeEditview');
	//updateplace
	Route::post('/updateplace', 'placeController@updateplace');
	
	Route::post('/addholiday', 'categoriesController@addholiday');
	
	
	
	Route::get('/aminities', 'propertyController@manageaminities');
	Route::post('/addaminities', 'propertyController@addaminities');
	Route::get('/editamenity/{id}', 'propertyController@editamenity');
	Route::post('/updateamenity', 'propertyController@updateamenity');
	Route::get('/set_property_amenity', 'propertyController@set_property_amenity');
	Route::get('/unset_property_amenity', 'propertyController@unset_property_amenity');

	Route::get('/activities', 'propertyController@manageactivities');
	Route::post('/addactivity', 'propertyController@addactivity');
	Route::get('/editactivity/{id}', 'propertyController@editactivity');
	Route::post('/updateactivity', 'propertyController@updateactivity');
	Route::get('/set_property_activity', 'propertyController@set_property_activity');
	Route::get('/unset_property_activity', 'propertyController@unset_property_activity');

	Route::get('/preferables', 'propertyController@managepreferables');
	Route::post('/addpreferable', 'propertyController@addpreferable');
	Route::get('/editpreferable/{id}', 'propertyController@editpreferable');
	Route::post('/updatepreferable', 'propertyController@updatepreferable');
	Route::get('/set_property_preferable', 'propertyController@set_property_preferable');
	Route::get('/unset_property_preferable', 'propertyController@unset_property_preferable');
	
	Route::get('/add_room_ui/{id}', 'propertyController@add_room_ui');
	
	//room_editview
	Route::get('/room_editview/{id}', 'propertyController@room_editview');
	//update_room_details
	Route::post('/update_room_details', 'propertyController@update_room_details');
	
	Route::get('/add_room_pics/{id}', 'propertyController@add_room_pics');
	Route::post('/add_room_pics_submit', 'propertyController@add_room_pics_submit');
	
	//addPlaces_ui
	Route::get('/addPlaces_ui2/', 'propertyController@addPlaces_ui2');
	
	Route::get('/addPlaces_ui/', 'propertyController@addPlaces_ui');
	Route::get('/editShowPlaces/{id}', 'propertyController@editShowPlaces');
	Route::post('/updateShowPlaces', 'propertyController@updateShowPlaces');
	//insertproperty_details
	Route::post('/insertplaces_details', 'propertyController@insertplaces_details');
	Route::get('/showplaces_view', 'propertyController@showplaces_view');
	Route::get('/addplacestosee_properties/{id}', 'propertyController@addplacestosee_properties');
	Route::get('/add_more_details/{id}', 'propertyController@addPropertyMoreDetails');
	Route::get('/add_things_do_property/{id}', 'propertyController@addPropertyThingstoDo');
	Route::get('/update_smlistings_toprated/{id}', 'indexController@update_smlistings_toprated');
	Route::post('/add_more', 'propertyController@insertPropMoreDtls');
	//updateplacetoproperty
	Route::post('/updateplacetoproperty', 'HostController@updateplacetoproperty');
	//Route::post('/update_p2c', 'propertyController@update_p2c');
	
	
	Route::get('/property_details/{id}', 'propertyController@property_details');
	Route::post('/addproperty_room_details', 'propertyController@addproperty_room_details');
	
	Route::get('/delproperty/{id}', 'propertyController@delproperty');
	//del_room_pic
	Route::get('/del_room_pic/{id}', 'propertyController@del_room_pic');
	Route::get('/addProperty', 'propertyController@addProperty');
	
	Route::get('/viewPoperty', 'propertyController@viewPoperty');
	
	
    Route::post('/addproperty', 'propertyController@store');
    Route::post('/updateproperty', 'propertyController@updateproperty');
	
    Route::get('/showhost', 'HostController@showHost');
	//update_host_view
	Route::get('/update_host_view/{id}', 'HostController@update_host_view');
	//updatehostdetails
	Route::post('/updatehostdetails', 'HostController@updatehostdetails');
	
    
    
    Route::get('/add_exp_view', 'indexController@add_exp_view');	
	Route::post('/add_exp_details', 'indexController@add_exp_details');
	Route::get('/show_exp', 'indexController@show_exp');
	Route::get('/exp_details/{id}', 'indexController@exp_details');
	
	Route::post('/update_pro_to_exp', 'indexController@update_pro_to_exp');
	Route::post('/update_thingstopro', 'propertyController@update_thingstopro');
	
	
	Route::get('/add_bigday_view', 'indexController@add_bigday_view');
	Route::post('/add_bigday_details', 'indexController@add_bigday_details');
	Route::get('/show_bigDay', 'indexController@show_bigDay');
	Route::get('/bigday_details/{id}', 'indexController@bigday_details');
	//update_bigday_details
	Route::post('/update_bigday_details', 'indexController@update_bigday_details');
	
	Route::get('/update_smlistings_bigday/{id}', 'indexController@update_smlistings_bigday');
	Route::post('/update_pro_to_big', 'indexController@update_pro_to_big');
	
	
    Route::get('/addSuper_star', 'SSController@addSuper_star');
	
	Route::post('/add_superstar_details', 'SSController@add_superstar_details');
	
	Route::get('/show_star', 'SSController@show_star');
	
	//update_smlistings_superstar
	Route::get('/update_smlistings_superstar/{id}', 'SSController@update_smlistings_superstar');
	Route::post('/update_pro_to_superstar', 'SSController@update_pro_to_superstar');
	
	Route::get('/superstar_details/{id}', 'SSController@superstar_details');
	//update_superstar
	Route::post('/update_superstar_details', 'propertyController@update_superstar_details');
	
	Route::post('/update_exp_details', 'indexController@update_exp_details');
	
	
	
	Route::get('/addfood_blog', 'FoodController@addfood_blog');
	
	Route::post('/add_foodblog_details', 'FoodController@add_foodblog_details');
	
	Route::get('/showfood_blog', 'FoodController@showfood_blog');
	
	Route::get('/foodblog_details/{id}', 'FoodController@foodblog_details');
	Route::get('/foodblog_details_view/{id}', 'FoodController@foodblog_details_view');
	//update_foodblog_details
	Route::post('/update_foodblog', 'FoodController@update_foodblog_details');

	
	Route::get('/get_smlistings_foodblog/{id}', 'FoodController@get_smlistings_foodblog');
	//update_smlistings_tofood
	Route::post('/update_smlistings_to_food','FoodController@update_smlistings_to_food');
	
	
	Route::get('/addgrace', 'FoodController@addgrace');
	Route::post('/add_grace_details', 'FoodController@add_grace_details');
	Route::get('/showgrace', 'FoodController@showgrace');
	Route::get('/foodblog_details/{id}', 'FoodController@foodblog_details');
	//get_smlistings_grace
	Route::get('/get_smlistings_grace/{id}', 'FoodController@get_smlistings_grace');
	//update_smlistings_to_grace
	Route::post('/update_smlistings_to_grace','FoodController@update_smlistings_to_grace');
	//front_grace
	Route::post('/update_placestoc_to_grace', 'FoodController@update_placestoc_to_grace');
	
	
	Route::get('/show_customer', 'CustomerController@show_customer');
	
	Route::get('/show_bookings', 'BookingController@show_bookings');
	
	Route::get('/booking_requested', 'BookingController@booking_requested');
	Route::get('/booking_approved', 'BookingController@booking_approved');
	//Route::get('/booking_details/{bid}', 'BookingController@booking_details');
	
	Route::get('/booking_details/{id}/{bid}', 'BookingController@booking_details');
	
	Route::get('/change_property_status/{id}/{param}', 'BookingController@change_property_status');
    
	Route::post('/approve_boking', 'BookingController@approve_boking');
	
	Route::get('/business_view', 'propertyController@business_view');
	
	Route::get('/addNAview', 'propertyController@addNAview');
	
	Route::post('/inserNAdate', 'propertyController@inserNAdate');
	
	Route::get('/showNAdate', 'propertyController@showNAdate');
	
	Route::get('/showEnqueryList', 'propertyController@showEnqueryList');
	
	Route::get('/showNewsLetrList', 'propertyController@showNewsLetrList');

});


//Host Segment

Route::prefix('host')->group(function () {

    Route::get('/', 'HostController@login');

    Route::get('/sign-up', 'HostController@signup');

    Route::post('/register', 'HostController@register');

    Route::post('/dologin', 'HostController@dologin');

    Route::get('/dashboard', 'HostController@dashboard');
	
    Route::get('/myprofile', 'HostController@myprofile');
	
	Route::post('/updatehostprofile', 'HostController@updatehostprofile');
	
	Route::get('/myview', 'HostController@myview');
	Route::post('/updatehostview', 'HostController@updatehostview');
	
	Route::get('/logout', 'HostController@logout');
	Route::get('/property_listing/{id}', 'HostController@property_listing');
	Route::get('/property_details/{id}', 'HostController@property_details');
	Route::get('/booking_requested/{id}', 'HostController@booking_requested');
	Route::get('/booking_approved/{id}', 'HostController@booking_approved');
	Route::get('/booking_details/{id}/{bid}', 'HostController@booking_details');
	
	Route::get('/change_property_status/{id}/{param}', 'HostController@change_property_status');
	
	Route::get('/approve_boking/{id}', 'HostController@approve_boking');
	
	Route::get('/host_profile', 'HostController@host_profile');
	
});


	Route::prefix('user')->group(function () {

		Route::post('/userLogin', 'UserController@userLogin');
		Route::post('/userSignup', 'UserController@userSignup');
		Route::post('/otp', 'UserController@getOtp');
		Route::post('/contact_msg', 'UserController@contact_msg');
		Route::post('/news', 'UserController@news');
		Route::get('/dashboard', 'UserController@dashboard');
		Route::get('/booking_process', 'UserController@booking_process');
		
		Route::get('/logout', 'UserController@logout');
		Route::post('/booking', 'UserController@booking');
		Route::get('/testSms', 'UserController@testSms');
		Route::post('/grequestBooking','UserController@grequestBooking');
		Route::get('/request_booking/{id}', 'UserController@request_booking');
		Route::get('/requested/{id}', 'UserController@requested');
		Route::get('/confirmed/{id}', 'UserController@confirmed');
		Route::post('/getBooked', 'UserController@getBooked');
		Route::get('/confirmbookings/{id}', 'UserController@confirmbookings');
		Route::get('/userprofile/{id}', 'UserController@userProfile');
		Route::get('/writereview/{id}', 'UserController@userpropertyreview');
		Route::post('/updateprofile', 'UserController@updateprofile');
		Route::post('/givereview', 'UserController@givereview');


	    
	});

	Route::post('/paytm-callback', 'UserController@paytmCallback');

//Route::prefix('frontend')->group(function () {

  //  Route::get('/', 'frontController@index');

    
//});
