import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

// Konfigurasi dan inisialisasi Laravel Echo
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    // Jika Anda menggunakan custom authEndpoint, tambahkan di sini
    // authEndpoint: '/custom/broadcasting/auth'
});


// ======================================================================
//      KODE LISTENER UNTUK NOTIFIKASI ADMIN DITARUH DI SINI
// ======================================================================
// Pastikan kode ini hanya berjalan untuk user yang sudah login.
// Biasanya, file ini di-import di layout utama yang memerlukan sesi login.

// Cek apakah ada elemen yang menandakan user adalah admin, 
// atau biarkan saja karena otorisasi ada di backend.
console.log("Bootstrap.js: Mencoba mendengarkan channel privat 'admin-notifications'...");

window.Echo.private('admin-notifications')
    .listen('OtpRequested', (e) => {
        // Baris ini akan berjalan JIKA event diterima
        console.log('EVENT "OtpRequested" BERHASIL DITERIMA!', e);

        // Contoh: Menampilkan alert atau notifikasi toast
        alert(`Ada permintaan OTP baru! Pesan: ${e.message}`);
    });

// Di dalam resources/js/bootstrap.js, setelah inisialisasi Echo
console.log("Mencoba mendengarkan channel admin...");

window.Echo.private('admin-notifications')
    .listen('OtpRequested', (e) => {
        console.log('EVENT DITERIMA!', e);
        alert('NOTIFIKASI BERHASIL DITERIMA!');
    });