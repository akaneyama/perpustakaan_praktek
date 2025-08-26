<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage; 

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::latest()->paginate(10); // Mengambil semua buku, diurutkan dari yang terbaru, 10 per halaman
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1800|max:'.date('Y'),
            'stok' => 'required|integer|min:0',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

 
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('buku', 'public');
            $validatedData['gambar'] = $path;
        }

        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Buku baru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $rules = [
            'judul'        => 'nullable|string|max:255',
            'penulis'      => 'nullable|string|max:255',
            'penerbit'     => 'nullable|string|max:255',
            'tahun_terbit' => 'nullable|integer|min:1800|max:'.date('Y'),
            'stok'         => 'nullable|integer|min:0',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validatedData = $request->validate($rules);

        if ($request->hasFile('gambar')) {
            if ($book->gambar) {
                Storage::disk('public')->delete($book->gambar);
            }
            $path = $request->file('gambar')->store('buku', 'public');
            $validatedData['gambar'] = $path;
        }

        $book->update($validatedData);

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {

        if ($book->gambar) {
            Storage::disk('public')->delete($book->gambar);
        }
        
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
