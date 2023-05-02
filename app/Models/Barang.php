<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Barang extends Model
{
    use HasFactory;

    protected $fillable =['user_id','category_id', 'nama_barang', 'harga', 'stok'];


    public function user()
    {
        return $this->belongsTo( User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barang_keluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}