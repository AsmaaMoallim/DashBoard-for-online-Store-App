<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BankTransaction
 *
 * @property string $trans_id
 * @property string $ord_id
 * @property string $cla_id
 * @property string $sys_bank_id
 * @property float $banktran_amount
 * @property boolean $banktran_img
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
    use HasFactory;
	protected $table = 'bank_transaction';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'banktran_amount' => 'float',
		'banktran_img' => 'boolean',
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
