<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NotifiSendTo
 *
 * @property string $notifi_id
 * @property string $cla_id
 * @property int|null $fakeID
 *
 * @property Notification $notification
 * @property Client $client
 *
 * @package App\Models
 */
class NotifiSendTo extends Model
{
	protected $table = 'notifi_send_to';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeID' => 'int'
	];

	protected $fillable = [
		'fakeID'
	];

	public function notification()
	{
		return $this->belongsTo(Notification::class, 'notifi_id');
	}

	public function client()
	{
		return $this->belongsTo(Client::class, 'cla_id');
	}
}
