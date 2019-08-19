use Illuminate\Database\Migrations\Migration;

class CreateChartOfAccountsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // Creates the chart_of_accounts table
    Schema::create('chart_of_accounts'), function($table) {
      $table->increments('id');
      $table->unsignedInteger('company_id');
      $table->unsignedInteger('account_parent_id');
      $table->text('account_name');
      $table->enum('account_type',
        ['asset'],
        ['bank'],
        ['cash'],
        ['cryptocurrency'],
        ['equity'],
        ['expense'],
        ['liability'],
        ['payable'],
        ['receivable'],
        ['view'],
        ['profit_and_loss']
      );
      $table->timestamps();
    )};
  }

  /**
     * Reverse the migrations.
     *
     * @return void
  */
  public function down()
  {
    Schema::drop('chart_of_accounts');
  }
}