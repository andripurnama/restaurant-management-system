<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use HasFactory,SoftDeletes;
    protected $primaryKey = 'POId';
    protected $fillable = ['SupplierId','RestaurantId','CreatedBy','OrderDate','OrderTime','DeliveryDate','ApprovedBy'];
}
