<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDrug extends Model
{
    use HasFactory;


    protected $fillable = [
    'drug_id',
    'cart_id',
    'drug_quantity'
    ];
}
