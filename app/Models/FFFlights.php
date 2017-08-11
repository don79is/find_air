<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FFFlights extends CoreModel
{ /**
 * Table name
 * @var string
 */
    protected $table = 'ff_flights';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id','arival','departure','airline_id','destination_id','origin_id'];

    protected $with = ['originAirport', 'destinationAirport', 'airline'];


    public function originAirport() {
        return $this->hasOne(FFAirports::class, 'id', 'origin_id');
    }
    public function destinationAirport() {
        return $this->hasOne(FFAirports::class, 'id', 'destination_id');
    }
    public function airline() {
        return $this->hasOne(FFAirlines::class, 'id', 'airline_id');
    }

}
