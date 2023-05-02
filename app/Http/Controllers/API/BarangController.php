<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Category; 

class BarangController extends Controller
{
    public function index()
    {
        $response=Barang::all();
        return response()->json([
        'kode'=>1,
        'pesan'=>'Data Tersedia',
        'data'=>$response
        ]);
        
    }

    public function store(Request $request)
    {
        $validasi=$request->validate([
            'nama_barang' => 'required',
            'category_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'user_id'=>'required'
        ]);
        try {
            $response = Barang::create($validasi);
            return response()->json([
                'kode'=>1,
                'pesan'=>'Data Tersedia',
                'data'=>$response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'errors'=>$e->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $validasi=$request->validate([
            'nama_barang' => 'required',
            'category_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'user_id'=>'required'
        ]);
        try {
            $response = Barang::find($id);
            $response->update($validasi);
            return response()->json([
                'kode'=>1,
                'pesan'=>'Data Tersedia',
                'data'=>$response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'errors'=>$e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try{
        $barang=Barang::find($id);
        $barang->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Success'
        ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Err',
                'errors'=>$e->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $data=Barang::find($id);
        return response()->json($data);
    }

} 

