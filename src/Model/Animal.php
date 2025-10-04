<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Animal extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'animal';

	protected $guarded = [];
	public $timestamps = false;
}
