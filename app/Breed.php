<?php

namespace laressentials;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model {
		// we disable created_at and updated_at timestamp field in the database
		public $timestamps = false;
		// The breed model is defined with the inverse hasMany relationship
		public function cats() {
			return $this->hasMany('laressentials\Cat');
		}
	// Para la base de datos:
	// php artisan make:migration create_breeds_table --create=breeds
	}
}
