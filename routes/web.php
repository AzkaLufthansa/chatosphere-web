<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use App\Models\Topic;
use App\Models\User;
use App\Models\Category;

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

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.dashboard', [
            'title' => 'Dashboard',
            'total_topics' => Topic::all()->count(),
            'total_users' => User::all()->count(),
            'total_categories' => Category::all()->count(),
            'recent_topic' => Topic::latest()->limit(5)->get(),
            'recent_user' => User::latest()->limit(3)->get(),
            'recent_categories' => Category::latest()->pluck('created_at')
        ]);
    });
    
    Route::resource('topic', TopicController::class);
    Route::get('/topic/checkSlug', [TopicController::class, 'checkSlug']);
    
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('friend', FriendController::class);
 
    Route::get('/settings', [SettingController::class, 'index']);
});