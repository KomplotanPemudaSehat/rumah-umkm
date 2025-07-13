@extends('layouts.app')
@section('title', 'Notifikasi OTP')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-poppins font-bold text-deep-graphite">Daftar Permintaan OTP</h1>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-x-auto border border-soft-navy/20">
        <table class="min-w-full divide-y divide-cloud-white">
            <thead class="bg-cloud-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Pesan Notifikasi</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Waktu</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-cloud-white">
                @forelse($notifications as $notification)
                <tr class="hover:bg-cloud-white/50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-deep-graphite">{{ $notification->message }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-soft-navy">{{ $notification->created_at->diffForHumans() }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="px-6 py-4 text-center text-soft-navy">Belum ada permintaan OTP.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
