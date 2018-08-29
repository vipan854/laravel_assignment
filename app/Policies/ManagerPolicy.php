<?php

namespace App\Policies;

use App\User;
use App\Models\Manager;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManagerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the manager.
     *
     * @param  \App\User  $user
     * @param  \App\Manager  $manager
     * @return mixed
     */
    public function view(User $user, Manager $manager)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'view_managers');
    }

    /**
     * Determine whether the user can create viewers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'add_managers');
    }

    /**
     * Determine whether the user can update the viewer.
     *
     * @param  \App\User  $user
     * @param  \App\Viewer  $viewer
     * @return mixed
     */
    public function update(User $user,Manager $manager)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'edit_managers');
    }

    /**
     * Determine whether the user can delete the viewer.
     *
     * @param  \App\User  $user
     * @param  \App\Viewer  $viewer
     * @return mixed
     */
    public function delete(User $user, Manager $manager)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'delete_managers');
    }
}
