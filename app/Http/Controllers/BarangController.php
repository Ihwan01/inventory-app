<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::active()->get();
        return view('barangs.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barangs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'kategori' => 'required',
        ]);

        Barang::create($request->all());
        return redirect()->route('barangs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barangs.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barangs.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'kategori' => 'required',
        ]);

        $barang->update($request->all());
        return redirect()->route('barangs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->update(['is_deleted' => 1]);

        return redirect()->route('barangs.index')
            ->with('success', 'Barang berhasil dihapus!');
    }

    public function trashed()
    {
        $barangs = Barang::where('is_deleted', 1)->get();
        return view('barangs.trashed', compact('barangs'));
    }

    public function restore($id)
    {
        $barang = Barang::find($id);
        $barang->update(['is_deleted' => 0]); // Kembalikan barang
        return redirect()->route('barangs.trashed')
            ->with('success', 'Barang berhasil dikembalikan!');
    }

    public function forceDelete($id)
    {
        $barang = Barang::find($id);
        $barang->delete(); // Hapus permanen
        return redirect()->route('barangs.trashed')
            ->with('success', 'Barang berhasil dihapus permanen!');
    }
}
