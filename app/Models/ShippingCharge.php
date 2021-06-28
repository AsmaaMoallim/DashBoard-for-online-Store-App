<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShippingCharge
 * 
 * @property string $ship_id
 * @property string $ord_id
 * @property int $ship_price
 * @property int $fakeId
 * 
 * @property Order $order
 *
 * @package App\Models
 */
class ShippingCharge extends Model
{
	protected $table = 'shipping_charge';
	protected $primaryKey = 'ship_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ship_price' => 'int',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'ord_id',
		'ship_price',
		'fakeId'
	];

	public function order()
	{
		return $this->belongsTo(Order::class, 'ord_id');
	}
}
