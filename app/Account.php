<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id', 'type', 'balance'];
    /**
     * type = 0 = current
     * type = 1 = saving
 	 */

    /**
     * Get the customer that owns the account.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Get the transactions for the account.
     */
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

}
