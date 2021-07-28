<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmailBox
 *
 * @property int $sys_email_id
 * @property string $email_cla_name
 * @property string $email_cla_email
 * @property string $email_cla_phone
 * @property string $email_type
 * @property int $fakeId
 *
 * @property SysInfoEmail $sys_info_email
 *
 * @package App\Models
 */
class EmailBox extends Model
{
    use HasFactory;

    protected $table = 'email_box';
	protected $primaryKey = 'sys_email_id';
	public $timestamps = false;

	protected $casts = [
		'fakeId' => 'int'
	];

	protected $fillable = [
		'email_cla_name',
		'email_cla_email',
		'email_cla_phone',
		'email_type',
		'fakeId'
	];

	public function sys_info_email()
	{
		return $this->belongsTo(SysInfoEmail::class, 'sys_email_id');
	}
}
