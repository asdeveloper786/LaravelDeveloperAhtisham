<?php

namespace App\Providers;


use Laravel\Passport\Passport;
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
        // 'App\Model' => 'App\Policies\ModelPolicy',
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
          Passport::tokensExpireIn(now()->addDays(15));

        // set token life how long it takes to be working.......
        // $startTime=date('y-m-d H:i:s');
        // $endTime=date('y-m-d H:i:s',strtotime('+7 days +1 hour ', strtotime($startTime)));
        // $exptime=\DateTime::creatFromFormat('y-m-d H:i:s',$endTime);
        //  Passport::tokensExpireIn($exptime);




    }
}
