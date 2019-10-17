<?php

use Orchestra\Testbench\TestCase;
use Illuminate\Contracts\Console\Kernel;
use PERLUR\ERP\Finance\Accounting\AccountingServiceProvider;

abstract class BaseTestCase extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();
        $this->migrate('sqlite');
    }

    protected function migrate($conn)
    {
        $migrationsPath = '../../../../src/database/migrations';
        $artisan = $this->app->make(Kernel::class);
        $artisan->call('migrate:fresh', [
            '--database' => $conn,
            '--path' => $migrationsPath,
        ]);
        
    }

    protected function getPackageProviders($app)
    {
        return [ AccountingServiceProvider::class ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['path.base'] = __DIR__ . '/..';
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', ':memory:'),
            'prefix' => env('DB_PREFIX'),
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', false)
        ]);
    }
}
