<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SysInfoPhone
 *
 * @property string $sys_phone_id
 * @property string $sys_phone_num
 * @property bool $state
 * @property int $fakeId
 *
 * @package App\Models
 */
class SysInfoPhone extends Model
{
    use HasFactory;
	protected $table = 'sys_info_phone';
	protected $primaryKey = 'sys_phone_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'sys_phone_num',
		'state',
		'fakeId'
	];
}
