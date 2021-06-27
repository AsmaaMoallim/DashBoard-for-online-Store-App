<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MainSection
 *
 * @property string $main_name
 * @property string $medl_id
 * @property bool $state
 * @property int|null $fakeID
 *
 * @property MediaIbrary $media_ibrary
 * @property Collection|SubSection[] $sub_sections
 *
 * @package App\Models
 */
class MainSection extends Model
{
	protected $table = 'main_sections';
	protected $primaryKey = 'main_name';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeID' => 'int'
	];

	protected $fillable = [
	    'main_name',
		'medl_id',
		'state',
		'fakeID'
	];

	public function media_ibrary()
	{
		return $this->belongsTo(MediaIbrary::class, 'medl_id');
	}

	public function sub_sections()
	{
		return $this->hasMany(SubSection::class, 'main_name');
	}
}
