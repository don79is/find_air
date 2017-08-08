<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FFCountries extends CoreModel
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'ff_countries';

    /**
     * Fields which will be manipulated
     * @var array
     */
    protected $fillable = ['id','name'];
}
