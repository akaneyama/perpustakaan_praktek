<div class="w-64 h-screen bg-slate-800 text-slate-300 flex flex-col fixed">
    <div class="h-16 flex items-center justify-center bg-slate-900 shadow-md">
        <div class="flex items-center">
            <svg class="h-8 w-8 text-indigo-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
            </svg>
            <h1 class="text-xl text-white font-bold tracking-wider">Perpus Daffa</h1>
        </div>
    </div>

    <nav class="flex-grow mt-4">
        @php
            $commonClasses = 'flex items-center px-6 py-3 text-slate-300 hover:bg-slate-700 hover:text-white transition-colors duration-200';
            $activeClasses = 'bg-slate-700 text-white border-l-4 border-indigo-400';
            $inactiveClasses = 'border-l-4 border-transparent';
        @endphp

        <a href="{{ route('dashboard') }}" class="{{ $commonClasses }} {{ request()->routeIs('dashboard') ? $activeClasses : $inactiveClasses }}">
            <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span>Dashboard</span>
        </a>

        @if(auth()->user()->role === 'admin')

            <a href="{{ route('users.index') }}" class="{{ $commonClasses }} {{ request()->routeIs('users.*') ? $activeClasses : $inactiveClasses }}">
                <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M15 21a6 6 0 00-9-5.197m0 0A5.965 5.965 0 0112 13a5.965 5.965 0 013 1.003m-3-1.003A4.002 4.002 0 0112 4.354M12 4.354v5.292"/></svg>
                <span>Manajemen User</span>
            </a>
            <a href="{{ route('books.index') }}" class="{{ $commonClasses }} {{ request()->routeIs('books.*') ? $activeClasses : $inactiveClasses }}">
                <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v11.494m-9-5.747h18"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
                <span>Manajemen Buku</span>
            </a>
        @endif
       
        <a href="{{ route('peminjaman.index') }}" class="{{ $commonClasses }} {{ request()->routeIs('peminjaman.*') ? $activeClasses : $inactiveClasses }}">
            <svg class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h4M8 7a2 2 0 012-2h4a2 2 0 012 2v8a2 2 0 01-2 2h-4a2 2 0 01-2-2z"/></svg>
            <span>Transaksi</span>
        </a>
    </nav>

   
</div>