@extends('layouts.app')

@section('content')
<body>
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header"><a href="{{ route('category') }}"><i class="fa fa-table" style="color: black"></i></a></div>
            <div class="card-body">
                <h6 class="card-title">Tabel Data Kategori</h6>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header"><a href="{{ route('barang') }}"><i class="fa fa-table" style="color: black"></i></a></div>
            <div class="card-body">
                <h6 class="card-title">Tabel Data Barang</h6>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
             <div class="card-header"><a href="{{ route('barang_masuk') }}"><i class="fa fa-table" style="color: black"></i></a></div>
            <div class="card-body">
                <h6 class="card-title">Tabel Data Barang Masuk</h6>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header"><a href="{{ route('barang_keluar') }}"><i class="fa fa-table" style="color: black"></i></a></div>
            <div class="card-body">
                <h6 class="card-title">Tabel Data Barang Keluar</h6>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-dark bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header"><a href="{{ route('barang_rusak') }}"><i class="fa fa-table" style="color: black"></i></a></div>
            <div class="card-body">
                <h6 class="card-title">Tabel Data Barang Rusak</h6>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
