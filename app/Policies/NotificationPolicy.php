<?php

namespace App\Policies;

use App\Models\Manager;
use App\Models\Notification;
use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class NotificationPolicy
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
     * @param  \App\Models\Notification  $notification
     * @return mixed
     */
    public function view(Manager $manager, Notification $notification)
    {
        return Permission::Deals_with_notifications == ReturnPermissionOfManager::retunPer(Permission::Deals_with_notifications);

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
     * @param  \App\Models\Notification  $notification
     * @return mixed
     */
    public function update(Manager $manager, Notification $notification)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Notification  $notification
     * @return mixed
     */
    public function delete(Manager $manager, Notification $notification)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Notification  $notification
     * @return mixed
     */
    public function restore(Manager $manager, Notification $notification)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Notification  $notification
     * @return mixed
     */
    public function forceDelete(Manager $manager, Notification $notification)
    {
        //
    }
}
