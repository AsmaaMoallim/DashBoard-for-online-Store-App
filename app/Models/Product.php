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
 * @property int $prod_id
 * @property string $prod_name
 * @property int $sub_id
 * @property float $prod_price
 * @property int $prod_avil_amount
// * @property boolean $prod_desc_img
 * @property string $prod_desc_text
 * @property int $mesu_index_id
 * @property bool $state
 * @property int $fakeId
 *
 * @property SubSection $sub_section
 * @property Collection|Comment[] $comments
 * @property Collection|OrdHasItemOf[] $ord_has_item_ofs
 * @property Collection|ProdAvilIn[] $prod_avil_ins
 * @property Collection|ProdHasMedia[] $prod_has_media
 * @property Collection|ProductProdAvilColor[] $product_prod_avil_colors
 *
 * @package App\Models
 */
class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
	protected $primaryKey = 'prod_id';
	public $timestamps = false;

	protected $casts = [
		'sub_id' => 'int',
		'prod_price' => 'float',
		'prod_avil_amount' => 'int',
        'prod_desc_text' => 'string',
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'prod_name',
		'sub_id',
		'prod_price',
		'prod_avil_amount',
		'prod_desc_img',
        'prod_desc_text',
        'mesu_index_id',
		'state',
		'fakeId'
	];

	public function sub_section()
	{
		return $this->belongsTo(SubSection::class, 'sub_id');
	}

    public function mesu_index()
    {
        return $this->hasOne(measuresIndex::class, 'measure_index_id');
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

	public function prod_has_media()
	{
		return $this->hasMany(ProdHasMedia::class, 'prod_id');
	}

	public function product_prod_avil_colors()
	{
		return $this->hasMany(ProductProdAvilColor::class, 'prod_id');
	}
}
