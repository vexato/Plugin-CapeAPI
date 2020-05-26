<?php

namespace Azuriom\Plugin\SkinApi\Providers;

use Azuriom\Extensions\Plugin\BaseRouteServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends BaseRouteServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * @var string
     */
    protected $namespace = 'Azuriom\Plugin\SkinApi\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function loadRoutes()
    {
        $this->mapPluginsRoutes();

        $this->mapAdminRoutes();

        $this->mapApiRoutes();
        //
    }

    protected function mapPluginsRoutes()
    {
        Route::prefix($this->pluginName)
            ->middleware('web')
            ->namespace($this->namespace)
            ->name("{$this->pluginName}.")
            ->group(plugin_path($this->pluginName.'/routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
        Route::prefix('admin/'.$this->pluginName)
            ->middleware('admin-access')
            ->namespace($this->namespace.'\Admin')
            ->name($this->pluginName.'.admin.')
            ->group(plugin_path($this->pluginName.'/routes/admin.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace.'\Api')
            ->name($this->pluginName.'.api.')
            ->group(plugin_path($this->pluginName.'/routes/api.php'));
    }
}
