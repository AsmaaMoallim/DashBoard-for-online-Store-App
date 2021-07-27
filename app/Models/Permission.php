<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 *
 * @property int $per_id
 * @property string $per_name
 * @property int $fakeId
 *
 * @property Collection|PosInclude[] $pos_includes
 *
 * @package App\Models
 */
class Permission extends Model
{
	protected $table = 'permission';
	protected $primaryKey = 'per_id';
	public $timestamps = false;

    public const Deals_with_manager = 1;
    public const Deals_with_positions_permissions = 2;
    public const Deals_with_media_library = 3;
    public const Deals_with_banners = 4;
    public const Deals_with_main_sections_sub_sections = 5;
    public const Deals_with_products = 6;
    public const Deals_with_clients = 7;
    public const Deals_with_measure = 8;
    public const Deals_with_contact_information = 9;
    public const Deals_with_social_media_link = 10;
    public const Deals_with_shipping_charge = 11;
    public const Deals_with_sys_bank_account = 12;
    public const Deals_with_bank_transaction = 13;
    public const Deals_with_comments = 14;
    public const Deals_with_notifications = 15;
    public const Deals_with_email_box = 16;
    public const Deals_with_orders = 17;

	protected $casts = [
		'fakeId' => 'int'
	];

	protected $fillable = [
		'per_name',
		'fakeId'
	];

	public function pos_includes()
	{
		return $this->hasMany(PosInclude::class, 'per_id');
	}
}
