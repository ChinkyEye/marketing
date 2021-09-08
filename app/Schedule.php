<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'client_id',
        'conclusion',
        'date',
        'time',
        'client_id',
        'is_active',
        'created_by',
        'updated_by',
        'updated_by',
        'created_at_np',
    ];
}
