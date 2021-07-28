<?php

namespace App\Policies;

use App\Models\Banner;
use App\Models\Manager;
use App\Models\Permission;
use App\Models\PosInclude;
use App\Models\Position;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class BannerPolicy
{
    use HandlesAuthorization;

//
//    public static function retunPer()
//    {
//        if (auth()->check()) {
//            $Per = PosInclude::all()->where('pos_id', '=', auth()->user()->pos_id)
//                ->where('per_id', '=', Permission::Deals_with_banners)->first();
//            if ($Per != null) {
//                $Per = $Per->per_id;
//            } else {
//                $Per = 0;
//            }
//        }
//
//        return $Per;
//    }

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\Manager $manager
     * @return mixed
     */

    public function viewAny(Manager $manager)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\Manager $manager
     * @param \App\Models\Banner $banner
     * @return mixed
     */
    public function view(Manager $manager, Banner $banner)
    {
        return Permission::Deals_with_banners == ReturnPermissionOfManager::retunPer(Permission::Deals_with_banners);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\Manager $manager
     * @return mixed
     */
    public function create(Manager $manager)
    {

    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\Manager $manager
     * @param \App\Models\Banner $banner
     * @return mixed
     */
    public function update(Manager $manager, Banner $banner)
    {

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\Manager $manager
     * @param \App\Models\Banner $banner
     * @return mixed
     */
    public function delete(Manager $manager, Banner $banner)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\Manager $manager
     * @param \App\Models\Banner $banner
     * @return mixed
     */
    public function restore(Manager $manager, Banner $banner)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\Manager $manager
     * @param \App\Models\Banner $banner
     * @return mixed
     */
    public function forceDelete(Manager $manager, Banner $banner)
    {
        //
    }

}
