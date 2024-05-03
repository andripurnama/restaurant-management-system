<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['VariantId','ProductId','VariantName','sku'];

    public function product()
    {
        return $this->belongsTo(MasterProduct::class,'ProductId','ProductId');
    }
}
