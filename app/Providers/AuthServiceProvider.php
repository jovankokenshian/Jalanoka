<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Room;
use App\Models\Hotel;
use App\Models\Transaction;
use App\Policies\PostPolicy;
use App\Policies\DeletePolicyAdmin;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Hotel::class => DeletePolicyAdmin::class,
        Transaction::class => DeletePolicyAdmin::class,
        Room::class => DeletePolicyAdmin::class

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
