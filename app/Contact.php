<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'fullname',
        'phone',
        'address',
        'email',
        'post',
        'is_active',
        'sort_id',
        'created_at_np',
        'created_by',
        'updated_by',
    ];
}
