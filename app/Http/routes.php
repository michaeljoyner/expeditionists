<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@home');
Route::get('getinvolved', 'PagesController@getInvolved');
Route::get('profiles/{slug}', 'PagesController@profile');
Route::get('expeditions/{slug}', 'PagesController@expedition');
Route::get('about', 'PagesController@about');
Route::get('gallery', 'PagesController@gallery');
Route::get('videos', 'PagesController@videos');
Route::get('expeditions', 'PagesController@expeditions');
Route::get('expeditionists', 'PagesController@expeditionists');
Route::get('contact', 'ContactController@show');
Route::post('contact', 'ContactController@postMessage');

Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@show');

Route::post('applications/signup', 'VolunteerApplicationsController@handleApplication');

Route::post('newsletter/subscribe', 'NewsletterController@subscribe');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/', 'PagesController@dashboard');
        Route::get('logout', 'AuthController@doLogout');
        Route::get('register', 'UsersController@showRegister');
        Route::get('users', 'UsersController@index');
        Route::post('users/register', 'UsersController@postRegistration');
        Route::get('users/{id}/edit', 'UsersController@edit');
        Route::post('users/{id}/edit', 'UsersController@update');
        Route::delete('users/{id}', 'UsersController@delete');
        Route::get('users/password/reset', 'UsersController@showPasswordReset');
        Route::post('users/password/reset', 'UsersController@doPasswordReset');

        Route::get('profiles/{id}', 'ProfilesController@show');
        Route::get('profiles/{id}/edit', 'ProfilesController@edit');
        Route::post('profiles/{id}', 'ProfilesController@update');
        Route::delete('profiles/{id}', 'ProfilesController@delete');

        Route::get('expeditions', 'ExpeditionsController@index');
        Route::get('expeditions/create', 'ExpeditionsController@create');
        Route::get('expeditions/{id}', 'ExpeditionsController@show');
        Route::post('expeditions', 'ExpeditionsController@store');
        Route::get('expeditions/{id}/edit', 'ExpeditionsController@edit');
        Route::post('expeditions/{id}', 'ExpeditionsController@update');
        Route::delete('expeditions/{id}', 'ExpeditionsController@delete');
        Route::get('expeditions/{id}/sponsors', 'ExpeditionsController@editSponsors');
        Route::post('expeditions/{id}/sponsors', 'ExpeditionsController@setSponsors');
        Route::get('expeditions/{id}/charities', 'ExpeditionsController@editCharities');
        Route::post('expeditions/{id}/charities', 'ExpeditionsController@setCharities');
        Route::get('expeditions/{id}/team', 'ExpeditionsController@editTeam');
        Route::post('expeditions/{id}/team', 'ExpeditionsController@setTeam');

        Route::get('expeditions/{expeditionId}/locations', 'MapLocationsController@index');
        Route::post('expeditions/{expeditionId}/locations', 'MapLocationsController@store');
        Route::get('expeditions/{expeditionId}/locations/{locationId}/edit', 'MapLocationsController@edit');
        Route::post('locations/{locationId}', 'MapLocationsController@update');
        Route::delete('locations/{locationId}', 'MapLocationsController@delete');

        Route::get('expeditions/{id}/teammembers/edit', 'ExpeditionTeamMembersController@edit');
        Route::post('expeditions/{id}/teammembers', 'ExpeditionTeamMembersController@setTeam');

        Route::get('content/editable/{id}/edit', 'EditablesController@edit');
        Route::post('content/editable/{id}', 'EditablesController@update');
        Route::get('content/pages/{page}', 'EditablesController@showEditablePage');

        Route::post('uploads/profiles/{id}/profilepic', 'ProfilesController@storeProfilePic');
        Route::post('uploads/expeditions/{id}/coverpic', 'ExpeditionsController@storeCoverPic');
        Route::post('uploads/sponsors/{id}/image', 'SponsorsController@storeImage');
        Route::post('uploads/charities/{id}/image', 'CharitiesController@storeImage');
        Route::post('uploads/blog/{id}/image', 'BlogController@storeImage');

        Route::get('file-resources', 'FileResourcesController@index');
        Route::post('file-resources/{resourceId}/uploads', 'FileResourcesController@storeFile');


        Route::get('uploads/galleries/{galleryId}/images', 'GalleriesController@getGalleryImages');
        Route::post('uploads/galleries/{id}/images', 'GalleriesController@storeImage');
        Route::delete('uploads/galleries/{galleryId}/images/{imageId}', 'GalleriesController@deleteImage');

        Route::get('sponsors', 'SponsorsController@index');
        Route::get('sponsors/order', 'SponsorsOrderController@show');
        Route::post('sponsors/order', 'SponsorsOrderController@update');
        Route::post('patrons/order', 'SponsorsOrderController@update');
        Route::get('sponsors/create', 'SponsorsController@createNewDefaultSponsor');
        Route::get('sponsors/{id}', 'SponsorsController@show');
        Route::get('sponsors/{id}/edit', 'SponsorsController@edit');
        Route::post('sponsors/{id}', 'SponsorsController@update');
        Route::delete('sponsors/{id}', 'SponsorsController@delete');

        Route::get('charities', 'CharitiesController@index');
        Route::get('charities/order', 'CharitiesOrderController@show');
        Route::post('charities/order', 'CharitiesOrderController@update');
        Route::get('charities/create', 'CharitiesController@createNewDefaultCharity');
        Route::get('charities/{id}', 'CharitiesController@show');
        Route::get('charities/{id}/edit', 'CharitiesController@edit');
        Route::post('charities/{id}', 'CharitiesController@update');
        Route::delete('charities/{id}', 'CharitiesController@delete');

        Route::post('blog/images/upload', 'BlogImagesController@store');

        Route::get('blog', 'BlogController@index');
        Route::get('blog/create', 'BlogController@create');
        Route::get('blog/{id}/setimage', 'BlogController@editCoverImage');
        Route::post('blog', 'BlogController@store');
        Route::get('blog/{id}/edit', 'BlogController@edit');
        Route::post('blog/{id}/publish', 'BlogController@togglePublished');
        Route::post('blog/{id}', 'BlogController@update');
        Route::delete('blog/{id}', 'BlogController@delete');



        Route::get('team', 'TeamMembersController@index');
        Route::post('team/order', 'TeamMembersController@setTeamOrder');
        Route::get('team/members/create', 'TeamMembersController@create');
        Route::get('team/members/{id}/edit', 'TeamMembersController@edit');
        Route::post('team/members', 'TeamMembersController@store');
        Route::post('team/members/{id}', 'TeamMembersController@update');
        Route::delete('team/members/{id}', 'TeamMembersController@delete');
        Route::post('uploads/team/members/{id}/profilepic', 'TeamMembersController@setProfilePic');

        Route::get('galleries/{id}/order', 'GalleriesController@showOrder');
        Route::post('galleries/{id}/order', 'GalleriesController@postOrder');

        Route::get('videos', 'VideosController@index');
        Route::get('videos/create', 'VideosController@create');
        Route::get('videos/{id}', 'VideosController@show');
        Route::post('videos', 'VideosController@store');
        Route::get('videos/{id}/edit', 'VideosController@edit');
        Route::post('videos/{id}', 'VideosController@update');
        Route::delete('videos/{id}', 'VideosController@delete');
        Route::post('videos/{id}/poster', 'VideosController@storePoster');

    });

    Route::group(['middleware' => 'guest'], function() {
        Route::get('login', 'AuthController@showLogin');
        Route::post('login', 'AuthController@doLogin');
    });

});


