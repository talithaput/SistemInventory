@extends('layouts.app')
@section('title','Data Barang Rusak')
@section('content')
<body style="background-color:#e4e6c3">
<div class="container">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dissmiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        {!! session('message') !!}
    </div>
    @endif
    <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
                <a href="/barang_rusak/create" class="btn btn-primary btn-sm">Tambah Data Barang</a> <br>
            
            <table class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal Rusak</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                @forelse ($barang_rusaks as $barang_rusak)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $barang_rusak->barang->nama_barang }}</td>
                    <td>{{ $barang_rusak->jumlah }}</td>
                    <td>{{ $barang_rusak->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="/barang_rusak/edit{{ $barang_rusak->id }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="/barang_rusak/destroy{{ $barang_rusak->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data barang ini?')">
                            Delete</a>
                            </button>
                        </form>
                    </td>
                    @empty
                    <div class="alert alert-danger mt-3 text-center" role="alert">
                    Anda belum memasukkan beberapa data!
                </tr>
                @endforelse
                </tbody>
            </table>
           
        </div>
    </div>
</div>
</body>
@endsection