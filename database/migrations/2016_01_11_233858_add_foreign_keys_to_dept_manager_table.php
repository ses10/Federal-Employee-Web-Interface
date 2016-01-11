<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDeptManagerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dept_manager', function(Blueprint $table)
		{
			$table->foreign('emp_no', 'dept_manager_ibfk_1')->references('emp_no')->on('employees')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('dept_no', 'dept_manager_ibfk_2')->references('dept_no')->on('departments')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dept_manager', function(Blueprint $table)
		{
			$table->dropForeign('dept_manager_ibfk_1');
			$table->dropForeign('dept_manager_ibfk_2');
		});
	}

}
