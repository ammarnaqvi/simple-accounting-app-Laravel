<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'first_name', 'last_name', 'phone', 'address'];

     /**
     * Get the account record associated with the user.
     */
    public function account()
    {
        return $this->hasOne('App\Account');
    }

}
