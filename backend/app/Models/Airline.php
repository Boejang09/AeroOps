<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $table = 'airlines';

    protected $primaryKey = 'airline_id';

    protected $fillable = [
        'airline_code',
        'airline_name',
        'country',
    ];
}
