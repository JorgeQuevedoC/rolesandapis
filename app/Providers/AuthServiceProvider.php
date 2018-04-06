<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use App\Section;
use App\Product;
use App\Policies\ProductPolicy;
use App\User;
use App\Privilege;
use App\Policies\SectionPolicy;
use App\Policies\UserPolicy;
use App\Policies\FullAccessPolicy;
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
        'App\Model' => 'App\Policies\ModelPolicy',
        Section::class => SectionPolicy::class,
        Product::class => ProductPolicy::class,
        User::class => UserPolicy::class,
        Privilege::class => FullAccessPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
    }
}
