@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Daftar Barang yang Dihapus</h1>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($barangs->isEmpty())
                    <div class="alert alert-info">
                        Tidak ada barang yang telah dihapus.
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
                                        <form action="{{ route('barangs.restore', $barang->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-primary">Restore</button>
                                        </form>
                                        <form action="{{ route('barangs.forceDelete', $barang->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus permanen barang ini?')">Hapus Permanen</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Kembali ke Daftar Barang</a>
            </div>
        </div>
    </div>
@endsection
