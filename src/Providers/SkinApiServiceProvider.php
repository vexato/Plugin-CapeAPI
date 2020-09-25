<?php

namespace Azuriom\Plugin\SkinApi\Providers;

use Azuriom\Extensions\Plugin\BasePluginServiceProvider;

class SkinApiServiceProvider extends BasePluginServiceProvider
{
    /**
     * Register any plugin services.
     *
     * @return void
     */
    public function register()
    {
        // $this->registerMiddlewares();
    }

    /**
     * Bootstrap any plugin services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViews();

        $this->loadTranslations();

        // $this->loadMigrations();

        $this->registerRouteDescriptions();

        $this->registerAdminNavigation();

        $this->registerUserNavigation();
    }

    /**
     * Returns the routes that should be able to be added to the navbar.
     *
     * @return array
     */
    protected function routeDescriptions()
    {
        return [
            'skin-api.home' => 'skin-api::messages.title',
        ];
    }

    /**
     * Return the admin navigations routes to register in the dashboard.
     *
     * @return array
     */
    protected function adminNavigation()
    {
        return [
            'skin-api' => [
                'name' => 'Skin-Api',
                'type' => 'dropdown',
                'icon' => 'fas fa-user-circle',
                'route' => 'skin-api.admin.*',
                'items' => [
                    'skin-api.admin.home' => 'admin.nav.settings.settings.settings',
                ],
            ],
        ];
    }

    /**
     * Return the user navigations routes to register in the user menu.
     *
     * @return array
     */
    protected function userNavigation()
    {
        return [
            'skin' => [
                'route' => 'skin-api.home',
                'name' => 'skin-api::messages.title',
            ],
        ];
    }
}
