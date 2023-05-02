@extends('layouts.app')
@section('title','Data Kategori')
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
                <a href="/category/create" class="btn btn-warning btn-sm">Tambah Data Kategori</a> <br>
            
            <table class="table table-bordered table-striped">
                <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; ?>
                @foreach ($category as $data)
                <tr class="text-center">
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nama_kategori }}</td>
                    <td>
                        <form action="/category/destroy{{ $data->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data barang ini?')">
                            Delete</a>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
           
        </div>
    </div>
</div>
</body>
@endsection