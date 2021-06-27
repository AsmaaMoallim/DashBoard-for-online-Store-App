<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ManagerOperationsRecord
 *
 * @property string $man_id
 * @property Carbon $man_oper_date
 * @property Carbon $man_oper_time
 * @property string $man_operation
 * @property int|null $fakeID
 *
 * @property Manager $manager
 *
 * @package App\Models
 */
class ManagerOperationsRecord extends Model
{
	protected $table = 'manager_operations_record';
	protected $primaryKey = 'man_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeID' => 'int'
	];

	protected $dates = [
		'man_oper_date',
		'man_oper_time'
	];


	protected $fillable = [
		'man_oper_date',
		'man_oper_time',
		'man_operation',
		'fakeID'
	];

	public function manager()
	{
		return $this->belongsTo(Manager::class, 'man_id');
	}
}
