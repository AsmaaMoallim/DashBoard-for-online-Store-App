<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Measure
 *
 * @property string $mesu_value
 * @property int|null $fakeID
 *
 * @property Collection|ProdAvilIn[] $prod_avil_ins
 *
 * @package App\Models
 */
class Measure extends Model
{

	protected $table = 'measure';
	protected $primaryKey = 'mesu_value';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeID' => 'int'
	];

	protected $fillable = [
	    'mesu_value',
		'fakeID'
	];

	public function prod_avil_ins()
	{
		return $this->hasMany(ProdAvilIn::class, 'mesu_value');
	}
}
