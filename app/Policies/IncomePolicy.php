<?php

namespace App\Policies;

<<<<<<< HEAD
use App\Models\Income;
use App\Models\User;
use Illuminate\Auth\Access\Response;
=======
use App\Models\User;
use App\Models\Income;
>>>>>>> ef759ebb57bb168b30608b391d0852e6d4ae3885

class IncomePolicy
{
    /**
<<<<<<< HEAD
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
=======
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Income  $income
     * @return mixed
>>>>>>> ef759ebb57bb168b30608b391d0852e6d4ae3885
     */
    public function view(User $user, Income $income)
    {
        return $user->id === $income->user_id;
    }
<<<<<<< HEAD

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Income $income)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Income $income)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Income $income)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Income $income)
    {
        //
    }
}
=======
}
>>>>>>> ef759ebb57bb168b30608b391d0852e6d4ae3885
