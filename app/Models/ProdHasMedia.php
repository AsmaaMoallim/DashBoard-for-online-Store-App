<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProdHasMedia
 *
 * @property int $prod_id
 * @property int $medl_id
 * @property int $fakeId
 *
 * @property Product $product
 * @property MediaLibrary $media_library
 *
 * @package App\Models
 */
class ProdHasMedia extends Model
{
    use HasFactory;

    protected $table = 'prod_has_media';
	public $timestamps = false;

	protected $casts = [
		'medl_id' => 'int',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'fakeId'
	];

	public function product()
	{
		return $this->belongsTo(Product::class, 'prod_id');
	}

	public function media_library()
	{
		return $this->belongsTo(MediaLibrary::class, 'medl_id');
	}
}
