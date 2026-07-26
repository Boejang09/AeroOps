<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroundHandlingService extends Model
{
    protected $table = 'ground_handling_services';

    protected $primaryKey = 'service_id';

    protected $fillable = [
        'service_name',
        'description',
    ];
}