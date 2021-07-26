<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * 
 * @property int $per_id
 * @property string $per_name
 * @property int $fakeId
 * 
 * @property Collection|PosInclude[] $pos_includes
 *
 * @package App\Models
 */
class Permission extends Model
{
	protected $table = 'permission';
	protected $primaryKey = 'per_id';
	public $timestamps = false;

	protected $casts = [
		'fakeId' => 'int'
	];

	protected $fillable = [
		'per_name',
		'fakeId'
	];

	public function pos_includes()
	{
		return $this->hasMany(PosInclude::class, 'per_id');
	}
}
