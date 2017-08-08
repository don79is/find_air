<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFfAirportsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ff_airports', function(Blueprint $table)
		{
			$table->integer('count')->unique('counter_UNIQUE');
			$table->string('id', 36)->unique('timestampscol_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('country_id', 36)->index('fk_FF_airports_FF_countries1_idx');
			$table->string('city');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ff_airports');
	}

}
