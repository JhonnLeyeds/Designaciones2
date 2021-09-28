<?php

namespace App\Services;

use App\Faculty;

class Faculties
{

    public function get()
    {
        $faculties = Faculty::get();
        $facultiesArray[''] = 'Selecciona Facultad';
        foreach ($faculties as $faculty) {
            $facultiesArray[$faculty->id] = $faculty->nombre;
        }
        return $facultiesArray;
    }
}