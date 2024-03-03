<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand');
    }

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function MasalahKulit()
    {
        return $this->belongsTo(MasalahKulit::class, 'id_masalah_kulit');
    }

    public function TypeKulit()
    {
        return $this->belongsTo(TypeKulit::class, 'id_type_kulit');
    }
}
