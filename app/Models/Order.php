<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property int $ord_id
 * @property int $cla_id
 * @property string $ord_number
 * @property Carbon $ord_date
 * @property int $payment_method_id
 * @property int $stage_id
 * @property int $ship_id
 * @property bool $state
 * @property int $fakeId
 *
 * @property ShippingCharge $shipping_charge
 * @property Client $client
 * @property PaymentMethod $payment_method
 * @property Stage $stage
 * @property Collection|BankTransaction[] $bank_transactions
 * @property Collection|OrdHasItemOf[] $ord_has_item_ofs
 *
 * @package App\Models
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
	protected $primaryKey = 'ord_id';
	public $timestamps = false;

	protected $casts = [
		'cla_id' => 'int',
		'payment_method_id' => 'int',
		'stage_id' => 'int',
		'ship_id' => 'int',
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $dates = [
		'ord_date'
	];

	protected $fillable = [
		'cla_id',
		'ord_number',
		'ord_date',
		'payment_method_id',
		'stage_id',
		'ship_id',
		'state',
		'fakeId'
	];

	public function shipping_charge()
	{
		return $this->belongsTo(ShippingCharge::class, 'ship_id');
	}

	public function client()
	{
		return $this->belongsTo(Client::class, 'cla_id');
	}

	public function payment_method()
	{
		return $this->belongsTo(PaymentMethod::class);
	}

	public function stage()
	{
		return $this->belongsTo(Stage::class);
	}

	public function bank_transactions()
	{
		return $this->hasMany(BankTransaction::class, 'ord_id');
	}

	public function ord_has_item_ofs()
	{
		return $this->hasMany(OrdHasItemOf::class, 'ord_id');
	}
}
