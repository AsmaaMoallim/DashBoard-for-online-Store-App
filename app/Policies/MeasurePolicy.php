<?php

namespace App\Policies;

use App\Models\Manager;
use App\Models\Measure;
use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class MeasurePolicy
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
     * @param  \App\Models\Measure  $measure
     * @return mixed
     */
    public function view(Manager $manager, Measure $measure)
    {
        return Permission::Deals_with_measure == ReturnPermissionOfManager::retunPer(Permission::Deals_with_measure);

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
     * @param  \App\Models\Measure  $measure
     * @return mixed
     */
    public function update(Manager $manager, Measure $measure)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Measure  $measure
     * @return mixed
     */
    public function delete(Manager $manager, Measure $measure)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Measure  $measure
     * @return mixed
     */
    public function restore(Manager $manager, Measure $measure)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Measure  $measure
     * @return mixed
     */
    public function forceDelete(Manager $manager, Measure $measure)
    {
        //
    }
}
