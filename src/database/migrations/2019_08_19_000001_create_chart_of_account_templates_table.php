<?php
use Illuminate\Database\Migrations\Migration;

class CreateChartOfAccountTemplatesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    // Creates the chart_of_account_templates table
    Schema::create('chart_of_account_templates', function($table) {
      $table->increments('id');
      $table->text('name');
      $table->text('template_path');
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
    Schema::drop('chart_of_account_templates');
  }
}
