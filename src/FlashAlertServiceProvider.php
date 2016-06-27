<?php

namespace EGALL\FlashAlert;

use EGALL\FlashAlert\SessionStore;
use Illuminate\Support\ServiceProvider;
use EGALL\FlashAlert\Contracts\SessionStore as SessionStoreContract;

class FlashAlertServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom($this->getViewsPath(), 'alert');

        $this->publishes([
            $this->getViewsPath() => resource_path('views/vendor/alert')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SessionStoreContract::class, SessionStore::class);

        $this->app->singleton('alert', function(){
            return $this->app->make(Alert::class);
        });
    }

    protected function getViewsPath()
    {

        return __DIR__.'/../views';
    }
}
