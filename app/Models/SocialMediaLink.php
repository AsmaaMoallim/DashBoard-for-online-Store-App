<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SocialMediaLink
 *
 * @property string $social_id
 * @property string $social_site_name
 * @property boolean|null $social_img
 * @property string $social_url
 * @property bool $state
 * @property int|null $fakeID
 *
 * @package App\Models
 */
class SocialMediaLink extends Model
{
	protected $table = 'social_media_link';
	protected $primaryKey = 'social_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'social_img' => 'boolean',
		'state' => 'bool',
		'fakeID' => 'int'
	];

	protected $fillable = [
	    'social_id',
		'social_site_name',
		'social_img',
		'social_url',
		'state',
		'fakeID'
	];
}
