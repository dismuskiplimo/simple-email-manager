<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailAddress extends Model
{
    public function company(){
    	return $this->belongsTe('App\Company', 'company_id');
    }
}
