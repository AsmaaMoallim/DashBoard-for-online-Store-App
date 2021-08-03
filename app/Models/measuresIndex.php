<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class MediaLibrary
 *
 * @property int $mesu_index_id
 * @property string mesu_index_name
// * @property string mesu_index_img
 * @property bool $state
 * @property int $fakeId
 * @package App\Models
 *
 *
 */


class measuresIndex extends Model
{
    use HasFactory;

    protected $table = 'measures_index';
    protected $primaryKey = 'mesu_index_id';
    public $timestamps = false;

    protected $casts = [
        'mesu_index_name' => 'string',
        'state' => 'bool',
        'fakeId' => 'int'
    ];

    protected $fillable = [
        'mesu_index_id',
        'mesu_index_name',
        'mesu_index_img',
        'state',
        'fakeId'
    ];


}
