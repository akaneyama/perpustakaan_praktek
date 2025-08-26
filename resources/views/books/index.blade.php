<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">

            <svg class="h-8 w-8 text-slate-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v11.494m-9-5.747h18"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
            <div>
                <h2 class="font-semibold text-2xl text-slate-200 leading-tight">
                    {{ __('Koleksi Buku') }}
                </h2>
                <p class="text-sm text-slate-400">Jelajahi semua koleksi buku yang tersedia di perpustakaan.</p>
            </div>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="bg-emerald-900/50 border-l-4 border-emerald-500 text-emerald-300 p-4 mb-6" role="alert">
            <p class="font-bold">Sukses</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif


        <div class="flex justify-end mb-6">
            <a href="{{ route('books.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                Tambah Buku Baru
            </a>
        </div>


    <div x-data="{ 
            showModal: false, 
            bookIdToDelete: null,
            openModal(bookId) {
                this.showModal = true;
                this.bookIdToDelete = bookId;
            }
        }">


        <div class="grid grid-cols-2 sm-grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
            
            @forelse ($books as $book)
                <div class="bg-slate-800 rounded-lg shadow-lg overflow-hidden group">
                    <div class="relative">
 
                        <img src="{{ $book->gambar ? asset('storage/' . $book->gambar) : asset('storage/buku/gambarnot.jpg') }}" 
                             alt="Cover Buku {{ $book->judul }}" 
                             class="w-full aspect-[2/3] object-cover">
                        
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all duration-300"></div>
                        

                            <div class="absolute top-2 right-2 z-10 flex space-x-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <a href="{{ route('books.edit', $book) }}" class="p-2 bg-amber-500/80 hover:bg-amber-500 rounded-full" title="Edit">
                                    <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Z" /></svg>
                                </a>
                                <button @click="openModal({{ $book->id }})" class="p-2 bg-rose-500/80 hover:bg-rose-500 rounded-full" title="Hapus">
                                    <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.134-2.033-2.134H8.033c-1.12 0-2.033.954-2.033 2.134v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                </button>
                            </div>
                        
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-slate-200 truncate" title="{{ $book->judul }}">{{ $book->judul }}</h3>
                        <p class="text-sm text-slate-400 mt-1">oleh {{ $book->penulis }}</p>
                        <p class="text-xs text-slate-500 mt-2">{{ $book->penerbit }} - {{ $book->tahun_terbit }}</p>
                        <div class="mt-3">
                               <span class="px-2.5 py-0.5 inline-flex text-xs leading-5 font-semibold rounded-full bg-emerald-500/10 text-emerald-400">
                                  Stok: {{ $book->stok }}
                              </span>
                        </div>
                    </div>

 
                        <form id="delete-form-{{ $book->id }}" action="{{ route('books.destroy', $book) }}" method="POST" class="hidden">@csrf @method('DELETE')</form>

                </div>
            @empty
                <div class="col-span-full text-center text-slate-400 py-12">
                    <p>Belum ada buku di koleksi.</p>
                </div>
            @endforelse
        </div>


        <div class="mt-8">
            {{ $books->links() }}
        </div>

   
        <div x-show="showModal" 
             style="display: none;" 
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/70" 
             x-cloak>
            
            <div @click.away="showModal = false" class="bg-slate-800 rounded-lg shadow-xl w-full max-w-md p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-rose-500/10 rounded-full">
                        <svg class="h-6 w-6 text-rose-500" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-bold text-slate-200">Konfirmasi Hapus Buku</h3>
                        <p class="text-sm text-slate-400">Anda yakin ingin menghapus buku ini? Tindakan ini tidak dapat diurungkan.</p>
                    </div>
                </div>
                <div class="mt-6 flex justify-end space-x-3">
                    <button @click="showModal = false" class="px-4 py-2 text-sm font-medium text-slate-300 bg-slate-700 hover:bg-slate-600 rounded-md">Batal</button>
                    <button @click="document.getElementById('delete-form-' + bookIdToDelete).submit()" class="px-4 py-2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-700 rounded-md">Ya, Hapus</button>
                </div>
            </div>
        </div>

    </div> </x-app-layout>