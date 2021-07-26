<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialMediaLink
 *
 * @property int $social_id
 * @property string $social_site_name
// * @property boolean|null $social_img
 * @property string $social_url
 * @property bool $state
 * @property int $fakeId
 *
 * @package App\Models
 */
class SocialMediaLink extends Model
{
	protected $table = 'social_media_link';
	protected $primaryKey = 'social_id';
	public $timestamps = false;

	protected $casts = [
		'state' => 'bool',
		'fakeId' => 'int'
	];

	protected $fillable = [
		'social_site_name',
		'social_img',
		'social_url',
		'state',
		'fakeId'
	];
}
