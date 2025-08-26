<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 shadow-lg rounded-lg p-6 mb-6">
                <h3 class="text-2xl font-bold text-white">Selamat Datang, {{ Auth::user()->name }}!</h3>
                <p class="text-slate-400 mt-1">
                    @if(auth()->user()->role == 'admin')
                        Berikut adalah ringkasan aktivitas di perpustakaan Anda hari ini.
                    @else
                        Selamat menikmati koleksi buku di Perpustakaan Digital.
                    @endif
                </p>
            </div>

           
            @if(auth()->user()->role == 'admin')
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-slate-800 shadow-lg rounded-lg p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Total Judul Buku</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $totalJudulBuku }}</p>
                        </div>
                        <div class="p-3 bg-indigo-500/20 rounded-full"><svg class="h-8 w-8 text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg></div>
                    </div>
                    <div class="bg-slate-800 shadow-lg rounded-lg p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Buku Dipinjam</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $peminjamanAktif }}</p>
                        </div>
                        <div class="p-3 bg-amber-500/20 rounded-full"><svg class="h-8 w-8 text-amber-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M20.25 20.25v-4.5m0 4.5h-4.5m4.5 0L15 15" /></svg></div>
                    </div>
                    <div class="bg-slate-800 shadow-lg rounded-lg p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Total Eksemplar</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $totalEksemplar }}</p>
                        </div>
                        <div class="p-3 bg-emerald-500/20 rounded-full"><svg class="h-8 w-8 text-emerald-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-4.286 3.13a4.5 4.5 0 0 0 0 6.278l4.286 3.13a4.5 4.5 0 0 0 6.278 0l4.286-3.13a4.5 4.5 0 0 0 0-6.278L13.28 6.31a4.5 4.5 0 0 0-6.278 0Z" /></svg></div>
                    </div>
                    <div class="bg-slate-800 shadow-lg rounded-lg p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Total Pengguna</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $totalPengguna }}</p>
                        </div>
                        <div class="p-3 bg-sky-500/20 rounded-full"><svg class="h-8 w-8 text-sky-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m-7.5-2.962a3.752 3.752 0 0 1-4.23-1.664M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 6.75h.008v.008H12v-.008Z" /></svg></div>
                    </div>
                </div>
            @else
         
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-slate-800 shadow-lg rounded-lg p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Buku Sedang Dipinjam</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $peminjamanAktifUser }}</p>
                        </div>
                        <div class="p-3 bg-amber-500/20 rounded-full"><svg class="h-8 w-8 text-amber-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M20.25 20.25v-4.5m0 4.5h-4.5m4.5 0L15 15" /></svg></div>
                    </div>
                     <div class="bg-slate-800 shadow-lg rounded-lg p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Total Riwayat Pinjam</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $totalRiwayatUser }}</p>
                        </div>
                        <div class="p-3 bg-sky-500/20 rounded-full"><svg class="h-8 w-8 text-sky-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg></div>
                    </div>
                    <div class="bg-slate-800 shadow-lg rounded-lg p-6 flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-400 uppercase tracking-wider">Koleksi Buku Tersedia</p>
                            <p class="text-3xl font-bold text-white mt-2">{{ $totalJudulBuku }}</p>
                        </div>
                        <div class="p-3 bg-indigo-500/20 rounded-full"><svg class="h-8 w-8 text-indigo-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" /></svg></div>
                    </div>
                </div>
            @endif
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
                <div class="lg:col-span-2 bg-slate-800 shadow-lg rounded-lg">
                    <div class="p-6 border-b border-slate-700">
                        <h3 class="text-lg font-bold text-slate-200">
                             @if(auth()->user()->role == 'admin')
                                Buku Baru Ditambahkan
                            @else
                                Riwayat Peminjaman Terkini Anda
                            @endif
                        </h3>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-4">
                            @if(auth()->user()->role == 'admin')
                                
                                @forelse ($bukuTerbaru as $buku)
                                    <li class="flex items-center space-x-4"><img src="{{ $buku->gambar ? asset('storage/' . $buku->gambar) : asset('storage/buku/gambarnot.jpg') }}" alt="Cover" class="w-12 h-16 object-cover rounded-md"><div><p class="font-semibold text-slate-200">{{ $buku->judul }}</p><p class="text-sm text-slate-400">oleh {{ $buku->penulis }}</p></div><div class="flex-grow text-right"><p class="text-xs text-slate-500">{{ $buku->created_at->diffForHumans() }}</p></div></li>
                                @empty
                                    <li class="text-center text-slate-400 py-4">Belum ada buku baru yang ditambahkan.</li>
                                @endforelse
                            @else
                               
                                @forelse ($riwayatTerbaruUser as $peminjaman)
                                    <li class="flex items-center space-x-4"><img src="{{ $peminjaman->book->gambar ? asset('storage/' . $peminjaman->book->gambar) : asset('storage/buku/gambarnot.jpg') }}" alt="Cover" class="w-12 h-16 object-cover rounded-md"><div><p class="font-semibold text-slate-200">{{ $peminjaman->book->judul }}</p><p class="text-sm text-slate-400">Dipinjam pada {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d M Y') }}</p></div><div class="flex-grow text-right"><span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full {{ $peminjaman->status == 'dipinjam' ? 'bg-amber-500/10 text-amber-400' : 'bg-emerald-500/10 text-emerald-400' }}">{{ ucfirst($peminjaman->status) }}</span></div></li>
                                @empty
                                    <li class="text-center text-slate-400 py-4">Anda belum memiliki riwayat peminjaman.</li>
                                @endforelse
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="bg-slate-800 shadow-lg rounded-lg p-6">
                     <h3 class="text-lg font-bold text-slate-200 mb-4">Aksi Cepat</h3>
                     <div class="space-y-4">
                        @if(auth()->user()->role == 'admin')
                  
                            <a href="{{ route('books.create') }}" class="w-full text-center inline-flex items-center justify-center px-4 py-3 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700 transition">Tambah Buku Baru</a>
                            <a href="{{ route('users.create') }}" class="w-full text-center inline-flex items-center justify-center px-4 py-3 bg-slate-700 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-slate-600 transition">Tambah User Baru</a>
                        @else
                      
                            <a href="{{ route('peminjaman.create') }}" class="w-full text-center inline-flex items-center justify-center px-4 py-3 bg-emerald-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-emerald-700 transition">Pinjam Buku Baru</a>
                            <a href="{{ route('peminjaman.index') }}" class="w-full text-center inline-flex items-center justify-center px-4 py-3 bg-slate-700 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-slate-600 transition">Lihat Riwayat Saya</a>
                        @endif
                     </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>