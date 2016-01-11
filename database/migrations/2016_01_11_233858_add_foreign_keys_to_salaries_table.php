<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSalariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('salaries', function(Blueprint $table)
		{
			$table->foreign('emp_no', 'salaries_ibfk_1')->references('emp_no')->on('employees')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('salaries', function(Blueprint $table)
		{
			$table->dropForeign('salaries_ibfk_1');
		});
	}

}
