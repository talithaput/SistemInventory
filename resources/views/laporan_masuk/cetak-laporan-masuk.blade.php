@extends('layouts.app')
@section('title','Cetak Laporan Data Barang Masuk')
@section('content')
<body style="background-color:#e4e6c3">
<div class="container">
    <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="card-body">
            <div class="input-group mb-3">
                <label for="label">Tanggal Awal</label>
                <input type="date" name="tglawal" id="tglawal" class="form-control"/>
            </div>
            <div class="input-group mb-3">
                <label for="label">Tanggal Akhir</label>
                <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
            </div>
            <div class="input-group mb-3">
                <a href="" onclick="this.href='/cetak-laporan-pertanggal-masuk/'+ document.getElementById('tglawal').value + '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary col-md-12">
                Cetak Laporan Pertanggal <i class="fa fa-print"></i>
                </a>
        </div>
    </div>
</div>
</body>
@endsection