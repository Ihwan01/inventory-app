@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Daftar Barang</h1>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <a href="{{ route('barangs.create') }}" class="btn btn-success mb-3">Tambah Barang</a>
                <a href="{{ route('barangs.trashed') }}" class="btn btn-warning mb-3">Daftar Barang yang Dihapus</a>

                @if($barangs->isEmpty())
                    <div class="alert alert-info">
                        Tidak ada barang yang ditemukan.
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $barang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $barang->judul }}</td>
                                    <td>{{ $barang->deskripsi }}</td>
                                    <td>{{ $barang->stok }}</td>
                                    <td>{{ $barang->kategori }}</td>
                                    <td>
                                        <a href="{{ route('barangs.show', $barang->id) }}" class="btn btn-info">Detail</a>
                                        <a href="{{ route('barangs.edit', $barang->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
