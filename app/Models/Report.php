<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Report
 *
 * @property int $report_id
 * @property int $cla_id
 * @property int $prod_id
 * @property int $com_id
 * @property bool $ignored
 * @property int $fakeId
 *
 * @property Client $client
 * @property Comments $comment
 *
 * @package App\Models
 */
class Report extends Model
{
    use HasFactory;

    protected $table = 'report';
	public $timestamps = false;

	protected $casts = [
		'cla_id' => 'int',
		'prod_id' => 'int',
		'com_id' => 'int',
		'ignored' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'ignored',
		'fakeId'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'cla_id');
	}

	public function comment()
	{
		return $this->belongsTo(Comments::class, 'prod_id', 'prod_id')
					->where('comments.prod_id', '=', 'report.prod_id')
					->where('comments.com_id', '=', 'report.com_id');
	}
}
