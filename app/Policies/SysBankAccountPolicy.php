<?php

namespace App\Policies;

use App\Models\Manager;
use App\Models\Permission;
use App\Models\SysBankAccount;
use Illuminate\Auth\Access\HandlesAuthorization;

class SysBankAccountPolicy
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
     * @param  \App\Models\SysBankAccount  $sysBankAccount
     * @return mixed
     */
    public function view(Manager $manager, SysBankAccount $sysBankAccount)
    {
        return Permission::Deals_with_sys_bank_account == ReturnPermissionOfManager::retunPer(Permission::Deals_with_sys_bank_account);

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
     * @param  \App\Models\SysBankAccount  $sysBankAccount
     * @return mixed
     */
    public function update(Manager $manager, SysBankAccount $sysBankAccount)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\SysBankAccount  $sysBankAccount
     * @return mixed
     */
    public function delete(Manager $manager, SysBankAccount $sysBankAccount)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\SysBankAccount  $sysBankAccount
     * @return mixed
     */
    public function restore(Manager $manager, SysBankAccount $sysBankAccount)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\SysBankAccount  $sysBankAccount
     * @return mixed
     */
    public function forceDelete(Manager $manager, SysBankAccount $sysBankAccount)
    {
        //
    }
}
