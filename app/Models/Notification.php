<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 *
 * @property string $notifi_id
 * @property string $notifi_title
 * @property string $notifi_content
 * @property string $man_id
 * @property int|null $fakeID
 *
 * @property Manager $manager
 * @property Collection|NotifiSendTo[] $notifi_send_tos
 *
 * @package App\Models
 */
class Notification extends Model
{
	protected $table = 'notifications';
	protected $primaryKey = 'notifi_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeID' => 'int'
	];

	protected $fillable = [
	    'notifi_id',
		'notifi_title',
		'notifi_content',
		'man_id',
		'fakeID'
	];

	public function manager()
	{
		return $this->belongsTo(Manager::class, 'man_id');
	}

	public function notifi_send_tos()
	{
		return $this->hasMany(NotifiSendTo::class, 'notifi_id');
	}
}
