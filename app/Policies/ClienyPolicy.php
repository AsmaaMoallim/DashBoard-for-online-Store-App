<?php

namespace App\Policies;

use App\Models\Client;
use App\Models\Manager;
use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClienyPolicy
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
     * @param  \App\Models\Client  $client
     * @return mixed
     */
    public function view(Manager $manager, Client $client)
    {
        return Permission::Deals_with_clients == ReturnPermissionOfManager::retunPer(Permission::Deals_with_clients);

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
     * @param  \App\Models\Client  $client
     * @return mixed
     */
    public function update(Manager $manager, Client $client)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Client  $client
     * @return mixed
     */
    public function delete(Manager $manager, Client $client)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Client  $client
     * @return mixed
     */
    public function restore(Manager $manager, Client $client)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Client  $client
     * @return mixed
     */
    public function forceDelete(Manager $manager, Client $client)
    {
        //
    }
}
