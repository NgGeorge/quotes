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
//Route::get('/api/search', 'apiController@search');
/*
Route::get('/api/search', function() {
    return json_encode(["menu" => [
  "id" => "file",
  "value" => "File",
  "popup" => [
    "menuitem" => [
      ["value" => "New", "onclick" => "CreateNewDoc()"],
      ["value" => "Open", "onclick" => "OpenDoc()"],
      ["value" => "Close", "onclick" => "CloseDoc()"]
    ]
  ]
]]);
});
*/
Route::get('/getAd', 'apiController@getAd');
Route::get('/test', function () {
    return view('welcome', ['quotes' => [
        'The people who are crazy enough to think they can change the world are the ones who do.',
        'Your work is going to fill a large part of your life, and the only way to be truly satisfied is to do what you believe is great work. And the only way to do great work is to love what you do. If you haven’t found it yet, keep looking. Don’t settle. As with all matters of the heart, you’ll know when you find it',
        'I’ve always been attracted to the more revolutionary changes. I don’t know why. Because they’re harder. They’re much more stressful emotionally. And you usually go through a period where everybody tells you that you’ve completely failed.',
        'Remembering that you are going to die is the best way I know to avoid the trap of thinking you have something to lose. You are already naked. There is no reason not to follow your heart.',
        'Remembering that you are going to die is the best way I know to avoid the trap of thinking you have something to lose. You are already naked. There is no reason not to follow your heart.',
        'Remembering that you are going to die is the best way I know to avoid the trap of thinking you have something to lose. You are already naked. There is no reason not to follow your heart.',
        'Remembering that you are going to die is the best way I know to avoid the trap of thinking you have something to lose. You are already naked. There is no reason not to follow your heart.',
        'Remembering that you are going to die is the best way I know to avoid the trap of thinking you have something to lose. You are already naked. There is no reason not to follow your heart.'
    ]]);
});
