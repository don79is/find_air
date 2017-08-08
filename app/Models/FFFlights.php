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
}
