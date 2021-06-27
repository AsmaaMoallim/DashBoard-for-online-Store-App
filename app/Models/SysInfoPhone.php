<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SysInfoPhone
 *
 * @property string $sys_phone_num
 * @property bool $state
 * @property int|null $fakeID
 *
 * @package App\Models
 */
class SysInfoPhone extends Model
{
	protected $table = 'sys_info_phone';
	protected $primaryKey = 'sys_phone_num';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeID' => 'int'
	];

	protected $fillable = [
	    'sys_phone_num',
		'state',
		'fakeID'
	];
}
