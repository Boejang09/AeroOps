<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroundStaff extends Model
{
    protected $table = 'ground_staff';

    protected $primaryKey = 'staff_id';

    protected $fillable = [
        'staff_name',
        'position',
        'phone',
        'email',
    ];
}
