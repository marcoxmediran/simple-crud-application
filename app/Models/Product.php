<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tblproducts';

    protected $primaryKey = 'prd_id';

    protected $fillable = [
        'prd_name',
        'prd_description',
        'prd_quantity',
        'prd_price',
    ];

    public function getRouteKeyName()
    {
        return 'prd_id';
    }
}
