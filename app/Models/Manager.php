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
 * @property string $man_id
 * @property string $man_frist_name
 * @property string $man_last_name
 * @property string $man_phone_num
 * @property string $man_email
 * @property string $man_password
 * @property string $pos_name
 * @property bool $state
 * @property int|null $fakeID
 *
 * @property Position $position
 * @property ManagerOperationsRecord $manager_operations_record
 * @property Collection|Notification[] $notifications
 *
 * @package App\Models
 */
class Manager extends Model
{
    use HasFactory;
	protected $table = 'manager';
	protected $primaryKey = 'man_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeID' => 'int'
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
		'pos_name',
		'state',
		'fakeID'
	];

	public function position()
	{
		return $this->belongsTo(Position::class, 'pos_name');
	}

	public function manager_operations_record()
	{
		return $this->hasOne(ManagerOperationsRecord::class, 'man_id');
	}

	public function notifications()
	{
		return $this->hasMany(Notification::class, 'man_id');
	}
}
