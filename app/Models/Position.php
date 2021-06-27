<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Posi tion
 *
 * @property string $pos_name
 * @property bool $state
 * @property int|null $fakeID
 *
 * @property Collection|Manager[] $managers
 * @property Collection|PosInclude[] $pos_includes
 *
 * @package App\Models
 */
class Position extends Model
{    use HasFactory;

    protected $table = 'position';
	protected $primaryKey = 'pos_name';
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

	public function managers()
	{
		return $this->hasMany(Manager::class, 'pos_name');
	}

	public function pos_includes()
	{
		return $this->hasMany(PosInclude::class, 'pos_name');
	}
}
