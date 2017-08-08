<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFfFlightsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ff_flights', function(Blueprint $table)
		{
			$table->integer('count')->unique('counter_UNIQUE');
			$table->string('id', 36)->unique('timestampscol_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->dateTime('arival');
			$table->dateTime('departure');
			$table->string('airline_id', 36)->index('fk_FF_flights_FF_airlines_idx');
			$table->string('destination_id', 36)->index('fk_FF_flights_FF_airports1_idx');
			$table->string('origin_id', 36)->index('fk_FF_flights_FF_airports2_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ff_flights');
	}

}
