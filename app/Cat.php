<?php

namespace laressentials;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model {
	// list of fields that Laravel can fill by mass assignment (a wau to assign attributes to a model)
	protected $fillable = ['name', 'date_of_birth', 'breed_id'];
	// this model have a belongsTo relationship with the Breed model
	public function breed() {
		return $this->belongsTo('Furbook\Breed');
	}
}