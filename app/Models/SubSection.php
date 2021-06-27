<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubSection
 *
 * @property string $sub_name
 * @property string $main_name
 * @property string $medl_id
 * @property bool $state
 * @property int|null $fakeID
 *
 * @property MainSection $main_section
 * @property MediaIbrary $media_ibrary
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class SubSection extends Model
{
	protected $table = 'sub_section';
	protected $primaryKey = 'sub_name';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeID' => 'int'
	];

	protected $fillable = [
	    'sub_name',
		'main_name',
		'medl_id',
		'state',
		'fakeID'
	];

	public function main_section()
	{
		return $this->belongsTo(MainSection::class, 'main_name');
	}

	public function media_ibrary()
	{
		return $this->belongsTo(MediaIbrary::class, 'medl_id');
	}

	public function products()
	{
		return $this->hasMany(Product::class, 'sub_name');
	}
}
