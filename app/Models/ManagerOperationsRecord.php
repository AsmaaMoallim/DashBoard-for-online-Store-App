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
 * @property string $man_oper_record_id
 * @property string $man_id
 * @property Carbon $man_oper_date
 * @property Carbon $man_oper_time
 * @property string $man_operation
 * @property int $fakeId
 * 
 * @property Manager $manager
 *
 * @package App\Models
 */
class ManagerOperationsRecord extends Model
{
	protected $table = 'manager_operations_record';
	protected $primaryKey = 'man_oper_record_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeId' => 'int'
	];

	protected $dates = [
		'man_oper_date',
		'man_oper_time'
	];

	protected $fillable = [
		'man_id',
		'man_oper_date',
		'man_oper_time',
		'man_operation',
		'fakeId'
	];

	public function manager()
	{
		return $this->belongsTo(Manager::class, 'man_id');
	}
}
