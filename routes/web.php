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

Route::get('/', 'HomeController@index');

Route::get('blocked', function () {
    return 'Access denied.';
})->name('blocked');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/sponsors', 'SponsorController@index')->name('sponsors');

Route::resource('posts', 'PostController');

Route::get('/me/posts', 'UserPostController@index')->name('me.posts');

Route::post('/posts/{post}/comment', 'CommentController@store')->name('comments.store');

Route::delete('/comments/destroy/{comment}', 'CommentController@destroy')->name('comments.destroy');
Route::put('/comments/edit/{comment}', 'CommentController@update')->name('comments.edit');
Route::get('/comments/show/{comment}', 'CommentController@show')->name('comments.show');


Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');

    Route::get('/users', 'Dashboard\UserController@index')->name('dashboard.users');
    Route::get('/analytics', 'Dashboard\AnalyticsController@index')->name('dashboard.analytics');
    Route::get('/posts', 'Dashboard\PostController@index')->name('dashboard.post');

    Route::get('/{user}/edit', 'Dashboard\UserController@edit')->name('users.edit');
    Route::put('/{user}/block', 'Dashboard\BlockUserController@update')->name('users.block');
    Route::delete('/{user}/unblock', 'Dashboard\BlockUserController@destroy')->name('users.unblock');
    Route::put('/{user}', 'Dashboard\UserController@update')->name('users.update');

    Route::resource('sponsors', 'Dashboard\SponsorController');

    Route::resource('aliases', 'Unit\AliasController');
    Route::resource('newsletters', 'Dashboard\NewsletterController');

    Route::post('/news-letters/{newsletter}/mailparagraph', 'Dashboard\MailParagraphController@store')->name('mailParagraph.store');
    Route::delete('/mailparagraph/{paragraph}', 'Dashboard\MailParagraphController@destroy')->name('mailParagraph.destroy');
    Route::resource('units', 'Dashboard\UnitController');
});

Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::post('/contact/email', 'ContactController@store')->name('contact.store');

Route::get('/activate/{token}', 'ActivationController@show');
Route::get('kinderen', 'ChildrenController@index')->name('childrenpage');

Route::get('/pagesection/{pageSection}', 'PageSectionController@show')->name('pagesection.show');
Route::put('/pagesection/{pageSection}', 'PageSectionController@update')->name('pagesection.update');
