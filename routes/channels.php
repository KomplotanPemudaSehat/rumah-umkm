<?php

use Illuminate\Support\Facades\Broadcast;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Di sinilah Anda mendaftarkan semua channel broadcasting yang didukung
| oleh aplikasi Anda. Callback otorisasi ini digunakan untuk memeriksa
| apakah pengguna yang terautentikasi dapat mendengarkan channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

// Otorisasi untuk channel notifikasi admin
Broadcast::channel('admin-notifications', function (User $user) {
    // Langsung periksa apakah pengguna yang sedang login adalah admin.
    // Mengembalikan true/false adalah cara otorisasi yang paling dasar dan andal.
    return $user->role === 'admin';
});