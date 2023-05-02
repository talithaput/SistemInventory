<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $fillable =['user_id','barang_id', 'jumlah', 'total', 'created_at'];

    public function user()
    {
        return $this->belongsTo( User::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    
}
