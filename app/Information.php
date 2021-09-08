<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'client_id', 'description','mediator_id','contact_id','checkbox','first_meeting','next_meeting','priority','spend_time','time','is_active','sort_id','created_at_np','created_by','updated_by'
    ];

    public function getMediator()
    {
        return $this->belongsTo('App\Mediator','mediator_id','id');
    }
}
