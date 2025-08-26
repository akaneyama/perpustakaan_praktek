<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $peminjamans = Peminjaman::with(['user', 'book'])->latest()->paginate(10);
        } else {
            $peminjamans = Peminjaman::where('user_id', Auth::id())->with('book')->latest()->paginate(10);
        }
        return view('peminjaman.index', compact('peminjamans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::where('stok', '>', 0)->select('id', 'judul', 'penulis', 'gambar', 'stok')->paginate(12);
        return view('peminjaman.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $book = Book::findOrFail($request->book_id);

      
        if ($book->stok < 1) {
            return redirect()->back()->with('error', 'Stok buku tidak mencukupi.');
        }


        Peminjaman::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'tanggal_pinjam' => Carbon::now(),
            'status' => 'dipinjam',
        ]);

        $book->decrement('stok');

        return redirect()->route('peminjaman.index')->with('success', 'Buku berhasil dipinjam.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        return view('peminjamans.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        return view('peminjaman.edit', compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);
        
    
        if ($peminjaman->status == 'dipinjam' && $request->status == 'dikembalikan') {
    
            $peminjaman->update([
                'status' => 'dikembalikan',
                'tanggal_kembali' => Carbon::now(),
            ]);
            

            $peminjaman->book()->increment('stok');

            return redirect()->route('peminjaman.index')->with('success', 'Buku telah berhasil dikembalikan.');
        }
        
        $peminjaman->update($request->only('status'));

        return redirect()->route('peminjaman.index')->with('success', 'Status peminjaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        if ($peminjaman->status == 'dipinjam') {
            $peminjaman->book()->increment('stok');
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
