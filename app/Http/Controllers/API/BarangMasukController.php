<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangMasuk;

class BarangMasukController extends Controller
{
    public function index()
    {
        $data=BarangMasuk::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validasi=$request->validate([
            'barang_id' => 'required',
            'unit' => 'required',
            'supplier' => 'required',
            'created_at'=> 'required',
            'user_id'=> 'required'
        ]);
        try {
            $response = BarangMasuk::create($validasi);
            return response()->json([
                'success'=>true,
                'message'=>'success',
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
            'barang_id' => 'required',
            'unit' => 'required',
            'supplier' => 'required',
            'created_at'=> 'required',
            'user_id'=> 'required'
        ]);
        try {
            $response = BarangMasuk::find($id);
            $response->update($validasi);
            return response()->json([
                'success'=>true,
                'message'=>'success',
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
        $barang_masuk=BarangMasuk::find($id);
        $barang_masuk->delete();
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
        $data=BarangMasuk::find($id);
        return response()->json($data);
    }
}
