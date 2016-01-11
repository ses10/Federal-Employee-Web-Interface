<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToDeptEmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('dept_emp', function(Blueprint $table)
		{
			$table->foreign('emp_no', 'dept_emp_ibfk_1')->references('emp_no')->on('employees')->onUpdate('RESTRICT')->onDelete('CASCADE');
			$table->foreign('dept_no', 'dept_emp_ibfk_2')->references('dept_no')->on('departments')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('dept_emp', function(Blueprint $table)
		{
			$table->dropForeign('dept_emp_ibfk_1');
			$table->dropForeign('dept_emp_ibfk_2');
		});
	}

}
