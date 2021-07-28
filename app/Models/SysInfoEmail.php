<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SysInfoEmail
 *
 * @property int $sys_email_id
 * @property string $sys_email
 * @property bool $state
 * @property int $fakeId
 *
 * @property EmailBox $email_box
 *
 * @package App\Models
 */
class SysInfoEmail extends Model
{
    use HasFactory;

    protected $table = 'sys_info_email';
	protected $primaryKey = 'sys_email_id';
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'sys_email',
		'state',
		'fakeId'
	];

	public function email_box()
	{
		return $this->hasOne(EmailBox::class, 'sys_email_id');
	}
}
