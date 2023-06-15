<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;

use App\Http\Controllers\About\AboutController;


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

Route::get('/', function () { return view('visiteur.index');});

Route::controller(AdminController::class)->group(function (){

    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::post('/admin/create','create')->name('admin.create');
    Route::get('/admin/profile/','profile')->name('admin.profile');
    Route::get('/admin/admin_profile_edite','profile_edite')->name('admin.profile.edite');
    Route::post('/admin/admin_profile_store','profile_store')->name('admin.profile.store');
    Route::get('/Edite_passwoed','Edite_password')->name('Edite.password');
    Route::post('/change_passwoed','change_password')->name('change.password');


});


Route::controller(ArticleController::class)->group(function (){
    Route::get('/article/views' ,'views')->name('admin.views');
    Route::post('/article/store','store')->name('admin.store');
    Route::put('/article/update/{id}','update')->name('admin.update');
    Route::get('//articles/search','search')->name('articles.search');
    Route::get('/article/foreach','foreach')->name('admin.foreach');
    Route::get('/article/edit/{id}','edit')->name('articles.edit');
    Route::delete('/article/destroy/{id}','destroy')->name('articles.destroy');

});


Route::controller(HomeSliderController::class)->group(function (){
    Route::get('/home/slide' ,'HomeSlider')->name('home.slide');
    Route::post('/update/slide' ,'UpdateSlider')->name('update.slider');



});
Route::controller(AboutController::class)->group(function (){
    Route::post('/update/About' ,'UpdateAbout')->name('update.about');
    Route::get('/home/About' ,'About')->name('home.About');
    Route::get('/About' ,'AboutPage')->name('About.Page');
    Route::get('/About/MultiImage' ,'AboutMultiImage')->name('MultiImage.About');
    Route::post('/insert/MultiImage' ,'StoreMultiImage')->name('insert.MultiImage');
    Route::get('/About/MultiImage/All' ,'AllMultiImage')->name('MultiImage.All');
    Route::get('/item/foreach','foreach')->name('admin.foreach');
    Route::post('/item/update/{id}','updateMultiImage')->name('update.MultiImage');
    Route::get('/About/destroy/item/{id}' ,'destroyImage')->name('item.destroy');
    Route::get('/item/update/image/{id}','editimage')->name('edit.MultiImage');






});




Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*Route::controller(DemoController::class)->group(function(){
    Route::get('/about','Index');
});*/

require __DIR__.'/auth.php';
