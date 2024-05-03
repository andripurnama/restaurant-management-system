<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCombo;
use App\Models\ProductVariant;
class ComboDetail extends Model
{
    use HasFactory;
    protected $primaryKey = 'ComboDetailId';
    protected $fillable = ['ComboDetailId','ComboId','VariantId','Quantity'];

    public function ProductCombo()
    {
        return $this->belongsTo(ProductCombo::class,'ComboId','ComboId');
    }

    public function ProductVariant()
    {
        return $this->belongsTo(ProductVariant::class,'VariantId','VariantId');
    }
}
