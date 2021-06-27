<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Stage
 *
 * @property string $stage_name
 * @property int|null $fakeID
 *
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Stage extends Model
{
	protected $table = 'stage';
	protected $primaryKey = 'stage_name';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeID' => 'int'
	];

	protected $fillable = [
	    'stage_name',
		'fakeID'
	];

	public function orders()
	{
		return $this->hasMany(Order::class, 'stage_name');
	}
}
