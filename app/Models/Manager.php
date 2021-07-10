<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Manager
 *
 * @property int $man_id
 * @property string $man_frist_name
 * @property string $man_last_name
 * @property string $man_phone_num
 * @property string $man_email
 * @property string $man_password
 * @property int $pos_id
 * @property bool $state
 * @property int $fakeId
 *
 * @property Position $position
 * @property Collection|ManagerOperationsRecord[] $manager_operations_records
 * @property Collection|Notification[] $notifications
 *
 * @package App\Models
 */
class Manager extends Model
{
    use HasFactory;

    protected $table = 'manager';
	protected $primaryKey = 'man_id';
	public $timestamps = false;

	protected $casts = [
		'pos_id' => 'int',
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $hidden = [
		'man_password'
	];

	protected $fillable = [
		'man_frist_name',
		'man_last_name',
		'man_phone_num',
		'man_email',
		'man_password',
		'pos_id',
		'state',
		'fakeId'
	];

	public function position()
	{
		return $this->belongsTo(Position::class, 'pos_id');
	}

	public function manager_operations_records()
	{
		return $this->hasMany(ManagerOperationsRecord::class, 'man_id');
	}

	public function notifications()
	{
		return $this->hasMany(Notification::class, 'man_id');
	}
}
