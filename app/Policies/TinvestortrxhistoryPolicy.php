<?php

namespace App\Policies;

use App\Models\Tinvestortrxhistory;
use App\Models\Tuser;
use Illuminate\Auth\Access\Response;

class TinvestortrxhistoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Tuser $tuser): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Tuser $tuser, Tinvestortrxhistory $tinvestortrxhistory): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Tuser $tuser): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Tuser $tuser, Tinvestortrxhistory $tinvestortrxhistory): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Tuser $tuser, Tinvestortrxhistory $tinvestortrxhistory): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Tuser $tuser, Tinvestortrxhistory $tinvestortrxhistory): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Tuser $tuser, Tinvestortrxhistory $tinvestortrxhistory): bool
    {
        //
    }
}
