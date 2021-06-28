<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrdHasItemOf
 *
 * @property string $prod_id
 * @property int $prod_ord_amount
 * @property string $ord_id
 * @property int $fakeId
 *
 * @property Order $order
 * @property Product $product
 *
 * @package App\Models
 */
class OrdHasItemOf extends Model
{
    use HasFactory;
	protected $table = 'ord_has_item_of';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'prod_ord_amount' => 'int',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'prod_ord_amount',
		'fakeId'
	];

	public function order()
	{
		return $this->belongsTo(Order::class, 'ord_id');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'prod_id');
	}
}
