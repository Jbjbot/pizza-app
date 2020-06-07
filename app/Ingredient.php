<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
	protected $fillable = [
		'name', 'price'
	];

	
	public function pizza()
	{
		return $this->belongsToMany('App\Pizza');
	}

}
