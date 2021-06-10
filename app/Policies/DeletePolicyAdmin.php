<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

//Class to make policy, can we do a particular action?
class DeletePolicyAdmin
{
    use HandlesAuthorization;

    //policy delete post
    public function delete()
    {
        return Auth::user()->email === "admin@admin.com";
    }
}
