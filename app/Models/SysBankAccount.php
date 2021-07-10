<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SysBankAccount
 *
 * @property int $sys_bank_id
 * @property string $sys_bank_name
 * @property string $sys_bank_account_num
 * @property bool $state
 * @property int $fakeId
 *
 * @property Collection|BankTransaction[] $bank_transactions
 *
 * @package App\Models
 */
class SysBankAccount extends Model
{
    use HasFactory;

    protected $table = 'sys_bank_account';
	protected $primaryKey = 'sys_bank_id';
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'sys_bank_name',
		'sys_bank_account_num',
		'state',
		'fakeId'
	];

	public function bank_transactions()
	{
		return $this->hasMany(BankTransaction::class, 'sys_bank_id');
	}
}
