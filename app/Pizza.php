<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
	protected $table = 'pizza';

	protected $fillable = [
		'name'
	];

	public function ingredients()
	{
		return $this->belongsToMany('App\Ingredient');
	}

	public function getPrice()
	{
		return $this->ingredients()->sum(Ingredient::raw('price'));
	}

}
