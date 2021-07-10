<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubSection
 *
 * @property int $sub_id
 * @property string $sub_name
 * @property int $main_id
 * @property int $medl_id
 * @property bool $state
 * @property int $fakeId
 *
 * @property MainSection $main_section
 * @property MediaLibrary $media_library
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class SubSection extends Model
{
    use HasFactory;

    protected $table = 'sub_section';
	protected $primaryKey = 'sub_id';
	public $timestamps = false;

	protected $casts = [
		'main_id' => 'int',
		'medl_id' => 'int',
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'sub_name',
		'main_id',
		'medl_id',
		'state',
		'fakeId'
	];

	public function main_section()
	{
		return $this->belongsTo(MainSection::class, 'main_id');
	}

	public function media_library()
	{
		return $this->belongsTo(MediaLibrary::class, 'medl_id');
	}

	public function products()
	{
		return $this->hasMany(Product::class, 'sub_id');
	}
}
