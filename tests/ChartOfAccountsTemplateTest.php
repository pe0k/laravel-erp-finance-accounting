<?php
use PERLUR\ERP\Finance\Accounting\ChartOfAccountsTemplate;
use PERLUR\ERP\Finance\Accounting\Models\ChartOfAccountsTemplateModel;

final class ChartOfAccountTemplateTest extends BaseTestCase
{
    public function test_import_single_record()
    {
        $fixture = __DIR__ . '/fixtures/01-single-record.xml';
        $o = new ChartOfAccountsTemplate();
        $o->importXmlTemplate(
            $fixture, 
            ChartOfAccountsTemplateModel::class, 
            $this->app['config']->get('accounting')
        );
        
        $results = ChartOfAccountsTemplateModel::all();
        $this->assertCount(1, $results);

        $r = $results[0];
        $this->assertEquals('root', $r->id);
        $this->assertEquals('Root account', $r->account_name);
        $this->assertEquals('view', $r->account_type);
    }
}
