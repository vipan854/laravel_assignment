<?php

namespace App\Policies;

use App\User;
use App\Models\Role;
use App\Models\Viewer;
use Illuminate\Auth\Access\HandlesAuthorization;

class ViewerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the viewer.
     *
     * @param  \App\User  $user
     * @param  \App\Viewer  $viewer
     * @return mixed
     */
    public function view(User $user, Viewer $viewer)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'view_viewers');
    }

    /**
     * Determine whether the user can create viewers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'add_viewers');
    }

    /**
     * Determine whether the user can update the viewer.
     *
     * @param  \App\User  $user
     * @param  \App\Viewer  $viewer
     * @return mixed
     */
    public function update(User $user, Viewer $viewer)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'edit_viewers');
    }

    /**
     * Determine whether the user can delete the viewer.
     *
     * @param  \App\User  $user
     * @param  \App\Viewer  $viewer
     * @return mixed
     */
    public function delete(User $user, Viewer $viewer)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'delete_viewers');
    }
}
