<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//MAIN PAGE
Route::redirect('/', 'menu');
Route::get("/menu", [MenuController::class, "all"]);
//FALLBACK
Route::fallback(function () {return view('menu');});

//AUTHENTICATED PAGES
Route::group(['middleware' => ['auth']], function() {
    Route::get("/account", [AuthController::class, "loggedUser"]);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //ONLY ADMIN PAGES
    Route::group(['middleware' => ['is_auth']],function (){
        //USERS
        Route::get("/users", [UserController::class, "index"]);
        Route::get('/users/list', [UserController::class, 'list']);
        Route::get('/users/create', function () {return view('users/create');});
        Route::post("/users/store", [UserController::class, "store"]);
        Route::get("/users/edit/{id}", [UserController::class, "edit"]);
        Route::post("/users/update/{id}", [UserController::class, "update"]);
        Route::get("/users/destroy/{id}", [UserController::class, "destroy"]);
        //GAMES
        Route::get('/games/list', [GameController::class, 'list']);
        Route::get('/games/create', function () {return view('games/create');});
        Route::post("/games/store", [GameController::class, "store"]);
        Route::get("/games/edit/{id}", [GameController::class, "edit"]);
        Route::post("/games/update/{id}", [GameController::class, "update"]);
        Route::get("/games/destroy/{id}", [GameController::class, "destroy"]);
        //ROOMS
        Route::get("/rooms/create", [RoomController::class, "createRoom"]);
        Route::post("/rooms/store", [RoomController::class, "store"]);
        Route::get("/rooms/edit/{id}", [RoomController::class, "edit"]);
        Route::post("/rooms/update/{id}", [RoomController::class, "update"]);
        Route::get("/rooms/delete/{id}", [RoomController::class, "delete"]);

    });
    //ALL AUTH USERS
    //BOOKS
    Route::get("/books", [BookController::class, "all"]);
    //Route::get("/books", [BookController::class, "getBook"]);
    Route::get("/books/create/{id}", [BookController::class, "createBook"]);
    Route::post("/books/store/{id}", [BookController::class, "store"]);
    Route::get("/books/edit/{id}", [BookController::class, "edit"]);
    Route::post("/books/update/{id}", [BookController::class, "update"]);
    Route::get("/books/delete/{id}", [BookController::class, "delete"]);

    //REVIEWS
    Route::get("/reviews", [ReviewController::class, "all"]);
    Route::get("/reviews/create/{id}", [ReviewController::class, "createReview"]);
    Route::post("/reviews/store/{id}", [ReviewController::class, "store"]);
    Route::get("/reviews/edit/{id}", [ReviewController::class, "edit"]);
    Route::post("/reviews/update/{id}", [ReviewController::class, "update"]);
    Route::get("/reviewsUser", [ReviewController::class, "reviewsUser"]);
    Route::get("/reviews/delete/{id}", [ReviewController::class, "delete"]);

});

//NO AUTHENTICATED PAGES
Route::get("/games", [GameController::class, "index"]);
Route::get("/rooms", [RoomController::class, "all"]);

Auth::routes();

Route::get('/home', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
