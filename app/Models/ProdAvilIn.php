<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProdAvilIn
 *
 * @property string $prod_id
 * @property string $mesu_id
 * @property int $fakeId
 *
 * @property Product $product
 * @property Measure $measure
 *
 * @package App\Models
 */
class ProdAvilIn extends Model
{
    use HasFactory;
	protected $table = 'prod_avil_in';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeId' => 'int'
	];

	protected $fillable = [
		'fakeId'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'prod_id');
	}

	public function measure()
	{
		return $this->belongsTo(Measure::class, 'mesu_id');
	}
}
