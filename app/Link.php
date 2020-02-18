<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $guarded = [];

    public function getRouteKeyName(){
    	return 'hash';
	}

	// public function getRouteKey(){
 //    	return $this->hash;
	// }
}
