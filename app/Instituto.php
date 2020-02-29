<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
	protected  $table = 'institutos';
    protected $fillable =
	[
        'nombre','depart_id',
    ];
}
