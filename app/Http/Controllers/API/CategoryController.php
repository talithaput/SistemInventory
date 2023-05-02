<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
    public function index()
    {
        $data=Category::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validasi=$request->validate([
            'nama_kategori' => 'required'
        ]);
        try {
            $response = Category::create($validasi);
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
        $category=Category::find($id);
        $category->delete();
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
        $data=Category::find($id);
        return response()->json($data);
    }
}
