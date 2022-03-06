<?php

namespace App\Models;
use App\Models\Drug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_cost',
        'shipping_address',
        'status',
        'user_id'
    ];

    public function  drugs() {
        return $this->belongsToMany(Drug::class);
    }
}
