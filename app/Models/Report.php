<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Report
 * 
 * @property string $report_id
 * @property string $cla_id
 * @property string $prod_id
 * @property string $com_id
 * @property int $fakeId
 * 
 * @property Client $client
 * @property Comment $comment
 * @property IgnoredReport $ignored_report
 *
 * @package App\Models
 */
class Report extends Model
{
	protected $table = 'report';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeId' => 'int'
	];

	protected $fillable = [
		'fakeId'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'cla_id');
	}

	public function comment()
	{
		return $this->belongsTo(Comment::class, 'prod_id', 'prod_id')
					->where('comments.prod_id', '=', 'report.prod_id')
					->where('comments.com_id', '=', 'report.com_id');
	}

	public function ignored_report()
	{
		return $this->hasOne(IgnoredReport::class);
	}
}
