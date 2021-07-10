<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 *
 * @property int $cla_id
 * @property string $cla_frist_name
 * @property string $cla_last_name
 * @property boolean|null $cla_img
 * @property string $cla_phone_num
 * @property string $cla_email
 * @property bool $state
 * @property int $fakeId
 *
 * @property Collection|BankTransaction[] $bank_transactions
 * @property Collection|Comment[] $comments
 * @property Collection|NotifiSendTo[] $notifi_send_tos
 * @property Collection|Order[] $orders
 * @property Collection|Report[] $reports
 *
 * @package App\Models
 */
class Client extends Model
{

    use HasFactory;

    protected $table = 'clients';
	protected $primaryKey = 'cla_id';
	public $timestamps = false;

	protected $casts = [
		'cla_img' => 'boolean',
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'cla_frist_name',
		'cla_last_name',
		'cla_img',
		'cla_phone_num',
		'cla_email',
		'state',
		'fakeId'
	];

	public function bank_transactions()
	{
		return $this->hasMany(BankTransaction::class, 'cla_id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class, 'cla_id');
	}

	public function notifi_send_tos()
	{
		return $this->hasMany(NotifiSendTo::class, 'cla_id');
	}

	public function orders()
	{
		return $this->hasMany(Order::class, 'cla_id');
	}

	public function reports()
	{
		return $this->hasMany(Report::class, 'cla_id');
	}
}
