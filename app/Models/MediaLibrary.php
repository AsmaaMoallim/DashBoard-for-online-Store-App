<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Cassandra\Blob;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MongoDB\BSON\Binary;

/**
 * Class MediaLibrary
 *
 * @property int $medl_id
 * @property string $medl_name
 * @property string $medl_description
// * @property binary $medl_img_ved
 * @property bool $state
 * @property int $fakeId
 *
 * @property Collection|Banner[] $banners
 * @property Collection|MainSection[] $main_sections
 * @property Collection|Product[] $products
 * @property Collection|SubSection[] $sub_sections
 *
 * @package App\Models
 */
class MediaLibrary extends Model
{
    use HasFactory;

    protected $table = 'media_library';
	protected $primaryKey = 'medl_id';
	public $timestamps = false;

	protected $casts = [
        'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'medl_name',
		'medl_description',
		'medl_img_ved',
		'state',
		'fakeId'
	];

	public function banners()
	{
		return $this->hasMany(Banner::class, 'medl_id');
	}

	public function main_sections()
	{
		return $this->hasMany(MainSection::class, 'medl_id');
	}

	public function products()
	{
		return $this->hasMany(Product::class, 'medl_id');
	}

	public function sub_sections()
	{
		return $this->hasMany(SubSection::class, 'medl_id');
	}
}
