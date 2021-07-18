<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PosInclude
 *
 * @property int $pos_id
 * @property int $per_id
 * @property int $fakeId
 *
 * @property Position $position
 * @property Permission $permission
 *
 * @package App\Models
 */
class PosInclude extends Model
{
    use HasFactory;

    protected $table = 'pos_include';
	public $timestamps = false;

	protected $casts = [
		'per_id' => 'int',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'fakeId'
	];

	public function position()
	{
		return $this->belongsTo(Position::class, 'pos_id');
	}

	public function permission()
	{
		return $this->belongsTo(Permission::class, 'per_id');
	}
}
