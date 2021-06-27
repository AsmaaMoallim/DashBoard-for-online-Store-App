<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PosInclude
 *
 * @property string $pos_name
 * @property string $per_name
 * @property int|null $fakeID
 *
 * @property Position $position
 * @property Permission $permission
 *
 * @package App\Models
 */
class PosInclude extends Model
{
	protected $table = 'pos_include';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeID' => 'int'
	];

	protected $fillable = [
		'fakeID'
	];

	public function position()
	{
		return $this->belongsTo(Position::class, 'pos_name');
	}

	public function permission()
	{
		return $this->belongsTo(Permission::class, 'per_name');
	}
}
