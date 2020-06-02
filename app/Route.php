<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
	public function customers() {
		return $this->hasMany(Customer::class, 'route_id', 'id');
	}
}
