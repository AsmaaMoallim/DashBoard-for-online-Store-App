<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductProdAvilColor
 *
 * @property string $prod_avil_color
 * @property string $prod_id
 * @property int|null $fakeID
 *
 * @property Product $product
 *
 * @package App\Models
 */
class ProductProdAvilColor extends Model
{
	protected $table = 'product_prod_avil_color';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeID' => 'int'
	];

	protected $fillable = [
		'fakeID'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'prod_id');
	}
}
