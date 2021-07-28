<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Measure
 *
 * @property int $mesu_id
 * @property string $mesu_value
 * @property int $fakeId
 *
 * @property Collection|ProdAvilIn[] $prod_avil_ins
 *
 * @package App\Models
 */
class Measure extends Model
{
    use HasFactory;
	protected $table = 'measure';
	protected $primaryKey = 'mesu_id';
	public $timestamps = false;

	protected $casts = [
		'fakeId' => 'int'
	];

	protected $fillable = [
		'mesu_value',
		'fakeId'
	];

	public function prod_avil_ins()
	{
		return $this->hasMany(ProdAvilIn::class, 'mesu_id');
	}
}
