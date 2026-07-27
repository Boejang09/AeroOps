<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperationalReport extends Model
{
    protected $table = 'operational_reports';

    protected $primaryKey = 'report_id';

    protected $fillable = [
        'assignment_id',
        'report_date',
        'description',
        'status',
    ];

    public function assignment()
    {
        return $this->belongsTo(
            Assignment::class,
            'assignment_id',
            'assignment_id'
        );
    }
}