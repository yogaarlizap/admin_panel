<?php

namespace App\Models\Product;

use App\Models\Category\Category;
use App\Models\PenjualanDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $tabel = 'products';
    protected $primaryKey = 'id';

    public function kategori(){
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function pesanan_detail(){
        return $this->hasMany(PenjualanDetail::class, 'id');
    }
}
