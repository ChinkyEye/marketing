<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'client_id', 'description','mediator_id','contact_id','checkbox','first_meeting','next_meeting','priority','spend_time','allocated_time','time','is_active','sort_id','created_at_np','created_by','updated_by','count'
    ];

    public function getMediator()
    {
        return $this->belongsTo('App\Mediator','mediator_id','id');
    }

    public function getContact()
    {
        return $this->belongsTo('App\Contact','contact_id','id');
    }
}
