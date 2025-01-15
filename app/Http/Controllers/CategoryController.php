<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Barryvdh\DomPDF\Facade\PDF;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // Mengambil kategori dan menampilkan dalam tampilan
        $categories = Category::latest()->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Menyimpan kategori baru
        Category::create(['name' => $request->name]);

        // Mengalihkan ke halaman kategori dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category): View
    {
        // Menampilkan form edit kategori
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category): RedirectResponse
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Memperbarui kategori
        $category->update(['name' => $request->name]);

        // Mengalihkan ke halaman kategori dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        // Menghapus kategori
        $category->delete();

        // Mengalihkan ke halaman kategori dengan pesan sukses
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil dihapus!');
    }

    /**
     * Show the specified resource.
     */
    public function show(Category $category): View
    {
        // Menampilkan detail kategori
        return view('categories.show', compact('category'));
    }

    public function printPdfcategories()
    {
        $categories = Category::get();
        $data = [
            'title' => 'LIST KATEGORI',
            'date' => date('m/d/Y'),
            'categories' => $categories
        ];
        $pdf = PDF::loadview('categoriespdf', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Data Kategori.pdf', array("attachment"
        => false));
    }
    public function categoriesExcel()
    {
        $categories = Category::get();
        $data = [
            'title' => 'Welcome To fti.uniska-bjm.ac.id',
            'date' => date('m/d/y'),
            'categories' => $categories
        ];
        return view('categoriesexcel', $data);
    }
    
}
