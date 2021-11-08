<?php

use App\Http\Livewire\Admin\{
    Admin,
    Blog as AdminBlog,
    BookFlight,
    Category,
    Comment,
    Dashboard as AdminDashboard,
    FlightCategory,
    Flight as AdminFlight,
    Users as AdminUsers,
    Review,
};
use App\Http\Livewire\AdminAuth\Login as AdminAuthLogin;
use App\Http\Livewire\Pages\{
    About,
    Blog,
    BlogDetail,
    CategoryFlight,
    Contact,
    Flight,
    FlightDetail,
    Home
};
use App\Http\Livewire\UserAuth\Login;
use App\Http\Livewire\UserAuth\Signup;
use App\Http\Livewire\UserDashboard\{
    Dashboard,
    MyBooking,
    MyProfile,
    MyReview,
};
use Illuminate\Support\Facades\Route;




// user routes start{
Route::middleware(['guest'])->group(function () {
    Route::get("/registration", Signup::class)->name("registration");
    Route::get("/login", Login::class)->name("login");
});
Route::middleware(['auth'])->group(function () {
    Route::prefix("/user")->group(function(){
        Route::get('/dashboard',Dashboard::class)->name('user.dashboard');
        Route::get('/review',MyReview::class)->name('user.myreview');
        Route::get('/profile',MyProfile::class)->name('user.profile');
        Route::get('/booking',MyBooking::class)->name('user.booking');
    });
});
Route::get('/', Home::class);
Route::get("/blog", Blog::class)->name("blog");
Route::get("/blog-detail/{slug}", BlogDetail::class)->name("blogdetail");
Route::get("/fligths", Flight::class)->name("flight");
Route::get("/flight-detail/{slug}", FlightDetail::class)->name("flightdetail");
Route::get("/flight-category/{slug}", CategoryFlight::class)->name("categoryflight");
Route::get("/contact", Contact::class)->name("contact");
Route::get("/about", About::class)->name("about");
// }user routes end


// admin routes start{
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/admin/login',AdminAuthLogin::class)->name("admin.login");
});
Route::middleware(['auth:admin','admin'])->group(function () {
    Route::prefix('/admin')->group(function(){
        // Route::get('/',AdminAuthLogin::class);
        Route::get('/dashboard',AdminDashboard::class)->name("admin.dashboard");
        Route::get('/posts',AdminBlog::class)->name('admin.post');
        Route::get('/category',Category::class)->name('admin.category');
        Route::get('/flightcategory',FlightCategory::class)->name('admin.flightcategory');
        Route::get('/flight',AdminFlight::class)->name('admin.flight');
        Route::get('/admins',Admin::class)->name('admin.admins');
        Route::get('/users',AdminUsers::class)->name('admin.users');
        Route::get('/bookflight',BookFlight::class)->name('admin.booked');
        Route::get('/reviews',Review::class)->name('admin.reviews');
        Route::get('/comments',Comment::class)->name('admin.comment');
    });
});

Route::middleware(['auth:admin','noadmin'])->group(function () {
    Route::prefix('/normal')->group(function(){
        Route::get('/post',AdminBlog::class)->name('normal.posts');
        Route::get('/flight',AdminFlight::class)->name('normal.flight');
    });
});


// } admin routes end


