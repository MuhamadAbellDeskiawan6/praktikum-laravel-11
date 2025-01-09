<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::paginate(10);
        return view('units.index', compact('units'));
    }

     // Menampilkan detail satuan
     public function show(Unit $unit)
     {
         return view('units.show', compact('unit'));
     }

    public function create()
    {
        return view('units.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Unit::create($request->all());

        return redirect()->route('units.index')->with('success', 'Unit berhasil ditambahkan');
    }

    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $unit->update($request->all());

        return redirect()->route('units.index')->with('success', 'Unit berhasil diperbarui');
    }

    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('units.index')->with('success', 'Unit berhasil dihapus');
    }
}
