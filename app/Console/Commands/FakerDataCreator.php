<?php

namespace App\Console\Commands;

use App\Models\FFAirlines;
use App\Models\FFAirports;
use App\Models\FFCountries;
use App\Models\FFFlights;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Console\Command;

class FakerDataCreator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:fake-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create fake data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->createFakeData();
    }

    function getRandomString($length = 3)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $airport_id = '';
        for ($i = 0; $i < $length; $i++) {
            $airport_id .= $characters[mt_rand(0, strlen($characters) - 1)];
        }
        return $airport_id;
    }

    public function createFakeData(){

        $faker = Factory::create();
        for ($i = 0; $i < 200; $i++) {
            FFAirports::create([
                'id' => getRandomString(),
                'name' => $faker->company,
                'city' => $faker->city,
                'country_id' => FFCountries::all()->random()->id,
            ]);
        }

        $faker = Factory::create();
        for ($i = 0; $i < 550; $i++) {
            $time = Carbon::create(rand(2017, 2018), rand(1, 12), rand(1, 31), rand(0, 23), rand(0, 59), rand(0, 59));
            FFFlights::create([
                'id' => $faker->uuid,
                'airline_id' => FFAirlines::all()->random()->id,
                'origin_id' => FFAirports::all()->random()->id,
                'departure' => $time->toDateTimeString(),
                'destination_id' => FFAirports::all()->random()->id,
                'arival' => $time->addMinutes(rand(30, 960))->toDateTimeString()
            ]);
        }
    }

}
