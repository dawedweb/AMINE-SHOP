<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/', [HomeController::class,'index']);


route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
    
})->name('dashboard');


 route::get('/redirect', [HomeController::class,'redirect'])/* ->middleware('auth', 'verified') */;
 route::get('/product_detail/{id}', [HomeController::class,'productdetail']);
 route::get('/add_card/{id}', [HomeController::class,'addcard']);
 route::get('/show_card', [HomeController::class,'showcard']);
 route::get('/delete_product_card/{id}', [HomeController::class,'delete_product_card']);
 route::get('/cash_order', [HomeController::class,'cashorder']);
 route::get('/stripe/{totalprice}', [HomeController::class,'stripe']);
 Route::post('stripe',[HomeController::class,'stripePost'])->name('stripe.post');
 route::get('/show_order', [HomeController::class,'show_order']);
 route::get('/cancel_order/{id} ', [HomeController::class,'cancel_order']);
 Route::post('/make_comment',[HomeController::class,'make_comment']);
 Route::post('/reponse_comment',[HomeController::class,'reponse_comment']);
 route::get('/show_produit_home', [HomeController::class,'show_produit_home']);
 route::get('/contact', [HomeController::class,'contact']);
 route::get('/about', [HomeController::class,'about']);





 route::get('/view_category', [AdminController::class,'viewcategory']);
 route::post('/add_category', [AdminController::class,'addcategory']);
 route::get('/delete_category/{id}', [AdminController::class,'deletecategory']);
 route::get('/view_product', [AdminController::class,'viewproduct']);
 route::post ('/add_product', [AdminController::class,'addproduct']);
 route::get('/show_product', [AdminController::class,'showproduct']);
 route::get('/delete_product/{id}', [AdminController::class,'deleteproduct']);
 route::get('/edit_product/{id}', [AdminController::class,'editproduct']);
 route::post('/update_product_confirm/{id}', [AdminController::class,'updateproductconfirm']);
 route::get('/order', [AdminController::class,'vieworder']);
 route::get('/delivried/{id}', [AdminController::class,'delivried']);
 route::get('/deleted_order_admin/{id}', [AdminController::class,'deleted_order_admin']);
 route::get('/download_pdf/{id}', [AdminController::class,'download_pdf']);
 route::get('/send_email/{id}', [AdminController::class,'send_email']);
 route::post('/send_user_email/{id}', [AdminController::class,'send_user_email']);
 route::get('/search_order', [AdminController::class,'search_order']);






