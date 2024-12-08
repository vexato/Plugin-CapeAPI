<?php

namespace Azuriom\Plugin\CapeApi\Providers;

use Azuriom\Extensions\Plugin\BasePluginServiceProvider;

class CapeApiServiceProvider extends BasePluginServiceProvider
{
    /**
     * The plugin's global HTTP middleware stack.
     */
    protected array $middleware = [
        // \Azuriom\Plugin\CapeApi\Middleware\ExampleMiddleware::class,
    ];

    /**
     * The plugin's route middleware groups.
     */
    protected array $middlewareGroups = [];

    /**
     * The plugin's route middleware.
     */
    protected array $routeMiddleware = [
        // 'example' => \Azuriom\Plugin\CapeApi\Middleware\ExampleRouteMiddleware::class,
    ];

    /**
     * The policy mappings for this plugin.
     *
     * @var array<string, string>
     */
    protected array $policies = [
        // User::class => UserPolicy::class,
    ];

    /**
     * Register any plugin services.
     */
    public function register(): void
    {
        // $this->registerMiddleware();

        //
    }

    /**
     * Bootstrap any plugin services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();

        $this->loadViews();

        $this->loadTranslations();

        $this->loadMigrations();

        $this->registerRouteDescriptions();

        $this->registerAdminNavigation();

        $this->registerUserNavigation();

        //
    }

    /**
     * Returns the routes that should be able to be added to the navbar.
     *
     * @return array<string, string>
     */
    protected function routeDescriptions(): array
    {
        return [
            //
        ];
    }

    /**
     * Return the admin navigations routes to register in the dashboard.
     *
     * @return array<string, array<string, string>>
     */
    protected function adminNavigation(): array
    {
        return [
            'cape-api' => [
                'name' => 'cape-Api',
                'type' => 'dropdown',
                'icon' => 'bi bi-file-image',
                'route' => 'cape-api.admin.*',
                'items' => [
                    'cape-api.admin.home' => trans('admin.nav.settings.settings'),
                ],
            ],
        ];
    }

    /**
     * Return the user navigations routes to register in the user menu.
     *
     * @return array<string, array<string, string>>
     */
    protected function userNavigation(): array
    {
        return [
            'cape' => [
                'icon' => 'bi bi-file-image',
                'route' => 'cape-api.home',
                'name' => trans('cape-api::messages.title'),
            ],
        ];
    }
}
