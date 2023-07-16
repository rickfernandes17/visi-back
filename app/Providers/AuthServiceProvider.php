<?php

namespace App\Providers;

use App\Models\Regra;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('regras') == false){
            Artisan::call('migrate --force --seed');
        }
        $regras = Regra::all();
        $this->registerPolicies();
        foreach ($regras as $regra) {
            Gate::define($regra->regra, function (User $user, $autorizacao) {
                foreach ($user->grupo->regras as $UserRegra) {
                    if ($UserRegra->regra == $autorizacao) {
                        return true;
                    };
                }
                return false;
            });
        }
    }
}
