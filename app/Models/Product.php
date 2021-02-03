<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function catalog()
    {
        return $this->hasOne(Catalog::class,'id','catalog_id')->select(['name','id'])->withTrashed();
    }

    protected $fillable = [
        'name',
        'description',
        'price',
        'catalog_id',
    ];
}
