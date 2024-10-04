@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Barang</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Judul: {{ $barang->judul }}</h5>
            <p class="card-text">Deskripsi: {{ $barang->deskripsi }}</p>
            <p class="card-text">Stok: {{ $barang->stok }}</p>
            <p class="card-text">Kategori: {{ $barang->kategori }}</p>
        </div>
    </div>
    <a href="{{ route('barangs.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
