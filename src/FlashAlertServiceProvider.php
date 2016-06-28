<?php

namespace EGALL\FlashAlert;

use Illuminate\Support\ServiceProvider;
use EGALL\FlashAlert\Contracts\SessionStore as SessionStoreContract;

/**
 * FlashAlertServiceProvider Class
 *
 * @package EGALL\FlashAlert
 * @author Erik Galloway <erik@mybarnapp.com>
 */
class FlashAlertServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadViewsFrom($this->getViewsPath(), 'flash');

        $this->publishes([
            $this->getViewsPath() => resource_path('views/vendor/flash')
        ]);

        $this->publishes([
            $this->getSassPath() => resource_path('/assets/sass/vendor')
        ]);

        $this->publishes([
            $this->getJavascriptPath() => resource_path('/assets/js/components')
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

        $this->app->singleton('alert', function () {

            return $this->app->make(Alert::class);
        });
    }

    /**
     * Get the packages javascript folder path.
     *
     * @return string
     */
    protected function getJavascriptPath()
    {

        return __DIR__ . '/../resources/assets/js';

    }

    /**
     * Get the Sass directory to copy over the styling.
     *
     * @return string
     */
    protected function getSassPath()
    {

        return __DIR__ . '/../resources/assets/sass';

    }

    /**
     * Get the packages views path.
     *
     * @return string
     */
    protected function getViewsPath()
    {

        return __DIR__ . '/../resources/views';
    }
}
