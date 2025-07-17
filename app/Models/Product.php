<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tblproducts';

    protected $fillable = [
        'prd_name',
        'prd_description',
        'prd_quantity',
        'prd_price',
    ];
}
