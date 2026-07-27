<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    protected $table = 'assignments';

    protected $primaryKey = 'assignment_id';

    protected $fillable = [
        'flight_id',
        'staff_id',
        'service_id',
        'assignment_date',
        'status',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id', 'flight_id');
    }

    public function groundStaff()
    {
        return $this->belongsTo(GroundStaff::class, 'staff_id', 'staff_id');
    }

    public function service()
    {
        return $this->belongsTo(
            GroundHandlingService::class,
            'service_id',
            'service_id'
        );
    }

    public function operationalReport()
    {
        return $this->hasOne(
            OperationalReport::class,
            'assignment_id',
            'assignment_id'
        );
    }
}