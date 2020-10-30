<?php

namespace App\Providers;

use App\Http\MailerProviders\SmtpProvider;
use App\Http\Services\NotificationService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // NotificationService register
        $this->app->bind(NotificationService::class, function() {
            return new NotificationService(new SmtpProvider());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
