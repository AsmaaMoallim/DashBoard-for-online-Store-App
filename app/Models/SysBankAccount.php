<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SysBankAccount
 *
 * @property string $sys_bank_name
 * @property string $sys_bank_account_num
 * @property bool $state
 * @property int|null $fakeID
 *
 * @property Collection|BankTransaction[] $bank_transactions
 *
 * @package App\Models
 */
class SysBankAccount extends Model
{
	protected $table = 'sys_bank_account';
	protected $primaryKey = 'sys_bank_account_num';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeID' => 'int'
	];

	protected $fillable = [
	    'sys_bank_account_num',
		'sys_bank_name',
		'state',
		'fakeID'
	];

	public function bank_transactions()
	{
		return $this->hasMany(BankTransaction::class, 'sys_bank_account_num');
	}
}
