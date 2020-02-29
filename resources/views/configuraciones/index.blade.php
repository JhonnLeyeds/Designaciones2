@extends('layouts.app')

@section('content')
  <div class="container">
{{--     <h2 >Lista de Estudiantes Registrados <a href="configuraciones/create"> <button type="button" class="btn btn-success float-right">Agregar Estudiante</button></a> </h2> --}}
        <table class="table">
          <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">UNIVERSIDAD</th>
                <th scope="col">DEPARTAMENTO</th>
              </tr>
            <tbody>
              @foreach( $univer as $univers)
                <tr>
                  <th scope="row">{{$univers->id}}</th>
                  <td>{{$univers->nombre}}</td>
                  <td>{{$univers->depart_id}}</td>
                </tr>
              @endforeach
            </tbody>
          </thead>
        </table>

        <table class="table">
          <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">INSTITUTO</th>
                <th scope="col">DEPARTAMENTO</th>
              </tr>
            <tbody>
              @foreach($insti as $instis)
              <tr>
                <th scope="row">{{$instis->id}}</th>
                <td>{{$instis->nombre}}</td>
                <td>{{$instis->depart_id}}</td>
              </tr>
              @endforeach
            </tbody>
          </thead>
        </table>

        <table class="table">
          <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">CARRERA</th>
                <th scope="col">UNIVERSIDAD</th>
                <th scope="col">INSTITUTO</th>
              </tr>
            <tbody>
              @foreach($carrer as $carrers )
              <tr>
                <th scope="row">{{$carrers->id}}</th>
                <td>{{$carrers->nombre}}</td>
                <td>{{$carrers->univ_id}}</td>
                <td>{{$carrers->insti_id}}</td>

              </tr>
              @endforeach
            </tbody>
          </thead>
        </table>


</div>

@endsection