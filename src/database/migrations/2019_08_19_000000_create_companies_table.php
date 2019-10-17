<?php
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // Creates the companies table
    Schema::create('companies', function($table) {
      $table->increments('id');
      $table->text('company_name');
      $table->unsignedInteger('country_id');
      $table->unsignedInteger('chart_of_accounts_root_id')->nullable();
      $table->timestamps();
    });
  }

  /**
     * Reverse the migrations.
     *
     * @return void
  */
  public function down()
    {
      Schema::drop('companies');
    }
}
