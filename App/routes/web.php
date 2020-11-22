<?php

use \Prototurk\Core\Route;

//Route::get('/', function(){
//    return view('index', [
//        'username' => 'tayfunerbilen'
//    ]);
//});
//Route::get('/user/:id1/:id2', 'User@detail')->name('user');

Route::get('/', function(){
//    $articles = \Prototurk\Core\Database::table('articles')->get();
    return 'anasayfa';
});

Route::get('/@:username', function ($username) {
    return view('index', [
        'username' => $username
    ]);
})->where('username', '[a-z]+');

Route::get('/search/:search', function ($q) {
    return 'Aranan kelime = ' . rawurldecode($q);
})->where('search', '.*');

Route::prefix('/admin')->group(function () {

    Route::get('/?', function () {
        return 'admin home page';
    });

    Route::get('/users', function () {
        return 'admin user page';
    });

});

Route::get('/makaleler', 'Articles@index')->name('articles');
Route::get('/makale/:url', 'Articles@detail')->name('article');

Route::redirect('/php-dersleri2', '/php');