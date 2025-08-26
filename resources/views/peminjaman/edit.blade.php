<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-200 leading-tight">
            {{ __('Proses Pengembalian Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-slate-300 border-b border-slate-700">
                     <h3 class="text-lg font-bold text-slate-200">{{ $peminjaman->book->judul }}</h3>
                    <p class="text-sm text-slate-400">Dipinjam oleh: {{ $peminjaman->user->name }}</p>
                    <p class="text-sm text-slate-400">Tanggal Pinjam: {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}</p>
                </div>
                <div class="p-6 text-slate-300">
                    <form action="{{ route('peminjaman.update', $peminjaman) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="status" class="block font-medium text-sm text-slate-400 mb-1">Ubah Status Transaksi</label>
                            <select id="status" name="status" class="block w-full bg-slate-900 border-slate-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                <option value="dipinjam" {{ old('status', $peminjaman->status) == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                                <option value="dikembalikan" {{ old('status', $peminjaman->status) == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            </select>
                            @error('status') <span class="text-rose-400 text-sm mt-1">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('peminjaman.index') }}" class="px-4 py-2 text-sm font-medium text-slate-300 bg-slate-700 hover:bg-slate-600 rounded-md mr-3">Batal</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">Update Status</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>