<?php

namespace App\Models;
use App\Models\Drug;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'user_id'
    ];

    public function  user() {
        return $this->belongsTo(User::class);
    }

          //*************** rel bet Drug & cart ************************* */
    public function  drugs() {
        // return $this->belongsToMany(Drug::class, 'cart_drugs', 'drug_id', 'cart_id','id','id');


        // return $this->belongsToMany(Drug::class, 'cart_drugs', 'cart_id','drug_id','id','id');


//, 'cart_id','drug_id','id','id'

       //******try add drug_quantity*****
        return $this->belongsToMany(Drug::class, 'cart_drug')->withPivot('drug_quantity');
}
}