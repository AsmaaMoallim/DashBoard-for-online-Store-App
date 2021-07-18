<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ShippingCharge
 *
 * @property int $ship_id
 * @property int $ship_price
 * @property int $fakeId
 *
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class ShippingCharge extends Model
{
    use HasFactory;

    protected $table = 'shipping_charge';
	protected $primaryKey = 'ship_id';
	public $timestamps = false;

	protected $casts = [
		'ship_price' => 'int',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'ship_price',
		'fakeId'
	];

	public function orders()
	{
		return $this->hasMany(Order::class, 'ship_id');
	}
}
