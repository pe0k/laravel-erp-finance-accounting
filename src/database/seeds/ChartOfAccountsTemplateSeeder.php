<?php
use Illuminate\Database\Seeder;
use PERLUR\ERP\Finance\Accounting\Models\ChartOfAccountsTemplateModel;
use PERLUR\ERP\Finance\Accounting\ChartOfAccountsTemplate;

class ChartOfAccountsTemplateSeeder extends Seeder
{
    public function run()
    {
        $export_file = env('PERLUR_ACCOUNTING_TEMPLATE_EXPORT_FILE',
            __DIR__ . '/ChartOfAccountTemplateData' .
            '/chart_of_account_template_czech_republic_enterpeneurs.xml');

        $template = new ChartOfAccountsTemplate();
        $template->importXmlTemplate(
            $export_file, 
            ChartOfAccountsTemplateModel::class, 
            config('accounting')
        );
    }
}
