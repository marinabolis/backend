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
        'user_id',
       
    ];

    
      //******************** hidden ***************** */
     
      //******************************** */


    // public function  drugs() {
    //     return $this->belongsToMany(Drug::class);
    // }


 //*************** rel bet Drug & order ************************* */
 public function drugs() {
    return $this->belongsToMany(Drug::class,'order_drugs')->withPivot('drug_quantity');
}




//******************  rel 1:m bet user & order ****************** */
public function  user() {
  return $this->belongsTo(User::class);
}

// public function  drugs() {
//   // return $this->belongsToMany(Drug::class, 'cart_drugs', 'drug_id', 'cart_id','id','id');


//   // return $this->belongsToMany(Drug::class, 'cart_drugs', 'cart_id','drug_id','id','id');


// //, 'cart_id','drug_id','id','id'

//  //******try add drug_quantity*****
//   return $this->belongsToMany(Drug::class, 'cart_drugs')->withPivot('drug_quantity');
// }

// }
}