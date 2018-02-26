<?php

namespace LarEssentials\Http\Views\Composers;

use LarEssentials\Breed;
use Illuminate\Contracts\View\View;

class CatFormComposer {
	protected $breeds;
	public function __construct(Breed $breeds) {
		$this->breeds = $breeds;
	}
	public function compose(View $view) {
		$view->with('breeds', $this->breeds->lists('name', 'id');
	}
}