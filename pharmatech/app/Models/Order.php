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

    
      //******************** hidden ***************** */
      protected $hidden = ['created_at','updated_at','pivot' ];
      //******************************** */


    // public function  drugs() {
    //     return $this->belongsToMany(Drug::class);
    // }


 //*************** rel bet Drug & order ************************* */
 public function drugs() {
    return $this->belongsToMany(Drug::class,'order_drugs','order_id','drug_id','id','id');
}




//******************  rel 1:m bet user & order ****************** */
public function  user() {
  return $this->belongsTo(User::class);
}



}
