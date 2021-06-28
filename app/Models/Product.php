<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property string $prod_id
 * @property string $prod_name
 * @property string $sub_id
 * @property float $prod_price
 * @property int $prod_avil_amount
 * @property boolean $prod_desc_img
 * @property string $medl_id
 * @property bool $state
 * @property int $fakeId
 *
 * @property MediaLibrary $media_library
 * @property SubSection $sub_section
 * @property Collection|Comment[] $comments
 * @property Collection|OrdHasItemOf[] $ord_has_item_ofs
 * @property Collection|ProdAvilIn[] $prod_avil_ins
 * @property Collection|ProductProdAvilColor[] $product_prod_avil_colors
 *
 * @package App\Models
 */
class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
	protected $primaryKey = 'prod_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'prod_price' => 'float',
		'prod_avil_amount' => 'int',
		'prod_desc_img' => 'boolean',
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'prod_name',
		'sub_id',
		'prod_price',
		'prod_avil_amount',
		'prod_desc_img',
		'medl_id',
		'state',
		'fakeId'
	];

	public function media_library()
	{
		return $this->belongsTo(MediaLibrary::class, 'medl_id');
	}

	public function sub_section()
	{
		return $this->belongsTo(SubSection::class, 'sub_id');
	}

	public function comments()
	{
		return $this->hasMany(Comment::class, 'prod_id');
	}

	public function ord_has_item_ofs()
	{
		return $this->hasMany(OrdHasItemOf::class, 'prod_id');
	}

	public function prod_avil_ins()
	{
		return $this->hasMany(ProdAvilIn::class, 'prod_id');
	}

	public function product_prod_avil_colors()
	{
		return $this->hasMany(ProductProdAvilColor::class, 'prod_id');
	}
}
