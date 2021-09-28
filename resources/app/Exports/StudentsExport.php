<?php

namespace App\Exports;

use App\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class StudentsExport implements FromView,ShouldAutoSize
{
    public function view(): View
    {        
        return view('exports.students', [
            'students' => Student::view_test()
        ]);
    }
}
