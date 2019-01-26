<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public function company(){
    	return $this->belongsTe('App\Company', 'to_id');
    }
}
