<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController ;
use App\Http\Controllers\addproductcontroller;
;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', function () {
    return view('admin/admin');
})->name('admin');
Route::post('/admin_pannel', [AdminController::class, 'admin']);
Route::post('/addcatalogue', [addproductcontroller::class, 'addcatalogue']);
Route::post('/addproduct', [addproductcontroller::class, 'addproduct']);
Route::post('/addinfoproduct', [addproductcontroller::class, 'addinfoproduct']);
Route::get('/getaddinfoproduct', [addproductcontroller::class, 'getaddinfoproduct'])->name('getaddinfoproduct');
Route::get('/getaddproduct', [AdminController::class, 'sendids'])->name('getaddproduct');
Route::get('/getcatalogue', [addproductcontroller::class, 'getcatalogue'])->name('getcatalogue');
Route::get('/getshowcatalogue', [addproductcontroller::class, 'getshowcatalogue'])->name('getshowcatalogue');
Route::get('/getshowproduct', [addproductcontroller::class, 'getshowproduct'])->name('getshowproduct');
Route::get('/getshowinfoproduct', [addproductcontroller::class, 'getshowinfoproduct'])->name('getshowinfoproduct');
Route::get('/delete/{id}', [addproductcontroller::class, 'deletecatalogue']);
Route::get('/deletepd/{id}', [addproductcontroller::class, 'deletepd']);
Route::get('/deleteinf/{id}', [addproductcontroller::class, 'deleteinf']);
Route::get('/edit/{id}', [addproductcontroller::class, 'modifiercataloguet']);
Route::get('/editpd/{id}', [addproductcontroller::class, 'modifierproduct']);
Route::get('/editinf/{id}', [addproductcontroller::class, 'modifierinfpd']);
Route::post('edit/updatecataloguet', [addproductcontroller::class, 'updatecataloguet']);
Route::post('editpd/updateproduct', [addproductcontroller::class, 'updateproduct']);
Route::post('editinf/updateinfoproduct', [addproductcontroller::class, 'updateinfoproduct']);
Route::get('createorder/{id}', [addproductcontroller::class, 'createorder']);
Route::post('/createorder/buynow', [addproductcontroller::class, 'getinfoorder']);
Route::get('/orders', [AdminController::class, 'orders']);
Route::get('confirmeproduct/{id}', [addproductcontroller::class, 'confirmeproduct']);
Route::get('deleteorders/{id}', [addproductcontroller::class, 'deleteorders']);
Route::get('deleteordersfromuser/{id}', [addproductcontroller::class, 'deleteordersfromuser']);
Route::get('/', [AdminController::class, 'welcome']);




