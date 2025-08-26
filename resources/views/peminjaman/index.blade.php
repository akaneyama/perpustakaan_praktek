<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <svg class="h-8 w-8 text-slate-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h4M8 7a2 2 0 012-2h4a2 2 0 012 2v8a2 2 0 01-2 2h-4a2 2 0 01-2-2z"/></svg>
            <div>
                <h2 class="font-semibold text-2xl text-slate-200 leading-tight">
                    {{ __('Transaksi Peminjaman') }}
                </h2>
                <p class="text-sm text-slate-400">Kelola semua transaksi peminjaman dan pengembalian buku.</p>
            </div>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="bg-emerald-900/50 border-l-4 border-emerald-500 text-emerald-300 p-4 mb-4" role="alert">
            <p class="font-bold">Sukses</p><p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-slate-800 shadow-lg sm:rounded-lg" x-data="{ showModal: false, peminjamanIdToDelete: null }">
        <div class="p-6 border-b border-slate-700">
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-bold text-slate-300">Daftar Transaksi</h3>
                <a href="{{ route('peminjaman.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                    <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                    Pinjam Buku
                </a>
            </div>
        </div>
        
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-700">
                    <thead class="bg-slate-700/50">
                        <tr>
                            @if(auth()->user()->role == 'admin')
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Peminjam</th>
                            @endif
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Judul Buku</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Tgl Pinjam</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Tgl Kembali</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Status</th>
                            @if(auth()->user()->role == 'admin')
                            <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700">
                        @forelse ($peminjamans as $peminjaman)
                        <tr class="hover:bg-slate-700/50 transition-colors">
                            @if(auth()->user()->role == 'admin')
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-200">{{ $peminjaman->user->name }}</td>
                            @endif
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">{{ $peminjaman->book->judul }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-400">{{ $peminjaman->tanggal_kembali ? \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d M Y') : '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full {{ $peminjaman->status == 'dipinjam' ? 'bg-amber-500/10 text-amber-400' : 'bg-emerald-500/10 text-emerald-400' }}">
                                    {{ ucfirst($peminjaman->status) }}
                                </span>
                            </td>
                            @if(auth()->user()->role == 'admin')
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex space-x-2">
                                    @if($peminjaman->status == 'dipinjam')
                                    <a href="{{ route('peminjaman.edit', $peminjaman) }}" class="p-2 bg-sky-500/10 text-sky-500 hover:bg-sky-500/20 rounded-full" title="Proses Pengembalian"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" /></svg></a>
                                    @endif
                                    <!-- <button @click="showModal = true; peminjamanIdToDelete = {{ $peminjaman->id }}" class="p-2 bg-rose-500/10 text-rose-500 hover:bg-rose-500/20 rounded-full" title="Hapus"><svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.134-2.033-2.134H8.033c-1.12 0-2.033.954-2.033 2.134v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg></button>
                                    <form id="delete-form-{{ $peminjaman->id }}" action="{{ route('peminjaman.destroy', $peminjaman) }}" method="POST" class="hidden">@csrf @method('DELETE')</form> -->
                                </div>
                            </td>
                            @endif
                        </tr>
                        @empty
                        <tr><td colspan="6" class="px-6 py-4 text-center text-slate-400">Belum ada data transaksi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-6">{{ $peminjamans->links() }}</div>
        </div>
        <!-- <div x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50" x-cloak>
            <div @click.away="showModal = false" class="bg-slate-800 rounded-lg shadow-xl w-full max-w-md p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-rose-500/10 rounded-full"><svg class="h-6 w-6 text-rose-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg></div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-slate-200">Konfirmasi Hapus Transaksi</h3>
                        <p class="text-sm text-slate-400">Anda yakin ingin menghapus data transaksi ini?</p>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button @click="showModal = false" class="px-4 py-2 text-sm font-medium text-slate-300 bg-slate-700 hover:bg-slate-600 rounded-md">Batal</button>
                    <button @click="document.getElementById('delete-form-' + peminjamanIdToDelete).submit()" class="px-4 py-2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 rounded-md">Ya, Hapus</button>
                </div>
            </div>
        </div> -->
    </div>
</x-app-layout>