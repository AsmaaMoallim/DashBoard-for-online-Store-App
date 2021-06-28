<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 *
 * @property string $com_id
 * @property string $cla_id
 * @property string $prod_id
 * @property string $com_content
 * @property int $com_rateing
 * @property int $fakeId
 *
 * @property Client $client
 * @property Product $product
 * @property Collection|Report[] $reports
 *
 * @package App\Models
 */
class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'com_rateing' => 'int',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'com_content',
		'com_rateing',
		'fakeId'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'cla_id');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'prod_id');
	}

	public function reports()
	{
		return $this->hasMany(Report::class, 'prod_id', 'prod_id');
	}
}
