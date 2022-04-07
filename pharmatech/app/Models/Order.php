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

    
    

 //*************** rel bet Drug & order ************************* */
 public function drugs() {
    return $this->belongsToMany(Drug::class,'drug_order')->withPivot('drug_quantity');
}




//******************  rel 1:m bet user & order ****************** */
public function  user() {
  return $this->belongsTo(User::class);
}


}