<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFfAirlinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ff_airlines', function(Blueprint $table)
		{
			$table->integer('count')->unique('counter_UNIQUE');
			$table->string('id', 36)->unique('timestampscol_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ff_airlines');
	}

}
