<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCombo extends Model
{
    use HasFactory;
    protected $primaryKey = 'ComboId';
    protected $fillable = ['ComboId','ComboName','ComboDescription','ComboPrice','IsActive'];


}
