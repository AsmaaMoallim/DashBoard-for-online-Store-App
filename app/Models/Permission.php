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
 * @property string $per_name
 * @property bool $state
 * @property int|null $fakeID
 *
 * @property Collection|PosInclude[] $pos_includes
 *
 * @package App\Models
 */
class Permission extends Model
{    use HasFactory;

    protected $table = 'permission';
	protected $primaryKey = 'per_name';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeID' => 'int'
	];

	protected $fillable = [
		'state',
		'fakeID'
	];

	public function pos_includes()
	{
		return $this->hasMany(PosInclude::class, 'per_name');
	}
}
