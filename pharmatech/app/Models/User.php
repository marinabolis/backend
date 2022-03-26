<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
// use App\Models\HasFactory;
// use App\Models\Drug;
// use App\Models\Cart;


class User  extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'city',
        'street',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];





    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }





// relation between tables

public function drugs() {
    return $this->belongsToMany(Drug::class);
}

public function cart() {

    // return $this->belongsTo(Cart::class);

    return $this->hasOne(Cart::class,'user_id');    // ** check write or not 
    
}




//*************** rel bet user & Order    1:m ************************* */
public function  orders() {
    return $this->hasMany(Order::class);
  }
  



//******************  ************************ */
  public function drugsOwner()
{
return $this->hasManyThrough(Drug::class, Order::class);
} 

}
