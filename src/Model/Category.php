<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Category extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'category';

	protected $guarded = [];
	public $timestamps = false;
}
