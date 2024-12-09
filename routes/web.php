<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\pasienController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\LaporanDaftarController;
use App\Http\Controllers\LaporanPasienController;

Route::resource('pasien', pasienController::class);
Route::get('mylayout', action: [pasienController::class, 'index']);



// //Profil
// Route::get (uri:'Profil',action : [ProfilController::class, 'index']);
// Route::get (uri:'Profil/create',action : [ProfilController::class, 'create']);
// Route::get (uri:'Profil/{nama}/{nim}/edit',action : [ProfilController::class, 'edit']);

// //Dokter
// Route::get (uri:'dokter',action : [dokterController::class, 'index']);
// Route::get (uri:'dokter/create',action : [dokterController::class, 'create']);
// Route::get (uri:'dokter/{angka}/edit',action : [dokterController::class, 'edit']);
// Route::get (uri:'dokter/{angka}',action : [dokterController::class, 'show']);

// //Pasien
// Route::get (uri:'pasien',action : [pasienController::class, 'index']);
// Route::get (uri:'pasien/create',action : [pasienController::class, 'create']);
// Route::get (uri:'pasien/{angka}/edit',action : [pasienController::class, 'edit']);
// Route::get (uri:'pasien/{angka}',action : [pasienController::class, 'show']);



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('pasien', PasienController::class);
    // Route::resource('daftar', DaftarController::class);
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('daftar', DaftarController::class);
Route::resource('poli', PoliController::class);
Route::resource('laporan-pasien', LaporanPasienController::class);
Route::resource('laporan-daftar', LaporanDaftarController::class);

?>
