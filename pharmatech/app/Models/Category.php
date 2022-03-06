<?php

namespace App\Models;

use App\Models\Drug;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function  drugs() {
        return $this->hasMany(Drug::class);
    }
}
