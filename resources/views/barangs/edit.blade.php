@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Barang</h1>
    <form action="{{ route('barangs.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $barang->judul) }}" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ old('deskripsi', $barang->deskripsi) }}</textarea>
        </div>

        <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" value="{{ old('stok', $barang->stok) }}" required>
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="{{ old('kategori', $barang->kategori) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
        <a href="{{ route('barangs.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
