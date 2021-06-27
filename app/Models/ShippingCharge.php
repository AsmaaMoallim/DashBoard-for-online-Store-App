<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShippingCharge
 * 
 * @property string $ord_number
 * @property int $ship_price
 * @property int|null $fakeID
 * 
 * @property Order $order
 *
 * @package App\Models
 */
class ShippingCharge extends Model
{
	protected $table = 'shipping_charge';
	protected $primaryKey = 'ord_number';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ship_price' => 'int',
		'fakeID' => 'int'
	];

	protected $fillable = [
		'ship_price',
		'fakeID'
	];

	public function order()
	{
		return $this->belongsTo(Order::class, 'ord_number');
	}
}
