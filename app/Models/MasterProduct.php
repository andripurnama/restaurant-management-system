<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterProduct extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['ProductId','ProductName','ProductCategory','SellingPrice'];
    protected $primaryKey = 'ProductId';
    public function ProductVariant()
    {
        return $this->hasMany(ProductVariant::class,'ProductId','ProductId');
    }
}
