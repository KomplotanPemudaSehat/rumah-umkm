@extends('layouts.app')
@section('title', 'Kelola Pengguna')
@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-poppins font-bold text-deep-graphite">Kelola Pengguna (Penjual)</h1>
    </div>
    <div class="bg-white shadow-md rounded-lg overflow-x-auto border border-soft-navy/20">
        <table class="min-w-full divide-y divide-cloud-white">
            <thead class="bg-cloud-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Nama Penjual</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Nama Toko</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-soft-navy uppercase tracking-wider">Tanggal Bergabung</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-soft-navy uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-cloud-white">
                @forelse($users as $user)
                <tr class="hover:bg-cloud-white/50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-deep-graphite">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-soft-navy">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-soft-navy">{{ $user->store_name ?? '-' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-soft-navy">{{ $user->created_at->format('d F Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form action="{{ route('admin.users.toggleStatus', $user) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin memblokir pengguna ini?');">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="text-coral-red hover:underline">Blokir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-4 text-center text-soft-navy">Tidak ada pengguna penjual yang terdaftar.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $users->links() }}</div>
@endsection
