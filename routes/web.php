<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/halo', function () {
    return 'Halo, selamat datang inayahhf';
});
// Arrow function
Route::get('/waktu', fn () => now()->format('d-m-Y H:i:s'));
// Parameter wajib
Route::get('/profil/{Yulvina}', function (string $nama) {
    return "Halo, {$nama}!";
});
// Parameter opsional
Route::get('/kategori/{Yulvina?}', function (?string $nama = 'Nama:Yulvina') {
    return "Menampilkan kategori: {$nama}";
});
// Lebih dari satu parameter
Route::get('/kelas/{kode}/mahasiswa/{nim}', function (string $kode, string $nim) {
    return "Kelas {$kode}, NIM {$nim}";
});

Route::get('/artikel/{id}', function (int $id) {
return "Artikel nomor {$id}";
})->whereNumber('id');
Route::get('/pengguna/{username}', function (string $username) {
return "Pengguna: {$username}";
})->whereAlpha('username');
Route::get('/kode/{kode}', function (string $kode) {
return "Kode: {$kode}";
})->where('kode', '[A-Z]{3}[0-9]{2}');

// Route::view tidak memerlukan closure
Route::view('/tentang', 'tentang')->name('tentang');
Route::get('/kontak', function () {
return view('kontak', ['email' => 'info@kampus.ac.id']);
})->name('kontak');