<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {

    //============>> NEW CODE <<============//

    return view('post', [
        'post' => Post::find($slug)
    ]);

    //============>> OLD CODE <<============//

    //path:
    //=====
    // $path = __DIR__ . "./../resources/posts/{$slug}.html";

    //check if the file exist:
    //========================
    // if (!file_exists($path)) {
    //     abort(404);
    // };

    //get file contents if it exists:
    //================================
    // $post = cache()->remember("posts.{$slug}", 5, function () use ($path) {
    //     var_dump('file_get_contents');
    //     return file_get_contents($path);
    // });
    // $post = cache()->remember("posts.{$slug}", 5, fn () => file_get_contents($path));

    //return post view:
    //================
    // return view('post', [
    //     'post' => $post,
    // ]);

})->where('post', '[A-z_\-]+');