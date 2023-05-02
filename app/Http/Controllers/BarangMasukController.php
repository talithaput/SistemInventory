<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangMasuk;

class BarangMasukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {
        $user_id = auth()->user()->id;
        $barang_masuks = BarangMasuk::with('nama_barang');
        $barang_masuks = BarangMasuk::where('user_id', $user_id)->latest()->get();
        
        return view('private.barang_masuk.index', compact('barang_masuks'));
    }

    public function create()

    {
        $barangs = Barang::all();
        return view('private.barang_masuk.create',compact('barangs'));
    }

    public function store(Request $request)

    {
        $this->validate($request, [
            'barang_id' => 'required',
            'unit' => 'required',
            'supplier' => 'required',
            'created_at'=> 'required',
        ], [
            'barang_id.required' => 'Nama Barang Wajib Diisi'
        ]);

        BarangMasuk::create([
            'user_id'=>auth()->user()->id,
            'barang_id'=>$request->barang_id,
            'unit'=> $request->unit,
            'supplier'=> $request->supplier,
            'created_at'=> $request->created_at,
        ]);
        return redirect()->route('barang_masuk')->with('message', 'Anda berhasil <strong>menambahkan</strong> data barang ini');
    }

    public function edit(BarangMasuk $barang_masuk)
    {

        
        $barangs = Barang::all();
        $barang_masuks = BarangMasuk::with('nama_barang');

        return view('private.barang_masuk.edit', compact('barang_masuk','barangs'));
    }

    public function update(BarangMasuk $barang_masuk, Request $request)
    {
        
        
        $this->validate($request, [
            'barang_id' => 'required',
            'unit' => 'required',
            'supplier' => 'required',
            'created_at'=> 'required',
        ], [
            'barang_id.required' => 'Nama Barang Wajib Diisi'
        ]);

        $barang_masuk->update([
            'user_id'=>auth()->user()->id,
            'barang_id'=>$request->barang_id,
            'unit'=> $request->unit,
            'supplier'=> $request->supplier,
            'created_at'=> $request->created_at,
        ]);

        return redirect()->route('barang_masuk')->with('message', 'Anda berhasil <strong>mengupdate</strong> data barang ini');
    }

    public function destroy(BarangMasuk $barang_masuk)

    {

        $barang_masuk->delete();

        return redirect()->back()->with('message', 'Anda berhasil <strong>menghapus</strong> data barang ini');
    }

    public function cetakLaporan()
    {
        return view('laporan_masuk.cetak-laporan-masuk');
    }

    public function cetakLaporanPertanggal($tglawal, $tglakhir)
    {
        $cetakPertanggal = BarangMasuk::where('created_at',[$tglawal, $tglakhir])->latest()->get();
        return view('laporan_masuk.cetak-laporan-pertanggal-masuk', compact('cetakPertanggal'));

    }
    
}
