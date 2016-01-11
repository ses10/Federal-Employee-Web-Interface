<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTitlesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('titles', function(Blueprint $table)
		{
			$table->foreign('emp_no', 'titles_ibfk_1')->references('emp_no')->on('employees')->onUpdate('RESTRICT')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('titles', function(Blueprint $table)
		{
			$table->dropForeign('titles_ibfk_1');
		});
	}

}
