<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property string $cla_id
 * @property string $ord_number
 * @property Carbon $ord_date
 * @property string $pay_method_name
 * @property string $stage_name
 * @property bool $state
 * @property int|null $fakeID
 * 
 * @property Client $client
 * @property PaymentMethod $payment_method
 * @property Stage $stage
 * @property Collection|BankTransaction[] $bank_transactions
 * @property Collection|OrdHasItemOf[] $ord_has_item_ofs
 * @property ShippingCharge $shipping_charge
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'ord_number';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeID' => 'int'
	];

	protected $dates = [
		'ord_date'
	];

	protected $fillable = [
		'cla_id',
		'ord_date',
		'pay_method_name',
		'stage_name',
		'state',
		'fakeID'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'cla_id');
	}

	public function payment_method()
	{
		return $this->belongsTo(PaymentMethod::class, 'pay_method_name');
	}

	public function stage()
	{
		return $this->belongsTo(Stage::class, 'stage_name');
	}

	public function bank_transactions()
	{
		return $this->hasMany(BankTransaction::class, 'ord_number');
	}

	public function ord_has_item_ofs()
	{
		return $this->hasMany(OrdHasItemOf::class, 'ord_number');
	}

	public function shipping_charge()
	{
		return $this->hasOne(ShippingCharge::class, 'ord_number');
	}
}
