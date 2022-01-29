<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ClientController::class)
    ->prefix('clients')
    ->group(function ($router) {
        $router->get('order', 'getOrder')->name('client.order');
        $router->get('create', 'create')->name('client.create');
        $router->get('show/{client}', 'show')->name('client.show');
        $router->get('bills/{client}', 'getBills')->name('client.bills');
        $router->get('name/{name}', 'getName')->name('client.name');
        $router->get('search/{text}', 'search')->name('client.search');
        $router->post('store', 'store')->name('client.store');
    });

Route::controller(BillController::class)
    ->prefix('bills')
    ->group(function ($router) {
        $router->get('expensive/{value}', 'getExpensive')->name('bills.expensive');
        $router->get('between/{value1}/{value2}', 'getValueBetween')->name('bills.between');
    });

Route::middleware('auth')
    ->group(function ($router) {
        $router->controller(HomeController::class)
            ->group(function ($router) {
                $router->get('home', 'index')->name('home');
        });

        $router->controller(PostController::class)
            ->prefix('posts')
            ->group(function ($router) {
                $router->get('', 'index')->name('posts.index');
                $router->post('store', 'store')->name('posts.store');
                $router->get('show/{post}', 'show')->name('posts.show');
                $router->get('edit/{post}', 'edit')->name('posts.edit');
                $router->post('update/{post}', 'update')->name('posts.update');
                $router->get('delete/{post}', 'delete')->name('posts.delete');
            });
    });

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

