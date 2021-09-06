<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'fullname', 'address','phone','is_active','sort_id','email','created_at_np','created_by','updated_by'
    ];

    public function getInformation()
    {
        return $this->hasOne('App\Information','client_id','id');
    }
}
