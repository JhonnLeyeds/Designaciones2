<?php

namespace App;

use App\Caso;
use Illuminate\Database\Eloquent\Model;

class Caso extends Model
{

    protected  $table = 'casos';

    protected $fillable =
	[
        'nombre',
    ];

    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
    ];


}
