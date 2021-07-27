<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\Manager;
use App\Models\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function view(Manager $manager, Comment $comment)
    {
        return Permission::Deals_with_comments == ReturnPermissionOfManager::retunPer(Permission::Deals_with_comments);

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
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function update(Manager $manager, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function delete(Manager $manager, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function restore(Manager $manager, Comment $comment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Manager  $manager
     * @param  \App\Models\Comment  $comment
     * @return mixed
     */
    public function forceDelete(Manager $manager, Comment $comment)
    {
        //
    }
}
