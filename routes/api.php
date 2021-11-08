<?php

use App\Http\Controllers\Admin\{
	AdminAuthController,
	AdminsController,
	BlogController,
	BookFlightController as AdminBookFlightController,
	FlightCategory,
	FlightController,
	ReviewsFlightController,
	UserController as AdminUserController,
};
use App\Http\Controllers\AuthUser\UserRegisterController;
use App\Http\Controllers\User\{
    BlogController as UserBlogController,
    BookFlightController,
	UserController,
	CategoryController,
};
use App\Http\Controllers\UserAuth\LoginController;
use App\Http\Controllers\UserAuth\LogoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
	Route::get('/posts',[BlogController::class,'get']);
});

Route::prefix("/user")->group(function(){
	Route::post('/create-user',[UserRegisterController::class,'create']);
	Route::get("/get-random-posts",[UserBlogController::class,'getRandomPost']);
	Route::get("/get-all-posts",[UserBlogController::class,'getAllPost']);
	Route::get("/get-detail-posts/{id}",[UserBlogController::class,'getDetail']);

	Route::post("/register",[UserRegisterController::class,'create']);
	Route::post("/login",[LoginController::class,'login']);
	Route::get("/users",[LoginController::class,'getUser']);
	Route::post("/logout",[LogoutController::class,'logout']);
});


Route::prefix("/admin")->group(function(){

	Route::post("/login",[AdminAuthController::class,'login']);
	Route::post("/logout",[AdminAuthController::class,'logout']);

	Route::get('/posts',[BlogController::class,'get']);
	Route::post('/add-posts',[BlogController::class,'create']);
	Route::get('/edit-posts/{id}',[BlogController::class,'edit']);
	Route::post('/update-posts/{id}',[BlogController::class,'update']);
	Route::get('/total-posts',[BlogController::class,'total_record']);
	Route::delete('/delete-posts/{id}',[BlogController::class,'delete']);


	Route::get('/total-flgiht-category',[FlightCategory::class,'total_record']);
	Route::get('/get-flgiht-category',[FlightCategory::class,'get']);
	Route::post('/add-flgiht-category',[FlightCategory::class,'create']);
	Route::put('/edit-flgiht-category/{id}',[FlightCategory::class,'edit']);
	Route::post('/update-flgiht-category/{id}',[FlightCategory::class,'update']);
	Route::delete('/delete-flgiht-category/{id}',[FlightCategory::class,'delete']);

	Route::get('/total-flgiht',[FlightController::class,'total_record']);
	Route::get('/get-flgiht',[FlightController::class,'get']);
	Route::post('/add-flgiht',[FlightController::class,'create']);
	Route::put('/edit-flgiht/{id}',[FlightController::class,'edit']);
	Route::post('/update-flgiht/{id}',[FlightController::class,'update']);
	Route::delete('/delete-flgiht/{id}',[FlightController::class,'delete']);

	Route::get('/total-admins',[AdminsController::class,'total_record']);
	Route::get('/get-admins',[AdminsController::class,'get']);
	Route::post('/add-admins',[AdminsController::class,'create']);
	Route::put('/edit-admins/{id}',[AdminsController::class,'edit']);
	Route::post('/update-admins/{id}',[AdminsController::class,'update']);
	Route::delete('/delete-admins/{id}',[AdminsController::class,'delete']);

	Route::get('/total-user',[AdminUserController::class,'total_record']);
	Route::get('/get-user',[AdminUserController::class,'get']);
	Route::delete('/delete-user/{id}',[AdminUserController::class,'delete']);

	Route::get('/total-book',[AdminBookFlightController::class,'total_record']);
	Route::get('/get-book',[AdminBookFlightController::class,'get']);
	Route::post('/accept-book',[AdminBookFlightController::class,'accept']);
	Route::post('/reject-book/{id}',[AdminBookFlightController::class,'reject']);
	Route::delete('/delete-book/{id}',[AdminBookFlightController::class,'delete']);
	
	Route::get('/total-reviews',[ReviewsFlightController::class,'total_record']);
	Route::get('/get-reviews',[ReviewsFlightController::class,'get']);
	Route::post('/accept-reviews',[ReviewsFlightController::class,'accept']);
	Route::post('/reject-reviews/{id}',[ReviewsFlightController::class,'reject']);
	Route::delete('/delete-reviews/{id}',[ReviewsFlightController::class,'delete']);
});

