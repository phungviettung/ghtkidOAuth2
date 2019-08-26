<?php

// trong

Route::get('/', function () {
    return view('welcome');
});




/**
 * Route API get Uesr
 */

Route::get('ViPhamQuyen', function () {
   return view('403');
})->name('viphamquyen');

Route::get('getlogin','AppClientController@getlogin')->name('getlogin');
Route::post('postlogin','AppClientController@login');
Route::get('getlogout','AppClientController@logout');

route::group(
    ['middleware'=> 'end_user'], function(){
        Route::get('profile', 'ProfileController@index');
        Route::post('profile-update', 'ProfileController@upLoad');
        Route::post('changepass', 'ProfileController@changepass');
        Route::get('profile/logout', 'ProfileController@logout');
    });

route::group(
    ['middleware'=> 'client'], function(){
	route::group(
        ['prefix'=> 'client/app'], function(){

		route::get('listapp','AppClientController@getlistapp');

		route::post('addapp','AppClientController@addapp');

		route::get('geteditapp','AppClientController@geteditapp');

		route::get('getdelapp','AppClientController@getdelapp');

		route::get('getbtnapp','AppClientController@getbtnapp');

		route::post('editapp/{idapp}','AppClientController@editapp');

		route::get('delapp/{idapp}','AppClientController@delapp');

	});
});
///

route::group(
    ['middleware'=> 'admin'], function(){

    Route::group(['prefix'=>'admin'],function(){

        Route::get('user',[
            'as'=>'admingetuser',
            'uses'=>'AdminController@getUser'
        ]);

        Route::get('app',[
            'as'=>'admingetapp',
            'uses'=>'AdminController@getApp'
        ]);

        Route::get('dashboard',[
            'as'=>'admindashboard',
            'uses'=>'AdminController@getDashboard'
        ]);

    });

});

Route::group(['prefix'=>'oauth2'],function() {
    Route::get('oauth', [
        'as' => 'oauth',
        'uses' => 'Oauth2Controller@checkLogin'
    ]);

});
/*
Route::get('oauth2/oauth', function() {
    $id=$_GET['appid'];
    $url=$_GET['callback'];
    $arr = array("appid"=>$id, "url"=>$url);
    return response()->json($arr, 200);
});
*/
/**
 * Route API get Uesr
 */
route::get('/login','Oauth2Controller@checkLogin');
route::get('/oauth2/getUser','ApiGetUser@getuser');
/**
 * -------------------
 */


