<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Inventory</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body style="background-color:#e4e6c3">
    <div id="app">
    <main class="py-4">
    <div class="container d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header">Edit Data Barang Keluar - {{ $barang_keluar->barang->nama_barang }}</div>
            <div class="card-body">
                <form action="/barang_keluar/update{{ $barang_keluar->id }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="title">Nama Barang</label>
                    <select id="barang_id" class="form-control" name="barang_id">
                    <option value="{{ $barang_keluar->barang_id }}">{{ $barang_keluar->barang->nama_barang }}</option>
                    @foreach ($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->id }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Jumlah</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Jumlah</span>
                        </div>
                    <input type="number" id="jumlah" class="form-control" name="jumlah" value="{{ $barang_keluar->jumlah }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Total</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                        </div>
                    <input type="number" id="total" class="form-control" name="total" value="{{ $barang_keluar->total }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Tanggal Pemesanan</label>
                    <input type="date" id="created_at" class="form-control" name="created_at" value="{{ $barang_keluar->created_at }}">
                </div><br>
                <button type="submit" class="btn btn-success float-end">Update</button>
                <div class="col text-start"><a href="{{ route('barang_keluar') }}" class="btn btn-primary" type="button">Kembali</a></div>
                </form>   
            </div> 
        </div>
    </div>
</main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>