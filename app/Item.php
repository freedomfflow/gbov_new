<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'description', 'sku', 'image_path', 'taxable',
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function orders()
	{
		return $this->belongsToMany('App\Order')->withTimestamps();
	}
}
