<?php

use App\Models\User;
use App\Models\Product;
use App\Models\LoginUser;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ModelProductController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductDetailUserController;

// Route::get('/', function () {
//     return view('layouts.frontend.home.homepage');
// })->name('homepage');


Route::get('/', [HomepageController::class, 'index'])->name('homepage');
// Route untuk menampilkan modal order
Route::get('/test', function () {
    return view('layouts.frontend.customorder.create');
});
Route::post('/update-transaction-user/{id}/submit', [TransaksiController::class, 'update2'])->name('transaksi.update2');
Route::get('/transaksi', [TransaksiController::class, 'create'])->name('transaksi.index.user');

Route::get('fp2', [ForgotController::class, 'index'])->name('password.request2');
Route::post('fp2/submit', [ForgotController::class, 'sendResetLinkEmail'])->name('password.email2');
Route::get('resetpw/{token}', [ForgotController::class, 'showResetPasswordForm'])->name('password.reset2');
Route::post('resetpw', [ForgotController::class, 'resetPassword'])->name('password.update2');
Route::get('/product-model/{productId}', [ProductDetailUserController::class, 'index'])->name('productdetail2.index');
Route::get('/product-detail/{productId}/{modelId}', [ProductDetailController::class, 'pdetail'])->name('productdetail3.pdetail');

Route::middleware(['user'])->group(function(){
});
Route::post('/order/submit', [OrderController::class, 'store'])->name('customorder.store');
Route::get('/order', [OrderController::class, 'create'])->name('customorder.create');
Route::get('/your-order', [OrderController::class, 'show'])->name('order');  
Route::get('/edit-user/{id}', [LoginUserController::class, 'edit'])->name('user.edit');
Route::post('/edit-user/submit//{id}', [LoginUserController::class, 'update'])->name('user.update');

Auth::routes(['login' => false]);
Route::get('/admin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin', [LoginController::class, 'login']);
Route::post('/keluar', [LoginController::class, 'logout'])->name('logout');
Route::get('/log-in', [LoginUserController::class, 'index'])->name('user.login');
Route::post('/log-in/submit', [LoginUserController::class, 'login'])->name('auth.login');

Route::get('/register', [RegisterUserController::class, 'index'])->name('user.register');
Route::post('/register/submit', [RegisterUserController::class, 'register'])->name('auth.register');

Route::post('/update-progress/{id}', [OrderController::class, 'updateProgress'])->name('update.progress');
Route::get('/services', [ServiceController::class, 'index'])->name('services');



Route::middleware(['superadmin'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'changepassword'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'password'])->name('profile.password');
    Route::get('/blank-page', [App\Http\Controllers\HomeController::class, 'blank'])->name('blank');
    
    Route::get('/hakakses', [App\Http\Controllers\HakaksesController::class, 'index'])->name('hakakses.index')->middleware('superadmin');
    Route::get('/hakakses/edit/{id}', [App\Http\Controllers\HakaksesController::class, 'edit'])->name('hakakses.edit')->middleware('superadmin');
    Route::put('/hakakses/update/{id}', [App\Http\Controllers\HakaksesController::class, 'update'])->name('hakakses.update')->middleware('superadmin');
    Route::delete('/hakakses/delete/{id}', [App\Http\Controllers\HakaksesController::class, 'destroy'])->name('hakakses.delete')->middleware('superadmin');
    
    Route::get('/table-example', [App\Http\Controllers\ExampleController::class, 'table'])->name('table.example');
    Route::get('/clock-example', [App\Http\Controllers\ExampleController::class, 'clock'])->name('clock.example');
    Route::get('/chart-example', [App\Http\Controllers\ExampleController::class, 'chart'])->name('chart.example');
    Route::get('/form-example', [App\Http\Controllers\ExampleController::class, 'form'])->name('form.example');
    Route::get('/map-example', [App\Http\Controllers\ExampleController::class, 'map'])->name('map.example');
    Route::get('/calendar-example', [App\Http\Controllers\ExampleController::class, 'calendar'])->name('calendar.example');
    Route::get('/gallery-example', [App\Http\Controllers\ExampleController::class, 'gallery'])->name('gallery.example');
    Route::get('/todo-example', [App\Http\Controllers\ExampleController::class, 'todo'])->name('todo.example');
    Route::get('/contact-example', [App\Http\Controllers\ExampleController::class, 'contact'])->name('contact.example');
    Route::get('/faq-example', [App\Http\Controllers\ExampleController::class, 'faq'])->name('faq.example');
    Route::get('/news-example', [App\Http\Controllers\ExampleController::class, 'news'])->name('news.example');
    Route::get('/about-example', [App\Http\Controllers\ExampleController::class, 'about'])->name('about.example');
    
    // Product Routes
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');   
    
    // Product Detail Routes
    Route::get('/productdetail', [App\Http\Controllers\ProductDetailController::class, 'index'])->name('productdetail.index');
    Route::post('/productdetail/store', [App\Http\Controllers\ProductDetailController::class, 'store'])->name('productdetail.store');
    Route::get('/productdetail/create/{id}', [App\Http\Controllers\ProductDetailController::class, 'create'])->name('productdetail.create');
    
    // Model Product Routes
    Route::get('/modelproduct/{id}', [App\Http\Controllers\ModelProductController::class, 'index'])->name('modelproduct.index');
    Route::post('/modelproduct/store', [App\Http\Controllers\ModelProductController::class, 'store'])->name('modelproduct.store');
    
    // Tangga Routes
    Route::get('/tangga', [App\Http\Controllers\ModelProductController::class, 'showTangga'])->name('tangga.index');
    // Pagar Routes
    Route::get('/pagar', [App\Http\Controllers\ModelProductController::class, 'showPagar'])->name('pagar.index');
    // Kanopi Routes
    Route::get('/kanopi', [App\Http\Controllers\ModelProductController::class, 'showKanopi'])->name('kanopi.index');
    
    Route::get('/listorder', [OrderController::class, 'index'])->name('customorder.index');
    Route::get('/transaction', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaction/update/{id}', [TransaksiController::class, 'show'])->name('transaksi.edit');
    Route::post('/update-transaction/submit/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');

    Route::get('/updateproduct/{id}', [ProductController::class, 'edit'])->name('product.update');
    Route::post('/updateproduct/submit/{id}', [ProductController::class, 'update2'])->name('product.update2');
    Route::get('/deleteproduct/{id}', [ProductController::class, 'delete'])->name('product.delete');

    Route::get('/updateproductdetail/{id}', [ProductDetailController::class, 'edit'])->name('productdetail.edit');
    Route::post('/updateproductdetail/submit/{id}', [ProductDetailController::class, 'update'])->name('productdetail.update');
    Route::get('/deleteproductdetail/{id}', [ProductDetailController::class, 'delete'])->name('productdetail.delete');

   

    Route::get('/updatemodelpagar/{id}', [ModelProductController::class, 'editpagar'])->name('pagar.update');
    Route::put('/updatemodelpagar/submit/{id}', [ModelProductController::class, 'update'])->name('pagar.update2');
    Route::get('/deletemodelpagar/{id}', [ModelProductController::class, 'delete'])->name('pagar.delete');

    Route::get('/updatemodeltangga/{id}', [ModelProductController::class, 'edittangga'])->name('tangga.update');
    Route::put('/updatemodeltangga/submit/{id}', [ModelProductController::class, 'update2'])->name('tangga.update2');
    Route::get('/deletemodeltangga/{id}', [ModelProductController::class, 'delete2'])->name('tangga.delete');

    Route::get('/updatemodelkanopi/{id}', [ModelProductController::class, 'editkanopi'])->name('kanopi.update');
    Route::put('/updatemodelkanopi/submit/{id}', [ModelProductController::class, 'update3'])->name('kanopi.update2');
    Route::get('/deletemodelkanopi/{id}', [ModelProductController::class, 'delete3'])->name('kanopi.delete');


    
});