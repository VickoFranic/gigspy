<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	public $timestamps = false;

    protected $primaryKey = 'facebook_id';

    protected $guarded = ['id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
