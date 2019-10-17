<?php
namespace PERLUR\ERP\Finance\Accounting\Models;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccountsTemplateModel extends Model
{
    protected $table = 'chart_of_accounts';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
}
