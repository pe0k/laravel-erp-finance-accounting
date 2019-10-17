<?php
namespace PERLUR\ERP\Finance\Accounting\Test\Model;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccounts extends Model
{
    protected $table = 'chart_of_accounts';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
}
