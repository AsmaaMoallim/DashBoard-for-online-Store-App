<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Stage
 *
 * @property string $stage_id
 * @property string $stage_name
 * @property int $fakeId
 *
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Stage extends Model
{
    use HasFactory;

    protected $table = 'stage';
	protected $primaryKey = 'stage_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeId' => 'int'
	];

	protected $fillable = [
		'stage_name',
		'fakeId'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
