<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaymentMethod
 *
 * @property int $payment_method_id
 * @property string $pay_method_name
 * @property int $fakeId
 *
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class PaymentMethod extends Model
{

    use HasFactory;

    protected $table = 'payment_method';
	protected $primaryKey = 'payment_method_id';
	public $timestamps = false;

	protected $casts = [
		'fakeId' => 'int'
	];

	protected $fillable = [
		'pay_method_name',
		'fakeId'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
