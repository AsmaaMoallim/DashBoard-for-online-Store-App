<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class IgnoredReport
 *
 * @property string $report_id
 * @property string $cla_id
 * @property string $prod_id
 * @property string $com_id
 * @property int|null $fakeID
 *
 * @property Report $report
 *
 * @package App\Models
 */
class IgnoredReport extends Model
{
	protected $table = 'ignored_reports';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'fakeID' => 'int'
	];

	protected $fillable = [
		'fakeID'
	];

	public function report()
	{
		return $this->belongsTo(Report::class)
					->where('report.report_id', '=', 'ignored_reports.report_id')
					->where('report.cla_id', '=', 'ignored_reports.cla_id')
					->where('report.prod_id', '=', 'ignored_reports.prod_id')
					->where('report.com_id', '=', 'ignored_reports.com_id');
	}
}
