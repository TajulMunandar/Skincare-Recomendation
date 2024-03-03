<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasalahKulit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Product()
    {
        return $this->hasMany(Product::class);
    }
}
