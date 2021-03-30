<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserLoginController as userLogin;
// controller user
use App\Http\Controllers\user\DashboardController as userDashboard;
use App\Http\Controllers\user\ProfileController as userProfile;
use App\Http\Controllers\user\ServiceController as userService;

// controller media
use App\Http\Controllers\media\DashboardController as mediaDashboard;
use App\Http\Controllers\media\CategoryController as mediaCategory;
use App\Http\Controllers\media\AdminController as mediaAdmin;
use App\Http\Controllers\media\AudienscharacterController as mediaAudiens;
use App\Http\Controllers\media\KeyOpinionController as mediaInfluencer;
use App\Http\Controllers\media\RekomendasiController as mediaRekomendasi;
use App\Http\Controllers\media\ProjectController as mediaProject;

use App\Http\Controllers\LogoutController as Logout;

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

Route::get('/', [userLogin::class, 'index'])->name('user.login');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('logout', [Logout::class, 'action'])->name('logout');

Route::get('login', [userLogin::class, 'index'])->name('login');
Route::post('auth', [userLogin::class, 'auth'])->name('auth');
Route::get('register', [userLogin::class, 'register'])->name('register');
Route::post('registrasi', [userLogin::class, 'registrasi'])->name('submit_register');

Route::prefix('user/')->name('user.')->middleware('checkLogin')->group(function () {
    Route::get('dashboard', [userDashboard::class, 'index'])->name('dashboard');
    Route::get('profil', [userProfile::class, 'index'])->name('profil');
    Route::get('getProfil', [userProfile::class, 'getProfil'])->name('getProfil');
    Route::post('updateProfil', [userProfile::class, 'updateProfil'])->name('updateProfil');

    Route::get('socialmedia', [userProfile::class, 'sosmed'])->name('sosmed');
    Route::post('addSosmed', [userProfile::class, 'addSosmed'])->name('addSosmed');
    Route::get('socialmedia/detail/{id}', [userProfile::class, 'detail'])->name('sosmed_detail');
    Route::post('updateSosmed', [userProfile::class, 'updateSosmed'])->name('updateSosmed');
    Route::delete('socialmedia/delete/{id}', [userProfile::class, 'delete'])->name('sosmed_delete');

    // serviceController
    Route::get('service', [userService::class, 'index'])->name('service');
    Route::get('service/add', [userService::class, 'addService'])->name('service.add');
    Route::post('service/getSosmed', [userService::class, 'getSosmed'])->name('service.getSosmed');
    Route::post('service/addSosmed', [userService::class, 'addSosmed'])->name('service.addSosmed');
    Route::get('service/detService/{sosmed}/{id}', [userService::class, 'detService'])->name('service.detService');
    Route::post('service/update', [userService::class,'updateService'])->name('service.updateService');
    Route::delete('service/delService', [userService::class, 'delService'])->name('service.delService');
});

Route::prefix('media/')->name('media.')->middleware('checkAdmin')->group(function () {
    Route::get('dashboard', [mediaDashboard::class, 'index'])->name('dashboard');

    // category
    Route::get('category', [mediaCategory::class, 'index'])->name('category');
    Route::post('category/submit', [mediaCategory::class,'submit'])->name('category.submit');
    Route::get('category/getData/{slug}', [mediaCategory::class,'getData'])->name('category.getData');
    Route::post('category/update', [mediaCategory::class, 'update'])->name('category.update');
    Route::delete('category/delete', [mediaCategory::class,'deleteData'])->name('category.delete');

    // Admin
    Route::get('admin', [mediaAdmin::class,'index'])->name('admin');
    Route::post('admin/submit', [mediaAdmin::class, 'submit'])->name('admin.submit');
    Route::get('admin/getData/{username}', [mediaAdmin::class, 'getData'])->name('admin.getData');
    Route::post('admin/update', [mediaAdmin::class, 'updateData'])->name('admin.update');
    Route::get('admin/getPassword/{username}', [mediaAdmin::class, 'getPassword'])->name('admin.getPassword');
    Route::post('admin/update_password', [mediaAdmin::class, 'updatePasword'])->name('admin.update_password');
    Route::delete('admin/delete', [mediaAdmin::class, 'deleteData'])->name('admin.delete');

    // category
    Route::get('Audienscharacters', [mediaAudiens::class, 'index'])->name('audiens');
    Route::post('Audienscharacters/submit', [mediaAudiens::class, 'submit'])->name('audiens.submit');
    Route::get('Audienscharacters/getData/{id}', [mediaAudiens::class, 'getData'])->name('audiens.getData');
    Route::post('Audienscharacters/update', [mediaAudiens::class, 'update'])->name('audiens.update');
    Route::delete('Audienscharacters/delete', [mediaAudiens::class, 'deleteData'])->name('audiens.delete');

    // influencer
    Route::get('KeyOpinion', [mediaInfluencer::class, 'index'])->name('influencer');
    Route::get('KeyOpinion/influencer', [mediaInfluencer::class, 'influencer'])->name('keyopinion.influencer');
    Route::get('KeyOpinion/singlesite', [mediaInfluencer::class, 'singlesite'])->name('keyopinion.singlesite');
    Route::get('KeyOpinion/komunitas', [mediaInfluencer::class, 'komunitas'])->name('keyopinion.komunitas');
    Route::get('Influencer/getData/{username}', [mediaInfluencer::class, 'getData'])->name('influencer.getData');
    Route::post('Influencer/updateDetail', [mediaInfluencer::class, 'updateDetail'])->name('influencer.updateDetail');

    // rekomendasi
    Route::get('rekomendasi', [mediaRekomendasi::class, 'index'])->name('rekomendasi');
    Route::post('rekomendasi/filter', [mediaRekomendasi::class, 'filter'])->name('rekomendasi.filter');
    Route::get('service/getData/{username}', [mediaRekomendasi::class, 'getData'])->name('service.getData');
    Route::post('rekomendasi/postSession', [mediaRekomendasi::class,'postSession'])->name('rekomendasi.postSession');
    Route::post('rekomendasi/delSession', [mediaRekomendasi::class, 'delSession'])->name('rekomendasi.delSession');
    Route::get('rekomendasi/preview',[mediaRekomendasi::class,'preview'])->name('rekomendasi.preview');
    Route::post('rekomendasi/getProject', [mediaRekomendasi::class, 'getProject'])->name('rekomendasi.getProject');
    Route::post('rekomendasi/submitRekomendasi', [mediaRekomendasi::class,'submitRekomendasi'])->name('rekomendasi.submitRekomendasi');
    Route::get('rekomendasi/history', [mediaRekomendasi::class,'history'])->name('rekomendasi.history');
    Route::get('rekomendasi/detail/{code}', [mediaRekomendasi::class, 'detail'])->name('rekomendasi.detail');

    Route::get('project', [mediaProject::class,'index'])->name('project');
    Route::post('project/submit', [mediaProject::class, 'submit'])->name('project.submit');
    Route::get('project/getData/{slug}', [mediaProject::class, 'getData'])->name('project.getData');
    Route::post('project/update', [mediaProject::class, 'update'])->name('project.update');
});
