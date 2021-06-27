<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 *
 * @property string $pay_method_name
 * @property int|null $fakeID
 *
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class PaymentMethod extends Model
{
	protected $table = 'payment_method';
	protected $primaryKey = 'pay_method_name';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeID' => 'int'
	];

	protected $fillable = [
	    'pay_method_name',
		'fakeID'
	];

	public function orders()
	{
		return $this->hasMany(Order::class, 'pay_method_name');
	}
}
