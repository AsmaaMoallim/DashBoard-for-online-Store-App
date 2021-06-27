<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BankTransaction
 * 
 * @property string $ord_number
 * @property string $cla_id
 * @property string $sys_bank_account_num
 * @property float $banktran_amount
 * @property boolean $banktran_img
 * @property int|null $fakeID
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
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'banktran_amount' => 'float',
		'banktran_img' => 'boolean',
		'fakeID' => 'int'
	];

	protected $fillable = [
		'banktran_amount',
		'banktran_img',
		'fakeID'
	];

	public function sys_bank_account()
	{
		return $this->belongsTo(SysBankAccount::class, 'sys_bank_account_num');
	}

	public function client()
	{
		return $this->belongsTo(Client::class, 'cla_id');
	}

	public function order()
	{
		return $this->belongsTo(Order::class, 'ord_number');
	}
}
