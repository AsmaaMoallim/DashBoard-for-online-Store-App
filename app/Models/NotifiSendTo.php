<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class NotifiSendTo
 *
 * @property int $notifi_id
 * @property int $cla_id
 * @property int $fakeId
 *
 * @property Notification $notification
 * @property Client $client
 *
 * @package App\Models
 */
class NotifiSendTo extends Model
{
    use HasFactory;

    protected $table = 'notifi_send_to';
	public $timestamps = false;

	protected $casts = [
		'cla_id' => 'int',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'fakeId'
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
