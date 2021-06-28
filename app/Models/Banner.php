<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Banner
 *
 * @property string $ban_id
 * @property string $ban_name
 * @property string $medl_id
 * @property bool $state
 * @property int $fakeId
 *
 * @property MediaLibrary $media_library
 *
 * @package App\Models
 */
class Banner extends Model
{
    use HasFactory;
	protected $table = 'banner';
	protected $primaryKey = 'ban_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'ban_name',
		'medl_id',
		'state',
		'fakeId'
	];

	public function media_library()
	{
		return $this->belongsTo(MediaLibrary::class, 'medl_id');
	}
}
