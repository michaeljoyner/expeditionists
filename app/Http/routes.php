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
Route::get('expeditions', 'PagesController@expeditions');
Route::get('expeditionists', 'PagesController@expeditionists');
Route::post('contact', function() {
    return response()->json('shot bru');
});

Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@show');


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
        Route::get('expeditions/{id}/team', 'ExpeditionsController@editTeam');
        Route::post('expeditions/{id}/team', 'ExpeditionsController@setTeam');

        Route::get('content/editable/{id}/edit', 'EditablesController@edit');
        Route::post('content/editable/{id}', 'EditablesController@update');
        Route::get('content/pages/{page}', 'EditablesController@showEditablePage');

        Route::post('uploads/profiles/{id}/profilepic', 'ProfilesController@storeProfilePic');
        Route::post('uploads/expeditions/{id}/coverpic', 'ExpeditionsController@storeCoverPic');
        Route::post('uploads/sponsors/{id}/image', 'SponsorsController@storeImage');
        Route::post('uploads/charities/{id}/image', 'CharitiesController@storeImage');
        Route::post('uploads/blog/{id}/image', 'BlogController@storeImage');


        Route::get('uploads/galleries/{galleryId}/images', 'GalleriesController@getGalleryImages');
        Route::post('uploads/galleries/{id}/images', 'GalleriesController@storeImage');
        Route::delete('uploads/galleries/{galleryId}/images/{imageId}', 'GalleriesController@deleteImage');

        Route::get('sponsors', 'SponsorsController@index');
        Route::get('sponsors/create', 'SponsorsController@createNewDefaultSponsor');
        Route::get('sponsors/{id}', 'SponsorsController@show');
        Route::get('sponsors/{id}/edit', 'SponsorsController@edit');
        Route::post('sponsors/{id}', 'SponsorsController@update');
        Route::delete('sponsors/{id}', 'SponsorsController@delete');

        Route::get('charities', 'CharitiesController@index');
        Route::get('charities/create', 'CharitiesController@createNewDefaultCharity');
        Route::get('charities/{id}', 'CharitiesController@show');
        Route::get('charities/{id}/edit', 'CharitiesController@edit');
        Route::post('charities/{id}', 'CharitiesController@update');
        Route::delete('charities/{id}', 'CharitiesController@delete');

        Route::get('blog', 'BlogController@index');
        Route::get('blog/create', 'BlogController@create');
        Route::get('blog/{id}/setimage', 'BlogController@editCoverImage');
        Route::post('blog', 'BlogController@store');
        Route::get('blog/{id}/edit', 'BlogController@edit');
        Route::post('blog/{id}/publish', 'BlogController@togglePublished');
        Route::post('blog/{id}', 'BlogController@update');
        Route::delete('blog/{id}', 'BlogController@delete');


    });

    Route::group(['middleware' => 'guest'], function() {
        Route::get('login', 'AuthController@showLogin');
        Route::post('login', 'AuthController@doLogin');
    });

});


