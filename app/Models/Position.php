<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Position
 *
 * @property int $pos_id
 * @property string $pos_name
 * @property int $fakeId
 * @property bool $state
 *
 * @property Collection|Manager[] $managers
 * @property Collection|PosInclude[] $pos_includes
 *
 * @package App\Models
 */
class Position extends Model
{
    use HasFactory;

    protected $table = 'position';
	protected $primaryKey = 'pos_id';
	public $timestamps = false;

	protected $casts = [
		'fakeId' => 'int',
		'state' => 'bool'
	];

	protected $fillable = [
		'pos_name',
		'fakeId',
		'state'
	];

	public function managers()
	{
		return $this->hasMany(Manager::class, 'pos_id');
	}

	public function pos_includes()
	{
		return $this->hasMany(PosInclude::class, 'pos_id');
	}
}
