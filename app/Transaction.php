<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['account_id', 'type'];
    /**
     * type = 0 = debit
     * type = 1 = credit
 	 */

	/**
     * Get the account that owns the transaction.
     */
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}
