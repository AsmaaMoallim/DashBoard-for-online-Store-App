<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Manager
 *
 * @property int $man_id
 * @property string $man_frist_name
 * @property string $man_last_name
 * @property string $man_phone_num
 * @property string $man_email
 * @property Carbon|null $email_verified_at
 * @property string $man_password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $pos_id
 * @property bool $state
 * @property int $fakeId
 *
 * @property Position $position
 * @property Collection|ManagerOperationsRecord[] $manager_operations_records
 * @property Collection|Notification[] $notifications
 *
 * @package App\Models
 */
class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    use HasFactory;

    protected $table = 'manager';
    protected $primaryKey = 'man_id';

    protected $casts = [
        'pos_id' => 'int',
        'state' => 'bool',
        'fakeId' => 'int'
    ];

    protected $dates = [
        'email_verified_at'
    ];

    protected $hidden = [
        'man_password',
        'remember_token'
    ];

    protected $fillable = [
        'man_frist_name',
        'man_last_name',
        'man_phone_num',
        'man_email',
        'email_verified_at',
        'man_password',
        'remember_token',
        'pos_id',
        'state',
        'fakeId'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'pos_id');
    }

    public function manager_operations_records()
    {
        return $this->hasMany(ManagerOperationsRecord::class, 'man_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class, 'man_id');
    }

    public function getAuthIdentifierName()
    {
        return 'man_id';


        // TODO: Implement getAuthIdentifierName() method.
    }

    public function getAuthIdentifier()
    {
        return $this->man_id;
//        $this->where('id', '5')->first();
//        dd(auth()->user());
//        $man_id = $this->man_id;

        // TODO: Implement getAuthIdentifier() method.
    }

    public function getAuthPassword()
    {

        return $this->man_password;
        // TODO: Implement getAuthPassword() method.
    }

    public function getRememberToken()
    {
        return $this->remember_token;

        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
        $this->save();

        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    public function get_pos_Id()
    {
        return $this->pos_id;
    }
}
