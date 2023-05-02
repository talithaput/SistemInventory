<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangKeluar;

class BarangKeluarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {
        $user_id = auth()->user()->id;
        $barang_keluars = BarangKeluar::with('nama_barang');
        $barang_keluars = BarangKeluar::where('user_id', $user_id)->latest()->get();
        
        return view('private.barang_keluar.index', compact('barang_keluars'));
    }

    public function create()

    {
        $barangs = Barang::all();
        return view('private.barang_keluar.create',compact('barangs'));
    }

    public function store(Request $request)

    {
        $this->validate($request, [
            'barang_id' => 'required',
            'total' => 'required',
            'jumlah' => 'required',
            'created_at'=> 'required',
        ], [
            'barang_id.required' => 'Nama Barang Wajib Diisi'
        ]);

        BarangKeluar::create([
            'user_id'=>auth()->user()->id,
            'barang_id'=>$request->barang_id,
            'total'=> $request->total,
            'jumlah'=> $request->jumlah,
            'created_at'=> $request->created_at,
        ]);
        return redirect()->route('barang_keluar')->with('message', 'Anda berhasil <strong>menambahkan</strong> data barang ini');
    }

    public function edit(BarangKeluar $barang_keluar)
    {

        
        $barangs = Barang::all();
        $barang_keluars = BarangKeluar::with('nama_barang');

        return view('private.barang_keluar.edit', compact('barang_keluar','barangs'));
    }

    public function update(BarangKeluar $barang_keluar, Request $request)
    {
        
        
        $this->validate($request, [
            'barang_id' => 'required',
            'total' => 'required',
            'jumlah' => 'required',
            'created_at'=> 'required',
        ], [
            'barang_id.required' => 'Nama Barang Wajib Diisi'
        ]);

        $barang_keluar->update([
            'user_id'=>auth()->user()->id,
            'barang_id'=>$request->barang_id,
            'total'=> $request->total,
            'jumlah'=> $request->jumlah,
            'created_at'=> $request->created_at,
        ]);

        return redirect()->route('barang_keluar')->with('message', 'Anda berhasil <strong>mengupdate</strong> data barang ini');
    }

    public function destroy(BarangKeluar $barang_keluar)

    {

        $barang_keluar->delete();

        return redirect()->back()->with('message', 'Anda berhasil <strong>menghapus</strong> data barang ini');
    }

    public function cetakLaporan()
    {
        return view('laporan_keluar.cetak-laporan-keluar');
    }

    public function cetakLaporanPertanggal($tglawal, $tglakhir)
    {
        $cetakPertanggal = BarangKeluar::where('created_at',[$tglawal, $tglakhir])->latest()->get();
        return view('laporan_keluar.cetak-laporan-pertanggal-keluar', compact('cetakPertanggal'));

    }

}
