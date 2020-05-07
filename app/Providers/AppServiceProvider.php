<?php

namespace App\Providers;

use App\Extra\Database\Builder;
use App\Extra\Database\Concerns\SerializeEmail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use SerializeEmail;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::interceptor('where', 'email', function ($operator, $value) {
            return static::serializeEmail($value);
        });
    }
}
