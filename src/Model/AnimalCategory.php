<?php

namespace App\Model;
use App\Model\Animal;
use App\Model\Category;


use Illuminate\Database\Eloquent\Model as Eloquent;

class AnimalCategory extends Eloquent
{
	protected $table = 'animal_category';
	protected $guarded = [];
	public $timestamps = false;

	public function animal()
	{
		return $this->belongsTo(Animal::class, 'animal_id');
	}

	public function category()
	{
		return $this->belongsTo(Category::class, 'category_id');
	}
}
