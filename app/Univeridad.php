<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Univeridad extends Model
{
	protected  $table = 'univeridads';
    protected $fillable =
	[
        'nombre','depart_id',
    ];
}
