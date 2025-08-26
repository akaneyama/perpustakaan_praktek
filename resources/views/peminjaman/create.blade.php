<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <svg class="h-8 w-8 text-slate-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v11.494m-9-5.747h18" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.25 4.5h13.5" />
            </svg>
            <div>
                <h2 class="font-semibold text-2xl text-slate-200 leading-tight">
                    {{ __('Pinjam Buku Baru') }}
                </h2>
                <p class="text-sm text-slate-400">Pilih buku yang ingin Anda pinjam dari koleksi yang tersedia.</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 md:p-8 text-slate-300">
                    
                    @if (session('error'))
                        <div class="bg-rose-900/50 border-l-4 border-rose-500 text-rose-300 p-4 mb-6" role="alert">
                            <p class="font-bold">Gagal</p><p>{{ session('error') }}</p>
                        </div>
                    @endif

                    <form action="{{ route('peminjaman.store') }}" method="POST" x-data="{ selectedBookId: '{{ old('book_id') }}' }">
                        @csrf
                        
                        <input type="hidden" name="book_id" x-model="selectedBookId">

                        <div>
                            <label class="block font-medium text-lg text-slate-300 mb-4">Pilih Buku yang Tersedia</label>

                            @error('book_id') 
                                <div class="bg-rose-900/50 text-rose-300 p-3 mb-4 rounded-md text-sm">
                                    {{ $message }}
                                </div>
                            @enderror

                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                                @forelse($books as $book)
                                    <div @click="selectedBookId = {{ $book->id }}"
                                         class="relative rounded-lg overflow-hidden cursor-pointer border-2 border-slate-700 hover:border-indigo-500 transition-all duration-200 group"
                                         :class="{ 'ring-2 ring-offset-2 ring-offset-slate-800 ring-indigo-500 border-indigo-500': selectedBookId == {{ $book->id }} }">
                                        
                                        <img src="{{ $book->gambar ? asset('storage/' . $book->gambar) : 'https://via.placeholder.com/400x600.png/1e293b/94a3b8?text=No+Image' }}" 
                                             alt="Cover {{ $book->judul }}" 
                                             class="w-full aspect-[2/3] object-cover">
                                        
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-3 flex flex-col justify-end">
                                            <h3 class="font-bold text-sm text-white truncate group-hover:whitespace-normal">{{ $book->judul }}</h3>
                                            <span class="text-xs font-semibold rounded-full mt-1 px-2 py-0.5 bg-emerald-500/20 text-emerald-300 self-start">
                                                Stok: {{ $book->stok }}
                                            </span>
                                        </div>

                                        <div x-show="selectedBookId == {{ $book->id }}" 
                                             x-transition 
                                             class="absolute top-2 right-2 bg-indigo-600 text-white rounded-full p-1">
                                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-span-full text-center text-slate-500 py-10">
                                        <p>Tidak ada buku yang tersedia untuk dipinjam saat ini.</p>
                                    </div>
                                @endforelse
                            </div>

                            <div class="mt-8">
                                {{ $books->links() }}
                            </div>

                        </div>

                        <div class="flex items-center justify-end mt-6 border-t border-slate-700 pt-6">
                            <a href="{{ route('peminjaman.index') }}" class="px-4 py-2 text-sm font-medium text-slate-300 bg-slate-700 hover:bg-slate-600 rounded-md mr-3">Batal</a>
                            
                            <button type="submit" 
                                    :disabled="!selectedBookId"
                                    :class="{ 'opacity-50 cursor-not-allowed': !selectedBookId }"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 disabled:bg-indigo-800/50 transition-all">
                                Pinjam Sekarang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>