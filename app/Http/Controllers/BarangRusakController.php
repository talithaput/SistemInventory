<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangRusak;

class BarangRusakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {
        $user_id = auth()->user()->id;
        $barang_rusaks = BarangRusak::with('nama_barang');
        $barang_rusaks = BarangRusak::where('user_id', $user_id)->latest()->get();
        
        return view('private.barang_rusak.index', compact('barang_rusaks'));
    }

    public function create()

    {
        $barangs = Barang::all();
        return view('private.barang_rusak.create',compact('barangs'));
    }

    public function store(Request $request)

    {
        $this->validate($request, [
            'barang_id' => 'required',
            'jumlah' => 'required',
            'created_at'=> 'required',
        ], [
            'barang_id.required' => 'Nama Barang Wajib Diisi'
        ]);

        BarangRusak::create([
            'user_id'=>auth()->user()->id,
            'barang_id'=>$request->barang_id,
            'jumlah'=> $request->jumlah,
            'created_at'=> $request->created_at,
        ]);
        return redirect()->route('barang_rusak')->with('message', 'Anda berhasil <strong>menambahkan</strong> data barang ini');
    }

    public function edit(BarangRusak $barang_rusak)
    {

        
        $barangs = Barang::all();
        $barang_rusaks = BarangRusak::with('nama_barang');

        return view('private.barang_rusak.edit', compact('barang_rusak','barangs'));
    }

    public function update(BarangRusak $barang_rusak, Request $request)
    {
        
        
        $this->validate($request, [
            'barang_id' => 'required',
            'jumlah' => 'required',
            'created_at'=> 'required',
        ], [
            'barang_id.required' => 'Nama Barang Wajib Diisi'
        ]);

        $barang_rusak->update([
            'user_id'=>auth()->user()->id,
            'barang_id'=>$request->barang_id,
            'jumlah'=> $request->jumlah,
            'created_at'=> $request->created_at,
        ]);

        return redirect()->route('barang_rusak')->with('message', 'Anda berhasil <strong>mengupdate</strong> data barang ini');
    }

    public function destroy(BarangRusak $barang_rusak)

    {

        $barang_rusak->delete();

        return redirect()->back()->with('message', 'Anda berhasil <strong>menghapus</strong> data barang ini');
    }

    public function cetakLaporan()
    {
        return view('laporan_rusak.cetak-laporan-rusak');
    }

    public function cetakLaporanPertanggal($tglawal, $tglakhir)
    {
        $cetakPertanggal = BarangRusak::where('created_at',[$tglawal, $tglakhir])->latest()->get();
        return view('laporan_rusak.cetak-laporan-pertanggal-rusak', compact('cetakPertanggal'));

    }

}
