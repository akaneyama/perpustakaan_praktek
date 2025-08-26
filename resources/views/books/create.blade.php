<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-200 leading-tight">
            {{ __('Tambah Buku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-slate-300">
 
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="judul" class="block font-medium text-sm text-slate-400">Judul</label>
                                <input id="judul" name="judul" type="text" value="{{ old('judul') }}" class="mt-1 block w-full bg-slate-900 border-slate-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('judul') <span class="text-rose-400 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="penulis" class="block font-medium text-sm text-slate-400">Penulis</label>
                                <input id="penulis" name="penulis" type="text" value="{{ old('penulis') }}" class="mt-1 block w-full bg-slate-900 border-slate-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('penulis') <span class="text-rose-400 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                             <div>
                                <label for="penerbit" class="block font-medium text-sm text-slate-400">Penerbit</label>
                                <input id="penerbit" name="penerbit" type="text" value="{{ old('penerbit') }}" class="mt-1 block w-full bg-slate-900 border-slate-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('penerbit') <span class="text-rose-400 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                             <div>
                                <label for="tahun_terbit" class="block font-medium text-sm text-slate-400">Tahun Terbit</label>
                                <input id="tahun_terbit" name="tahun_terbit" type="number" value="{{ old('tahun_terbit') }}" placeholder="Contoh: 2024" class="mt-1 block w-full bg-slate-900 border-slate-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('tahun_terbit') <span class="text-rose-400 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                             <div>
                                <label for="stok" class="block font-medium text-sm text-slate-400">Stok</label>
                                <input id="stok" name="stok" type="number" value="{{ old('stok') }}" class="mt-1 block w-full bg-slate-900 border-slate-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('stok') <span class="text-rose-400 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label for="gambar" class="block font-medium text-sm text-slate-400">Cover Buku (Opsional)</label>
                                <input id="gambar" name="gambar" type="file" class="mt-1 block w-full text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-500/10 file:text-indigo-300 hover:file:bg-indigo-500/20">
                                @error('gambar') <span class="text-rose-400 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('books.index') }}" class="px-4 py-2 text-sm font-medium text-slate-300 bg-slate-700 hover:bg-slate-600 rounded-md mr-3">Batal</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                                Simpan Buku
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>