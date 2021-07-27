<?php

namespace App\Policies;

use App\Models\Manager;
use App\Models\Order;
use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
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
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function view(Manager $manager, Order $order)
    {
        return Permission::Deals_with_orders == ReturnPermissionOfManager::retunPer(Permission::Deals_with_orders);

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
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function update(Manager $manager, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function delete(Manager $manager, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function restore(Manager $manager, Order $order)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Order  $order
     * @return mixed
     */
    public function forceDelete(Manager $manager, Order $order)
    {
        //
    }
}
