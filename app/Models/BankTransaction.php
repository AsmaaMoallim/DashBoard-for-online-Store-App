<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BankTransaction
 *
 * @property int $trans_id
 * @property int $ord_id
 * @property int $cla_id
 * @property int $sys_bank_id
 * @property float $banktran_amount
// * @property boolean $banktran_img
 * @property int $fakeId
 *
 * @property SysBankAccount $sys_bank_account
 * @property Client $client
 * @property Order $order
 *
 * @package App\Models
 */
class BankTransaction extends Model
{
	protected $table = 'bank_transaction';
	public $timestamps = false;

	protected $casts = [
		'ord_id' => 'int',
		'cla_id' => 'int',
		'sys_bank_id' => 'int',
		'banktran_amount' => 'float',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'banktran_amount',
		'banktran_img',
		'fakeId'
	];

	public function sys_bank_account()
	{
		return $this->belongsTo(SysBankAccount::class, 'sys_bank_id');
	}

	public function client()
	{
		return $this->belongsTo(Client::class, 'cla_id');
	}

	public function order()
	{
		return $this->belongsTo(Order::class, 'ord_id');
	}
}
