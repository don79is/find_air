<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FFAirports extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'ff_airports';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id','name','country_id','city'];
}
