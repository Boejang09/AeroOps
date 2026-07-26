<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aircraft extends Model
{
    protected $table = 'aircraft';

    protected $primaryKey = 'aircraft_id';

    protected $fillable = [
        'airline_id',
        'registration_number',
        'manufacturer',
        'model',
        'capacity',
    ];

    public function airline()
    {
        return $this->belongsTo(Airline::class, 'airline_id', 'airline_id');
    }

    public function aircraft()
    {
        return $this->hasMany(Aircraft::class, 'airline_id', 'airline_id');
    }
}