<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function emails(){
    	return $this->hasMany('App\EmailAddress', 'company_id');
    }
}
