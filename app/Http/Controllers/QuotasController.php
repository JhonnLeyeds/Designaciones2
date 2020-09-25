<?php

namespace App\Http\Controllers;

use App\InternshipTipes;
use App\Quotas;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Exports\QuotasExport;
class QuotasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quotas  $quotas
     * @return \Illuminate\Http\Response
     */
    public function show(Quotas $quotas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quotas  $quotas
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotas $quotas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quotas  $quotas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotas $quotas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quotas  $quotas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotas $quotas)
    {
        //
    }
    public function export_types_internships_excel(){
        return Excel::download(new InternshipsExport, 'tipos_internados.xlsx');
    }
    public function export_quotas_excel(){
        return Excel::download(new QuotasExport, 'cupos_para_designacion.xlsx');
    }
    public function generate_types_internships_pdf(){
        setlocale(LC_ALL, 'es_ES');
        $pdf = app('dompdf.wrapper');
        $internships = InternshipTipes::view_internships_types();
        //$designate_date = \Carbon\Carbon::createFromTimeStamp(strtotime($dates->designation_date));
        //$dat2 = $designate_date->formatLocalized(' %d de %B del %Y');
        return \PDF::loadView('reports.internships',compact('internships'))->setPaper('letter', 'portrait')->stream('Estudantes Registrados.pdf');
    }
}
