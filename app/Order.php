<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = [
	    'user_id', 'quantity', 'tax', 'shipping_cost', 'coupon_code', 'total_due',
    ];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function users()
	{
		return $this->belongsTo('App\User');
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function items()
	{
		return $this->belongsToMany('App\Item')->withTimestamps()->withPivot('quantity');
	}
}
