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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::group(['namespace' => 'Frontend'], function () {
    Route::any('/', 'SiteController@index')->name('home');

    Route::any('/about', 'SiteController@about')->name('about');
    Route::any('/faq', 'SiteController@faq')->name('frontfaq');
    Route::any('/tnc', 'SiteController@tnc')->name('fronttnc');


    /* social login */
    Route::get('/login/{social}', 'SiteController@socialLogin')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');

    Route::get('/login/{social}/callback', 'SiteController@handleProviderCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');

    //contact
    Route::any('/contact', 'SiteController@contact')->name('contact');
    Route::any('/contact/form', 'SiteController@contactForm')->name('contactForm');

    //search and filter
    Route::any('/search', 'SiteController@search')->name('search');
    Route::any('/search/filter', 'SiteController@searchFilter')->name('searchFilter');

    //passenger
    Route::any('/booking/{id?}', 'PassengersController@booking')->name('booking');
    Route::any('/passenger/detail', 'PassengersController@collectInformation')->name('passengerDetail');
    Route::any('/passenger/add', 'PassengersController@storeInformation')->name('passengerAdd');
    //Route::post('/passenger/add', 'PassengersController@sendSms')->name('sendSms');
   
    //vendor
    Route::group(['middleware' => 'vendor', 'prefix' => 'vendor'], function () {

        Route::any('/profile', 'VendorsController@profileVendor')->name('profileVendor');
        Route::any('/editProfile', 'VendorsController@editProfileVendor')->name('editProfileVendor');
        Route::any('/updateProfile', 'VendorsController@updateProfileVendor')->name('updateProfileVendor');

        Route::group(['prefix' => 'vehicles'], function () {

            Route::any('/', 'VehiclesController@index')->name('vehiclesVendor');

            Route::any('/create', 'VehiclesController@create')->name('createVehiclesVendor');

            Route::any('/store', 'VehiclesController@store')->name('storeVehiclesVendor');

            Route::any('/show/{id?}', 'VehiclesController@show')->name('showVehiclesVendor');
//edited
            Route::any('/createSeatLayout', 'VehiclesController@createSeatLayout')->name('createSeatLayout');

            Route::any('/showSeatLayout', 'VehiclesController@showSeatLayout')->name('showSeatLayout');

           Route::any('/saveSeatLayout', 'VehiclesController@saveSeatLayout')->name('saveSeatLayout');

           Route::any('/editSeatLayout', 'VehiclesController@editSeatLayout')->name('editSeatLayout');
//edited
            Route::any('/edit/{id?}', 'VehiclesController@edit')->name('editVehiclesVendor');

            Route::any('/update', 'VehiclesController@update')->name('updateVehiclesVendor');

            Route::any('/delete', 'VehiclesController@destroy')->name('destroyVehiclesVendor');


        });

        Route::group(['prefix' => 'schedules'], function () {

            Route::any('/', 'SchedulesController@index')->name('schedulesVendor');

            Route::any('/create', 'SchedulesController@create')->name('createSchedulesVendor');

            Route::any('/store', 'SchedulesController@store')->name('storeSchedulesVendor');

            Route::any('/show/{id?}', 'SchedulesController@show')->name('showSchedulesVendor');

            Route::any('/edit/{id?}', 'SchedulesController@edit')->name('editSchedulesVendor');

            Route::any('/update', 'SchedulesController@update')->name('updateSchedulesVendor');

            Route::any('/delete', 'SchedulesController@destroy')->name('destroySchedulesVendor');

          


        });

        Route::group(['prefix' => 'bookings'], function () {

            Route::any('/', 'BookingsController@index')->name('bookingsVendor');

            Route::any('/create', 'BookingsController@create')->name('createBookingsVendor');

            Route::any('/store', 'BookingsController@store')->name('storeBookingsVendor');

            Route::any('/show/{id?}', 'BookingsController@show')->name('showBookingsVendor');

            Route::any('/edit/{id?}', 'BookingsController@edit')->name('editBookingsVendor');

            Route::any('/update', 'BookingsController@update')->name('updateBookingsVendor');

            Route::any('/delete', 'BookingsController@destroy')->name('destroyBookingsVendor');


        });

    });

    //traveller
    Route::group(['middleware' => 'traveller'], function () {
        Route::any('/profile', 'TravellersController@profile')->name('profile');
        Route::any('/editProfile', 'TravellersController@editProfile')->name('editProfile');
        Route::any('/updateProfile', 'TravellersController@updateProfile')->name('updateProfile');
        Route::any('/history', 'TravellersController@history')->name('history');
    });

    //register, login and logout
    Route::any('/loginUser', 'LoginController@loginUser')->name('loginUser');
    Route::any('/profile/logout', 'LoginController@userLogout')->name('userLogout');
    Route::any('/registerVendor', 'LoginController@registerVendor')->name('registerVendor');
    Route::any('/validateUser/{id?}', 'LoginController@validateUser')->name('validateVendor');
    Route::any('/registerUser', 'LoginController@registerUser')->name('registerUser');

    //api login
    Route::get('/redirect/{service}', 'SiteController@redirect');
    Route::get('/callback/{service}', 'SiteController@callback');
    Route::get('/login/{social}', 'SiteController@socialLogin')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');
    Route::get('/login/{social}/callback', 'SiteController@handleProviderCallback')->where('social', 'twitter|facebook|linkedin|google|github|bitbucket');


});


Route::namespace('Backend')->group(function () {
    Route::any('/login', 'UsersController@login')->name('login');
    Route::any('/logout', 'UsersController@logout')->name('logout');
});



Route::group(['namespace' => 'Backend', 'prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('backend.dashboard');
    })->name('admin');

    Route::group(['prefix' => 'users'], function () {

        Route::any('/', 'UsersController@index')->name('users');

        Route::any('/create', 'UsersController@create')->name('createUser');

        Route::any('/store', 'UsersController@store')->name('storeUser');

        Route::any('/show/{id?}', 'UsersController@show')->name('showUser');

        Route::any('/view', 'UsersController@view')->name('viewUser');

        Route::any('/edit/{id?}', 'UsersController@edit')->name('editUser');

        Route::any('/update', 'UsersController@update')->name('updateUser');

        Route::any('/delete', 'UsersController@destroy')->name('destroyUser');


    });

    Route::group(['prefix' => 'bustypes'], function () {

        Route::any('/', 'BustypesController@index')->name('bustypes');

        Route::any('/create', 'BustypesController@create')->name('createBustype');

        Route::any('/store', 'BustypesController@store')->name('storeBustype');

        Route::any('/view', 'BustypesController@view')->name('viewBustype');

        Route::any('/show/{id?}', 'BustypesController@show')->name('showBustype');

        Route::any('/edit/{id?}', 'BustypesController@edit')->name('editBustype');

        Route::any('/update', 'BustypesController@update')->name('updateBustype');

        Route::any('/delete', 'BustypesController@destroy')->name('destroyBustype');


    });

    Route::group(['prefix' => 'cities'], function () {

        Route::any('/', 'CitiesController@index')->name('cities');

        Route::any('/create', 'CitiesController@create')->name('createCity');

        Route::any('/store', 'CitiesController@store')->name('storeCity');

        Route::any('/view', 'CitiesController@view')->name('viewCity');

        Route::any('/show/{id?}', 'CitiesController@show')->name('showCity');

        Route::any('/edit/{id?}', 'CitiesController@edit')->name('editCity');

        Route::any('/update', 'CitiesController@update')->name('updateCity');

        Route::any('/delete', 'CitiesController@destroy')->name('destroyCity');


    });

    Route::group(['prefix' => 'routes'], function () {

        Route::any('/', 'RoutesController@index')->name('routes');

        Route::any('/create', 'RoutesController@create')->name('createRoute');

        Route::any('/store', 'RoutesController@store')->name('storeRoute');

        Route::any('/show/{id?}', 'RoutesController@show')->name('showRoute');

        Route::any('/view', 'RoutesController@view')->name('viewRoute');

        Route::any('/edit/{id?}', 'RoutesController@edit')->name('editRoute');

        Route::any('/update', 'RoutesController@update')->name('updateRoute');

        Route::any('/delete', 'RoutesController@destroy')->name('destroyRoute');


    });

    Route::group(['prefix' => 'buses'], function () {

        Route::any('/', 'BusesController@index')->name('buses');

        Route::any('/create', 'BusesController@create')->name('createBus');

        Route::any('/store', 'BusesController@store')->name('storeBus');

        Route::any('/show/{id?}', 'BusesController@show')->name('showBus');

        Route::any('/view', 'BusesController@view')->name('viewBus');

        Route::any('/edit/{id?}', 'BusesController@edit')->name('editBus');

        Route::any('/update', 'BusesController@update')->name('updateBus');

        Route::any('/delete', 'BusesController@destroy')->name('destroyBus');
        Route::any('/seat/show/{id?}', 'BusesController@showSeatLayout')->name('showSeatLayout');
        Route::any('/seat/create/{id?}', 'BusesController@createSeatLayout')->name('createSeatLayout');
        Route::any('/seat/edit/{id?}', 'BusesController@editSeatLayout')->name('editSeatLayout');
        Route::any('/seat/save', 'BusesController@saveSeatLayout')->name('saveSeatLayout');

    });

    Route::group(['prefix' => 'schedules'], function () {

        Route::any('/', 'SchedulesController@index')->name('schedules');

        Route::any('/ajax/fetch','SchedulesController@ajaxFetch');


        Route::any('/create', 'SchedulesController@create')->name('createSchedule');

        Route::any('/store', 'SchedulesController@store')->name('storeSchedule');

        Route::any('/view', 'SchedulesController@view')->name('viewSchedule');

        Route::any('/show/{id?}', 'SchedulesController@show')->name('showSchedule');

        Route::any('/edit/{id?}', 'SchedulesController@edit')->name('editSchedule');

        Route::any('/update', 'SchedulesController@update')->name('updateSchedule');

        Route::any('/delete', 'SchedulesController@destroy')->name('destroySchedule');

        Route::any('/price/{id?}', 'SchedulesController@createSchedulePrice')->name('createSchedulePrice');

        Route::any('/price/show/{id?}', 'SchedulesController@showSchedulePrice')->name('showSchedulePrice');

        Route::any('/price/edit/{id?}', 'SchedulesController@editSchedulePrice')->name('editSchedulePrice');

    });

    Route::group(['prefix' => 'bookings'], function () {

        Route::any('/', 'BookingsController@index')->name('bookings');

        Route::any('/create', 'BookingsController@create')->name('createBooking');

        Route::any('/store', 'BookingsController@store')->name('storeBooking');

        Route::any('/show/{id?}', 'BookingsController@show')->name('showBooking');

        Route::any('/view', 'BookingsController@view')->name('viewBooking');

        Route::any('/edit/{id?}', 'BookingsController@edit')->name('editBooking');

        Route::any('/update', 'BookingsController@update')->name('updateBooking');

        Route::any('/delete', 'BookingsController@destroy')->name('destroyBooking');


    });

    Route::group(['prefix' => 'travellers'], function () {

        Route::any('/', 'TravellersController@index')->name('travellers');

        Route::any('/create', 'TravellersController@create')->name('createTraveller');

        Route::any('/store', 'TravellersController@store')->name('storeTraveller');

        Route::any('/show', 'TravellersController@show')->name('showTraveller');

        Route::any('/view', 'TravellersController@view')->name('viewTraveller');

        Route::any('/edit/{id?}', 'TravellersController@edit')->name('editTraveller');

        Route::any('/update', 'TravellersController@update')->name('updateTraveller');

        Route::any('/delete', 'TravellersController@destroy')->name('destroyTraveller');

    });

    Route::group(['prefix' => 'guests'], function () {

        Route::any('/', 'GuestsController@index')->name('guests');

        Route::any('/create', 'GuestsController@create')->name('createGuest');

        Route::any('/store', 'GuestsController@store')->name('storeGuest');

        Route::any('/show', 'GuestsController@show')->name('showGuest');

        Route::any('/view', 'GuestsController@view')->name('viewGuest');

        Route::any('/edit/{id?}', 'GuestsController@edit')->name('editGuest');

        Route::any('/update', 'GuestsController@update')->name('updateGuest');

        Route::any('/delete', 'GuestsController@destroy')->name('destroyGuest');

    });

    Route::group(['prefix' => 'vendors'], function () {

        Route::any('/', 'VendorsController@index')->name('vendors');

        Route::any('/create', 'VendorsController@create')->name('createVendor');

        Route::any('/store', 'VendorsController@store')->name('storeVendor');

        Route::any('/show', 'VendorsController@show')->name('showVendor');

        Route::any('/view', 'VendorsController@view')->name('viewVendor');

        Route::any('/edit/{id?}', 'VendorsController@edit')->name('editVendor');

        Route::any('/update', 'VendorsController@update')->name('updateVendor');

        Route::any('/delete', 'VendorsController@destroy')->name('destroyVendor');


    });

    Route::group(['prefix' => 'admins'], function () {

        Route::any('/', 'AdminsController@index')->name('admins');

        Route::any('/create', 'AdminsController@create')->name('createAdmin');

        Route::any('/store', 'AdminsController@store')->name('storeAdmin');

        Route::any('/show/{id?}', 'AdminsController@show')->name('showAdmin');

        Route::any('/view', 'AdminsController@view')->name('viewAdmin');

        Route::any('/edit/{id?}', 'AdminsController@edit')->name('editAdmin');

        Route::any('/update', 'AdminsController@update')->name('updateAdmin');

        Route::any('/delete', 'AdminsController@destroy')->name('destroyAdmin');


    });

    Route::group(['prefix' => 'faq'], function () {

        Route::any('/', 'FAQController@index')->name('faq');

        Route::any('/create', 'FAQController@create')->name('createfaq');

        Route::any('/store', 'FAQController@store')->name('storefaq');

        Route::any('/show/{id?}', 'FAQController@show')->name('showfaq');

        Route::any('/view', 'FAQController@view')->name('viewfaq');

        Route::any('/edit/{id?}', 'FAQController@edit')->name('editfaq');

        Route::any('/update', 'FAQController@update')->name('updatefaq');

        Route::any('/delete', 'FAQController@destroy')->name('destroyfaq');


    });

    Route::group(['prefix' => 'tnc'], function () {

        Route::any('/', 'TNCController@index')->name('tnc');

        Route::any('/create', 'TNCController@create')->name('createtnc');

        Route::any('/store', 'TNCController@store')->name('storetnc');

        Route::any('/show/{id?}', 'TNCController@show')->name('showtnc');

        Route::any('/edit/{id?}', 'TNCController@edit')->name('edittnc');

        Route::any('/update', 'TNCController@update')->name('updatetnc');

        Route::any('/delete', 'TNCController@destroy')->name('destroytnc');


    });

    Route::group(['prefix' => 'banners'], function () {

        Route::any('/', 'BannersController@index')->name('banners');

        Route::any('/create', 'BannersController@create')->name('createBanner');

        Route::any('/store', 'BannersController@store')->name('storeBanner');

        Route::any('/show/{id?}', 'BannersController@show')->name('showBanner');

        Route::any('/edit/{id?}', 'BannersController@edit')->name('editBanner');

        Route::any('/update', 'BannersController@update')->name('updateBanner');

        Route::any('/delete', 'BannersController@destroy')->name('destroyBanner');


    });

    Route::group(['prefix' => 'galleries'], function () {

        Route::any('/', 'GalleriesController@index')->name('galleries');

        Route::any('/create', 'GalleriesController@create')->name('createGallery');

        Route::any('/store', 'GalleriesController@store')->name('storeGallery');

        Route::any('/show/{id?}', 'GalleriesController@show')->name('showGallery');

        Route::any('/edit/{id?}', 'GalleriesController@edit')->name('editGallery');

        Route::any('/update', 'GalleriesController@update')->name('updateGallery');

        Route::any('/delete', 'UsersController@destroy')->name('destroyGallery');


    });

    Route::group(['prefix' => 'blogs'], function () {

        Route::any('/', 'BlogsController@index')->name('blogs');

        Route::any('/create', 'BlogsController@create')->name('createBlog');

        Route::any('/store', 'BlogsController@store')->name('storeBlog');

        Route::any('/show/{id?}', 'BlogsController@show')->name('showBlog');

        Route::any('/edit/{id?}', 'BlogsController@edit')->name('editBlog');

        Route::any('/update', 'BlogsController@update')->name('updateBlog');

        Route::any('/delete', 'BlogsController@destroy')->name('destroyBlog');


    });

    Route::group(['prefix' => 'menus'], function () {

        Route::any('/', 'MenusController@index')->name('menus');

        Route::any('/create', 'MenusController@create')->name('createMenu');

        Route::any('/store', 'MenusController@store')->name('storeMenu');

        Route::any('/show/{id?}', 'MenusController@show')->name('showMenu');

        Route::any('/edit/{id?}', 'MenusController@edit')->name('editMenu');

        Route::any('/update', 'MenusController@update')->name('updateMenu');

        Route::any('/delete', 'MenusController@destroy')->name('destroyMenu');


    });

    Route::group(['prefix' => 'teams'], function () {

        Route::any('/', 'TeamsController@index')->name('teams');

        Route::any('/create', 'TeamsController@create')->name('createTeam');

        Route::any('/store', 'TeamsController@store')->name('storeTeam');

        Route::any('/show/{id?}', 'TeamsController@show')->name('showTeam');

        Route::any('/view', 'TeamsController@view')->name('viewTeam');

        Route::any('/edit/{id?}', 'TeamsController@edit')->name('editTeam');

        Route::any('/update', 'TeamsController@update')->name('updateTeam');

        Route::any('/delete', 'TeamsController@destroy')->name('destroyTeam');


    });

    Route::group(['prefix' => 'testimonials'], function () {

        Route::any('/', 'TestimonialsController@index')->name('testimonials');

        Route::any('/create', 'TestimonialsController@create')->name('createTestimonial');

        Route::any('/store', 'TestimonialsController@store')->name('storeTestimonial');

        Route::any('/show/{id?}', 'TestimonialsController@show')->name('showTestimonial');

        Route::any('/view', 'TestimonialsController@view')->name('viewTestimonial');

        Route::any('/edit/{id?}', 'TestimonialsController@edit')->name('editTestimonial');

        Route::any('/update', 'TestimonialsController@update')->name('updateTestimonial');

        Route::any('/delete', 'TestimonialsController@destroy')->name('destroyTestimonial');


    });

    Route::group(['prefix' => 'feedbacks'], function () {

        Route::any('/', 'FeedbacksController@index')->name('feedbacks');

//        Route::any('/create', 'FeedbacksController@create')->name('createFeedback');

//        Route::any('/store', 'FeedbacksController@store')->name('storeFeedback');

        Route::any('/show/{id?}', 'FeedbacksController@show')->name('showFeedback');

//        Route::any('/edit/{id?}', 'FeedbacksController@edit')->name('editFeedback');

//        Route::any('/update', 'FeedbacksController@update')->name('updateFeedback');

        Route::any('/delete', 'FeedbacksController@destroy')->name('destroyFeedback');


    });

    Route::group(['prefix' => 'whyus'], function () {

        Route::any('/', 'WhyusController@index')->name('whyus');

        Route::any('/create', 'WhyusController@create')->name('createWhyus');

        Route::any('/store', 'WhyusController@store')->name('storeWhyus');

        Route::any('/show/{id?}', 'WhyusController@show')->name('showWhyus');

        Route::any('/view', 'WhyusController@view')->name('viewWhyus');

        Route::any('/edit/{id?}', 'WhyusController@edit')->name('editWhyus');

        Route::any('/update', 'WhyusController@update')->name('updateWhyus');

        Route::any('/delete', 'WhyusController@destroy')->name('destroyWhyus');


    });


    Route::group(['prefix' => 'whatweoffer'], function () {

        Route::any('/', 'WhatweofferController@index')->name('whatweoffer');

        Route::any('/create', 'WhatweofferController@create')->name('createWhatweoffer');

        Route::any('/store', 'WhatweofferController@store')->name('storeWhatweoffer');

        Route::any('/show/{id?}', 'WhatweofferController@show')->name('showWhatweoffer');

        Route::any('/edit/{id?}', 'WhatweofferController@edit')->name('editWhatweoffer');

        Route::any('/update', 'WhatweofferController@update')->name('updateWhatweoffer');

        Route::any('/delete', 'WhatweofferController@destroy')->name('destroyWhatweoffer');

    });


    Route::group(['prefix' => 'whoweare'], function () {

        Route::any('/', 'WhoweareController@index')->name('whoweare');

        Route::any('/create', 'WhoweareController@create')->name('createWhoweare');

        Route::any('/store', 'WhoweareController@store')->name('storeWhoweare');

        Route::any('/show/{id?}', 'WhoweareController@show')->name('showWhoweare');

        Route::any('/edit/{id?}', 'WhoweareController@edit')->name('editWhoweare');

        Route::any('/update', 'WhoweareController@update')->name('updateWhoweare');

        Route::any('/delete', 'WhoweareController@destroy')->name('destroyWhoweare');


    });

});



