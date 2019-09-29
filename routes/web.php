<?php

use App\User;
use App\Post;

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
    return view('welcome');
});

Route::get('/create/{id}', function ($id) {
  $user = User::findOrFail($id);
  $post = new Post(['title'=>'Post Title', 'body'=>'Post Body']);
  $user->posts()->save($post);
});

Route::get('/read/{id}', function ($id) {
  $user = User::findOrFail($id);
  $posts = $user->posts;
  //return $posts;
  foreach($posts as $post) {
    echo '<h1>' . $post->title . '</h1><br />';
    echo $post->body . ' ' . $post->id . '<br />';
    echo '<hr />';
  }
});
