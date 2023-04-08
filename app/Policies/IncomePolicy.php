<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Income;

class IncomePolicy
{
    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Income  $income
     * @return mixed
     */
    public function view(User $user, Income $income)
    {
        return $user->id === $income->user_id;
    }
}
