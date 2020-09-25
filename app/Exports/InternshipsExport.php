<?php

namespace App\Exports;

use App\InternshipTipes;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InternshipsExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('exports.internships', [
            'internships' => InternshipTipes::view_internships_types()
        ]);
    }
}
