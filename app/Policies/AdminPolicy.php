<?php

namespace App\Policies;

use App\User;
use App\Models\Admin;
use App\Models\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the admin.
     *
     * @param  \App\User  $user
     * @param  \App\Admin  $admin
     * @return mixed
     */
    public function view(User $user, Admin $admin)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'view_admins');
    }

    /**
     * Determine whether the user can create viewers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'add_admins');
    }

    /**
     * Determine whether the user can update the viewer.
     *
     * @param  \App\User  $user
     * @param  \App\Viewer  $viewer
     * @return mixed
     */
    public function update(User $user, Admin $admin)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'edit_admins');
    }

    /**
     * Determine whether the user can delete the viewer.
     *
     * @param  \App\User  $user
     * @param  \App\Viewer  $viewer
     * @return mixed
     */
    public function delete(User $user, Admin $admin)
    {
        return Role::find($user->roles->first()->pivot->role_id)->permissions->contains('name', 'delete_admins');
    }
}
