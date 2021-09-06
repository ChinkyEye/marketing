<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'client_id', 'description','mediator_phone','mediator_name','first_meeting','next_meeting','c_name','c_phone','c_gmail','c_post','priority','is_active','sort_id','created_at_np','created_by','updated_by'
    ];
}
