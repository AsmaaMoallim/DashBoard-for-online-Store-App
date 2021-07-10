<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ManagerOperationsRecord
 *
 * @property int $man_oper_record_id
 * @property int $man_id
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
    use HasFactory;

    protected $table = 'manager_operations_record';
	protected $primaryKey = 'man_oper_record_id';
	public $timestamps = false;

	protected $casts = [
		'man_id' => 'int',
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
