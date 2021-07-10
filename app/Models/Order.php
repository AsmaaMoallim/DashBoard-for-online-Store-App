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
 * @property bool $state
 * @property int $fakeId
 *
 * @property Client $client
 * @property PaymentMethod $payment_method
 * @property Stage $stage
 * @property Collection|BankTransaction[] $bank_transactions
 * @property Collection|OrdHasItemOf[] $ord_has_item_ofs
 * @property Collection|ShippingCharge[] $shipping_charges
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
		'state',
		'fakeId'
	];

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

	public function shipping_charges()
	{
		return $this->hasMany(ShippingCharge::class, 'ord_id');
	}
}
