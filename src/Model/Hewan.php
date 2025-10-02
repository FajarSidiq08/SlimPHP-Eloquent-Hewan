<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Hewan extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'hewan';

	protected $guarded = [];
}
