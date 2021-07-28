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
 * @property int $com_id
 * @property int $cla_id
 * @property bool $ignored
 * @property int $fakeId
 *
 * @property Client $client
 * @property Comment $comment
 *
 * @package App\Models
 */
class Report extends Model
{
    use HasFactory;

    protected $table = 'report';
	protected $primaryKey = 'report_id';
	public $timestamps = false;

	protected $casts = [
		'com_id' => 'int',
		'cla_id' => 'int',
		'ignored' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'com_id',
		'cla_id',
		'ignored',
		'fakeId'
	];

	public function client()
	{
		return $this->belongsTo(Client::class, 'cla_id');
	}

	public function comment()
	{
		return $this->belongsTo(Comment::class, 'com_id');
	}
}
