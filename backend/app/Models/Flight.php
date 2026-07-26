<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $table = 'flights';

    protected $primaryKey = 'flight_id';

    protected $fillable = [
        'aircraft_id',
        'flight_number',
        'origin_airport',
        'destination_airport',
        'departure_time',
        'arrival_time',
        'status',
    ];

    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class, 'aircraft_id', 'aircraft_id');
    }
}