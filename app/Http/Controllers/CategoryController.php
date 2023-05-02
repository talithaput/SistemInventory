<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
    public function __construct()

    {
        $this->middleware('auth');
        $this->Category = new Category();
    }

    public function index()
    {
        $data=[
            'category'=>$this->Category->allData(),
        ];
        return view('private.category.index', $data);
    }

    public function create()

    {
        return view('private.category.create');
    }

    public function store(Request $request)

    {
        $this->validate($request, [
            'nama_kategori' => 'required',
        ], [
            'nama_kategori.required' => 'Nama Barang Wajib Diisi'
        ]);

        Category::create([
            'nama_kategori'=>$request->nama_kategori,
        ]);
        return redirect()->route('category')->with('message', 'Anda berhasil <strong>menambahkan</strong> data barang ini');
    }

    public function destroy(Category $category)

    {

        $category->delete();

        return redirect()->back()->with('message', 'Anda berhasil <strong>menghapus</strong> data barang ini');
    }
}
