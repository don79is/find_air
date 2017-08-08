<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FFAirlines extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'ff_airlines';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id','name'];
}
