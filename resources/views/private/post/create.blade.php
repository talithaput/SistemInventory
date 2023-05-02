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
            <div class="card-header">Tambah Data Barang</div>
            <div class="card-body">
                <form action="/barang/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Nama Barang</label>
                    <input type="text" id="title" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang">
                    @error('nama_barang')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title">Kategori</label>
                    <select class="form-control" name="category_id" id="category_id" >
                        <option disabled value>Pilih Kategori</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Harga</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                        </div>
                    <input type="number" id="title" class="form-control" name="harga">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title">Stok</label>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">Unit</span>
                        </div>
                    <input type="number" id="title" class="form-control" name="stok">
                    </div>
                </div>
                <button type="submit" class="btn btn-success float-end">Tambah</button>
                <div class="col text-start"><a href="{{ route('barang') }}" class="btn btn-primary" type="button">Kembali</a></div>
                </form>   
            </div> 
        </div>
    </div>
    </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
