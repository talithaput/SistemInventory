<?php

namespace App\Http\Controllers;

use App\Models\Category; 
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
   
    public function __construct()

    {
        $this->middleware('auth');
    }
    public function index()

    {
        $user_id = auth()->user()->id;
        $barangs = Barang::with('nama_kategori');
        $barangs = Barang::where('user_id', $user_id)->get();
       
        return view('private.post.index', compact('barangs'));
    }

    public function create()

    {
        $categories = Category::all();
        return view('private.post.create',compact('categories'));
    }

    public function store(Request $request)

    {
        $this->validate($request, [
            'nama_barang' => 'required',
            'category_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ], [
            'nama_barang.required' => 'Nama Barang Wajib Diisi'
        ]);

        Barang::create([
            'user_id'=>auth()->user()->id,
            'nama_barang'=>$request->nama_barang,
            'category_id'=> $request->category_id,
            'harga'=> $request->harga,
            'stok'=> $request->stok,
        ]);
        return redirect()->route('barang')->with('message', 'Anda berhasil <strong>menambahkan</strong> data barang ini');
    }

    public function edit(Barang $barang)
    {

        $this->authorize('update', $barang);
        $categories = Category::all();
        $barangs = Barang::with('nama_kategori');

        return view('private.post.edit', compact('barang','categories'));
    }

    public function update(Barang $barang, Request $request)
    {
        $this->authorize('update', $barang);
        
        $this->validate($request, [
            'nama_barang' => 'required',
            'category_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ], [
            'nama_barang.required' => 'Nama Barang Wajib Diisi'
        ]);


        $barang->update([
            'user_id'=>auth()->user()->id,
            'nama_barang'=>$request->nama_barang,
            'category_id'=> $request->category_id,
            'harga'=> $request->harga,
            'stok'=> $request->stok,
        ]);

        return redirect()->route('barang')->with('message', 'Anda berhasil <strong>mengupdate</strong> data barang ini');
    }

    public function destroy(Barang $barang)

    {

        $barang->delete();

        return redirect()->back()->with('message', 'Anda berhasil <strong>menghapus</strong> data barang ini');
    }
}
