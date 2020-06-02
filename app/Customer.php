<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	public function routes() {
		return $this->hasOne('App\Route', 'id', 'route_id');
	}
}
