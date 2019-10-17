<?php

namespace PERLUR\ERP\Finance\Accounting;

use Illuminate\Support\ServiceProvider;

class AccountingServiceProvider extends ServiceProvider
{
    /**
     * Path to laravel package configuration
     * @var string
     */
    protected $configPath = __DIR__ . '/../config/accounting.php';

    public function boot() 
    {
        $this->publishes([
            $this->configPath => 
                config_path('perlur_erp_finance_accounting.php')
        ], 'config');

        $this->publishes([
            __DIR__ . '/../database/migrations/' => 
                database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../database/seeds/' =>
                database_path('seeds'),
        ], 'seeds');
    }

    public function register()
    {
        $this->mergeConfigFrom($this->configPath, 'accounting');
    }

    public function provides()
    {
        return [ ChartOfAccountsTemplate::class ];
    }
}
