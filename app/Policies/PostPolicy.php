<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

//Class to make policy, can we do a particular action?
class PostPolicy
{
    use HandlesAuthorization;

    //policy delete post
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
