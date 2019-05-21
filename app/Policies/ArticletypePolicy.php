<?php

namespace App\Policies;

use App\User;
use App\Articletype;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticletypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the articletype.
     *
     * @param  \App\User  $user
     * @param  \App\Articletype  $articletype
     * @return mixed
     */
    public function view(User $user, Articletype $articletype)
    {
        //
    }

    /**
     * Determine whether the user can create articletypes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the articletype.
     *
     * @param  \App\User  $user
     * @param  \App\Articletype  $articletype
     * @return mixed
     */
    public function update(User $user, Articletype $articletype)
    {
        //
    }

    /**
     * Determine whether the user can delete the articletype.
     *
     * @param  \App\User  $user
     * @param  \App\Articletype  $articletype
     * @return mixed
     */
    public function delete(User $user, Articletype $articletype)
    {
        //
    }

    /**
     * Determine whether the user can restore the articletype.
     *
     * @param  \App\User  $user
     * @param  \App\Articletype  $articletype
     * @return mixed
     */
    public function restore(User $user, Articletype $articletype)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the articletype.
     *
     * @param  \App\User  $user
     * @param  \App\Articletype  $articletype
     * @return mixed
     */
    public function forceDelete(User $user, Articletype $articletype)
    {
        //
    }
}
