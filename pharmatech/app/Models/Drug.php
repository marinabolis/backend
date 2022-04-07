<?php

namespace App\Models;

use App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
 

    public $timestamps = false;

    protected $fillable = [
        'trade_name_ar',
        'trade_name_en',
        'price',
        'description',
        'image',
        'production_date',
        'expiry_date',
        'category_id'
    ];
    



    

    public function category() {
        return $this->belongsTo(Category::class);
    }



    //*************** rel bet Drug & order ************************* */
    public function orders() {
        return $this->belongsToMany(Order::class,'drug_order','drug_id','order_id','id','id');
    }


      //*************** rel bet Drug & cart ************************* */
      public function carts() {
        return $this->belongsToMany(Cart::class);
    }
}
