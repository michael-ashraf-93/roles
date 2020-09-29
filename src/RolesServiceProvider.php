<?php

namespace Michael\Roles;

use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if (class_exists('CreateRolesTable') || class_exists('CreateUsersRolesTable')) {
            return;
        }

        $stub = __DIR__ . '/database/migrations/';
        $target = database_path('migrations') . '/';

        $this->publishes([
            $stub . 'create_roles_table.php' => $target . date('Y_m_d_His', time()) . '_create_roles_table.php',
            $stub . 'create_users_roles_table.php' => $target . date('Y_m_d_His', time() + 1) . '_create_users_roles_table.php'
        ], 'migrations');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
