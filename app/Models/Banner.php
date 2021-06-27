<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Banner
 * 
 * @property string $ban_id
 * @property string $ban_name
 * @property string $medl_id
 * @property bool $state
 * @property int|null $fakeID
 * 
 * @property MediaIbrary $media_ibrary
 *
 * @package App\Models
 */
class Banner extends Model
{
	protected $table = 'banner';
	protected $primaryKey = 'ban_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeID' => 'int'
	];

	protected $fillable = [
		'ban_name',
		'medl_id',
		'state',
		'fakeID'
	];

	public function media_ibrary()
	{
		return $this->belongsTo(MediaIbrary::class, 'medl_id');
	}
}
