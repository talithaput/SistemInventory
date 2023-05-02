<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table="categories";
    protected $primaryKey="id";
    protected $fillable=[
        'id','nama_kategori'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }

    public function allData()
    {
        return DB::table('categories')->get();
    }
}
