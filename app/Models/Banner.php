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
 * @property int $ban_id
 * @property string $ban_name
 * @property int $medl_id
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
	public $timestamps = false;

	protected $casts = [
		'medl_id' => 'int',
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
