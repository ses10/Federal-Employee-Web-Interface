<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeptManagerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dept_manager', function(Blueprint $table)
		{
			$table->char('dept_no', 4)->index('dept_no');
			$table->integer('emp_no')->index('emp_no');
			$table->date('from_date');
			$table->date('to_date');
			$table->primary(['emp_no','dept_no']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dept_manager');
	}

}
