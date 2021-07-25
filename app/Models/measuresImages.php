<?php

namespace App\Models;

use Cassandra\Blob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class measuresImages
 *
 * @property int $mesu_imageId
 * @property blob $mesu_image
 * @property int $fakeId
 *
 *
 * @property MediaLibrary $media_library
 * @package App\Models
 */
class measuresImages extends Model
{
    use HasFactory;
    protected $table = ' measures_images';
    protected $primaryKey = 'mesu_imageId';
    public $timestamps = false;

    protected $casts = [
        'mesu_imageId' => 'int',
        'mesu_image' => 'blob',
        'fakeId' => 'int'
    ];

    protected $fillable = [
        'mesu_imageId',
        'mesu_image',
        'fakeId',
    ];

    public function media_library()
    {
        return $this->belongsTo(MediaLibrary::class, 'medl_id');
    }

}
