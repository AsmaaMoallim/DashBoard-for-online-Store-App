<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 *
 * @property string $per_id
 * @property string $per_name
 * @property int $fakeId
 * @property bool $state
 *
 * @property Collection|PosInclude[] $pos_includes
 *
 * @package App\Models
 */
class Permission extends Model
{
    use HasFactory;

    protected $table = 'permission';
	protected $primaryKey = 'per_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeId' => 'int',
		'state' => 'bool'
	];

	protected $fillable = [
		'per_name',
		'fakeId',
		'state'
	];

    public function pos_includes()
    {
		return $this->hasMany(PosInclude::class, 'per_id');
	}
}
