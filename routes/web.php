<?php

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
// Rute untuk halaman awal (welcome)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('.', function () {
    return view('dashboard.home');
})->middleware('auth');


Route::get('/beranda', function () {
    return view('dasboard2.home');
})->middleware('auth');


//kategori
Route::middleware('auth')->group(function () {
    Route::get('kategori', 'KategoriController@index')->name('kategori.index');
    Route::get('kategori/create', 'KategoriController@create')->name('kategori.create');
    Route::post('kategori', 'KategoriController@store')->name('kategori.store');
    Route::get('kategori/{kategori_id}/edit', 'KategoriController@edit')->name('kategori.edit');
    Route::post('kategori/{kategori_id}', 'KategoriController@update')->name('kategori.update');
    Route::delete('kategori/{kategori_id}', 'KategoriController@destroy')->name('kategori.destroy');
});

Route::middleware('auth')->group(function () {
    // Rute untuk karyawan
    Route::get('barang', 'BarangController@index')->name('barang.index'); // Route untuk menampilkan daftar barang

    // Rute untuk admin
    Route::get('barang/indexx', 'BarangController@indexx')->name('admin.indexx');

    // Rute CRUD untuk barang
    Route::get('barang/create', 'BarangController@create')->name('barang.create'); // Menampilkan form create barang
    Route::post('barang', 'BarangController@store')->name('barang.store'); // Menyimpan data barang baru
    Route::get('barang/{barang_id}/edit', 'BarangController@edit')->name('barang.edit'); // Menampilkan form edit barang
    Route::put('barang/{barang_id}', 'BarangController@update')->name('barang.update'); // Update data barang
    Route::delete('barang/{barang_id}', 'BarangController@destroy')->name('barang.destroy'); // Hapus barang

    // Rute untuk ekspor data ke Excel
    Route::get('/barang/export_excel', 'BarangController@export_excel')->name('barang.export_excel');

    // Rute untuk dashboard karyawan
    Route::get('karyawan/dashboard', 'KaryawanController@dashboard')->name('karyawan.dashboard');
});




    
    
    
    


//perbaikan
// Rute yang membutuhkan autentikasi
Route::middleware('auth')->group(function () {
    // Route untuk admin yang bisa mengelola perbaikan
    Route::get('perbaikan', 'PerbaikanController@index')->name('perbaikan.index');
    Route::get('perbaikan/create', 'PerbaikanController@create')->name('perbaikan.create');
    Route::post('perbaikan', 'PerbaikanController@store')->name('perbaikan.store');
    Route::get('perbaikan/{perbaikan_id}/edit', 'PerbaikanController@edit')->name('perbaikan.edit');
    Route::put('perbaikan/{perbaikan_id}', 'PerbaikanController@update')->name('perbaikan.update');
    Route::delete('perbaikan/{perbaikan_id}', 'PerbaikanController@destroy')->name('perbaikan.destroy');

    // index3
    Route::get('perbaikan/index3', 'PerbaikanController@index3')->name('admin.index3');
    Route::get('/perbaikan/sudah-diperbaiki', 'PerbaikanController@index3')->name('perbaikan.index3');


    // Route untuk mengubah status perbaikan
    Route::post('perbaikan/{perbaikan_id}/in-repair', 'PerbaikanController@inRepair')->name('perbaikan.in-repair');
    Route::post('perbaikan/{perbaikan_id}/repaired', 'PerbaikanController@repaired')->name('perbaikan.repaired');

    Route::get('/perbaikan/export_excel', 'PerbaikanController@export_excel');
    
    // Route untuk karyawan yang hanya bisa melihat perbaikan
    Route::get('perbaikan/indexx', 'PerbaikanController@indexx')->name('perbaikan.indexx');
    Route::get('perbaikan/view', 'PerbaikanController@showForKaryawan')->name('perbaikan.showForKaryawan');
});








//user
// routes/web.php
Route::middleware('auth')->group(function () {
    // Menampilkan daftar semua pengguna
    Route::get('user', 'UserController@index')->name('user.index');
    
    // Menampilkan form untuk membuat pengguna baru
    Route::get('users/create', 'UserController@create')->name('user.create');
    
    // Menyimpan pengguna baru
    Route::post('users', 'UserController@store')->name('user.store');
    
    // Menampilkan form untuk mengedit pengguna yang sudah ada
    Route::get('users/{user}/edit', 'UserController@edit')->name('user.edit');
    
    // Memperbarui data pengguna yang ada
    Route::put('users/{user}', 'UserController@update')->name('user.update');
    
    // Menghapus pengguna yang ada
    Route::delete('users/{user}', 'UserController@destroy')->name('user.destroy');
});


Route::get('/admin/dashboard', 'DashboardController@adminDashboard')->name('admin.dashboard');
Route::get('/karyawan/dashboard2', 'DashboardController@karyawanDashboard')->name('karyawan.dashboard2');


Route::get('/karyawan/dashboard', 'DashboardController@karyawanDashboard')->name('karyawan.dashboard');



Route::post('/logout', 'Auth\LoginController@logout')->name('logout');    
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');



// routes/web.php

Route::middleware('auth')->group(function () {
    // Rute lainnya
    
    Route::get('users', 'UserController@index')->name('users.index'); // Menambahkan rute ini
});



Route::get('/karyawan/beranda', function () {
    if (auth()->check() && auth()->user()->role == 'Karyawan') {
        return redirect()->route('karyawan.dashboard');
    } else {
        return redirect()->route('login'); // Arahkan ke halaman login jika pengguna tidak terautentikasi
    }
})->name('karyawan.beranda');
