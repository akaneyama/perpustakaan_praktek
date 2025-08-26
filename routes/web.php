<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;         
use App\Models\Book;         
use App\Models\Peminjaman;   
use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
 
    $user = Auth::user();
    
    
    if ($user->role == 'admin') {
      
        $totalJudulBuku = Book::count();
        $totalEksemplar = Book::sum('stok');
        $totalPengguna = User::count();
        $peminjamanAktif = Peminjaman::where('status', 'dipinjam')->count();
        $bukuTerbaru = Book::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalJudulBuku', 
            'totalEksemplar',
            'totalPengguna',
            'peminjamanAktif',
            'bukuTerbaru'
        ));
    } else {
     
        $peminjamanAktifUser = Peminjaman::where('user_id', $user->id)
                                        ->where('status', 'dipinjam')
                                        ->count();
        $totalRiwayatUser = Peminjaman::where('user_id', $user->id)->count();
        $totalJudulBuku = Book::count(); 
        $riwayatTerbaruUser = Peminjaman::where('user_id', $user->id)
                                        ->with('book') 
                                        ->latest()
                                        ->take(5)
                                        ->get();

        return view('dashboard', compact(
            'peminjamanAktifUser',
            'totalRiwayatUser',
            'totalJudulBuku',
            'riwayatTerbaruUser'
        ));
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function() {
        Route::resource('users', UserController::class);

        Route::get('books', [BookController::class, 'index'])->name('books.index');
        Route::get('books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('books', [BookController::class, 'store'])->name('books.store');
        Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
        Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
        
 
        Route::get('peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
        Route::put('peminjaman/{peminjaman}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
        Route::delete('peminjaman/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('peminjaman/{peminjaman}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
});

require __DIR__.'/auth.php';


