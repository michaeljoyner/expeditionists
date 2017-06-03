<?php
/**
 * Created by PhpStorm.
 * User: mooz
 * Date: 11/5/15
 * Time: 11:22 AM
 */

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider {

    /**
     * Register any application authentication / authorization services.
     *
     * @param GateContract|\Illuminate\Contracts\Auth\Access\Gate $gate
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('manage-profile', function ($user, $profile) {
            return $user->id == $profile->user_id;
        });

        $gate->define('manage-article', function ($user, $article) {
//            return ($user->profile->id == $article->profile_id) || $user->hasRole('admin');
//            return $user->hasRole('admin');
            return true;
        });
    }

}