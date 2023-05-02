<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangKeluar;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $data=BarangKeluar::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validasi=$request->validate([
            'barang_id' => 'required',
            'total' => 'required',
            'jumlah' => 'required',
            'created_at'=> 'required',
            'user_id'=> 'required'
        ]);
        try {
            $response = BarangKeluar::create($validasi);
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
            'total' => 'required',
            'jumlah' => 'required',
            'created_at'=> 'required',
            'user_id'=> 'required'
        ]);
        try {
            $response = BarangKeluar::find($id);
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
        $barang_keluar=BarangKeluar::find($id);
        $barang_keluar->delete();
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
        $data=BarangKeluar::find($id);
        return response()->json($data);
    }
}
