<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-slate-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-slate-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-slate-300">
                    <form action="{{ route('users.update', $user) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block font-medium text-sm text-slate-400">Nama</label>
                                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" class="mt-1 block w-full bg-slate-900 border-slate-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('name') <span class="text-rose-400 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="email" class="block font-medium text-sm text-slate-400">Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full bg-slate-900 border-slate-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                @error('email') <span class="text-rose-400 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="password" class="block font-medium text-sm text-slate-400">Password Baru</label>
                                <input id="password" name="password" type="password" class="mt-1 block w-full bg-slate-900 border-slate-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <p class="mt-1 text-xs text-slate-500">Kosongkan jika tidak ingin mengubah password.</p>
                                @error('password') <span class="text-rose-400 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="password_confirmation" class="block font-medium text-sm text-slate-400">Konfirmasi Password Baru</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full bg-slate-900 border-slate-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                             <div class="md:col-span-2">
                                <label for="role" class="block font-medium text-sm text-slate-400">Role</label>
                                <select id="role" name="role" class="mt-1 block w-full bg-slate-900 border-slate-600 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                @error('role') <span class="text-rose-400 text-sm mt-1">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('users.index') }}" class="px-4 py-2 text-sm font-medium text-slate-300 bg-slate-700 hover:bg-slate-600 rounded-md mr-3">Batal</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>