<?php
use Illuminate\Contracts\Console\Kernel;
use PERLUR\ERP\Finance\Accounting\Models\ChartOfAccountsTemplateModel;

final class ChartOfAccountsTemplateSeederTest extends BaseTestCase
{

    public function test_seeder()
    {
        require __DIR__ .
            '/../src/database/seeds/ChartOfAccountsTemplateSeeder.php';
        $artisan = $this->app->make(Kernel::class);
        $artisan->call('db:seed', [
            '--class' => 'ChartOfAccountsTemplateSeeder'
        ]);

        $this->assertGreaterThan(100, count(ChartOfAccountsTemplateModel::all()));

    }

}
