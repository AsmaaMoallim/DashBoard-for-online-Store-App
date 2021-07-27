<?php

namespace App\Policies;

use App\Models\Manager;
use App\Models\Permission;
use App\Models\SysInfoPhone;
use Illuminate\Auth\Access\HandlesAuthorization;

class SysInfoPhonePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Manager  $manager
     * @return mixed
     */
    public function viewAny(Manager $manager)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\SysInfoPhone  $sysInfoPhone
     * @return mixed
     */
    public function view(Manager $manager, SysInfoPhone $sysInfoPhone)
    {
        return Permission::Deals_with_contact_information == ReturnPermissionOfManager::retunPer(Permission::Deals_with_contact_information);

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Manager  $manager
     * @return mixed
     */
    public function create(Manager $manager)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\SysInfoPhone  $sysInfoPhone
     * @return mixed
     */
    public function update(Manager $manager, SysInfoPhone $sysInfoPhone)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\SysInfoPhone  $sysInfoPhone
     * @return mixed
     */
    public function delete(Manager $manager, SysInfoPhone $sysInfoPhone)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\SysInfoPhone  $sysInfoPhone
     * @return mixed
     */
    public function restore(Manager $manager, SysInfoPhone $sysInfoPhone)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\SysInfoPhone  $sysInfoPhone
     * @return mixed
     */
    public function forceDelete(Manager $manager, SysInfoPhone $sysInfoPhone)
    {
        //
    }
}
