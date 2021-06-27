<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EmailBox
 *
 * @property string $sys_email
 * @property string $email_cla_name
 * @property string $email_cla_email
 * @property string $email_cla_phone
 * @property string $email_type
 * @property int|null $fakeID
 *
 * @property SysInfoEmail $sys_info_email
 *
 * @package App\Models
 */
class EmailBox extends Model
{
	protected $table = 'email_box';
	protected $primaryKey = 'sys_email';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeID' => 'int'
	];

	protected $fillable = [
	    'sys_email',
		'email_cla_name',
		'email_cla_email',
		'email_cla_phone',
		'email_type',
		'fakeID'
	];

	public function sys_info_email()
	{
		return $this->belongsTo(SysInfoEmail::class, 'sys_email');
	}
}
