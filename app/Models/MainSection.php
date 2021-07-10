<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MainSection
 *
 * @property int $main_id
 * @property string $main_name
 * @property int $medl_id
 * @property bool $state
 * @property int $fakeId
 *
 * @property MediaLibrary $media_library
 * @property Collection|SubSection[] $sub_sections
 *
 * @package App\Models
 */
class MainSection extends Model
{
    use HasFactory;

    protected $table = 'main_sections';
	protected $primaryKey = 'main_id';
	public $timestamps = false;

	protected $casts = [
		'medl_id' => 'int',
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'main_name',
		'medl_id',
		'state',
		'fakeId'
	];

	public function media_library()
	{
		return $this->belongsTo(MediaLibrary::class, 'medl_id');
	}

	public function sub_sections()
	{
		return $this->hasMany(SubSection::class, 'main_id');
	}
}
