@extends('layouts.app')

@section('content')
  <div class="container-fkuid">
    <h2 >Lista de Estudiantes Registrados <a href="estudiantes/create"> <button type="button" class="btn btn-success float-right">Agregar Estudiante</button></a> </h2>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO PATERNO</th>
                <th scope="col">APELLIDO MATERNO</th>
                <th scope="col"> CI</th>
                <th scope="col"> EXP</th>
                <th scope="col"> FECHA DE NACIMIENTO</th>
                <th scope="col"> TELEFONO </th>
                <th scope="col"> CORREO</th>
                <th scope="col"> SEXO</th>
                <th scope="col"> DEPARTAMENTO </th>
                <th scope="col"> UNIVERSIDAD </th>
                <th scope="col"> INSTITUTO </th>
                <th scope="col"> CARRERA </th>
                <th scope="col"> CASO ESPECIAL </th>

              </tr>
            </thead>
            <tbody>
              @foreach( $students as $student)
              <tr>
                <th scope="row">{{$student->id}}</th>
                <td>{{$student->nombre}}</td>
                <td>{{$student->ap_pat}}</td>
                <td>{{$student->ap_mat}}</td>
                <td>{{$student->ci}}</td>
                <td>{{$student->exp}}</td>
                <td>{{$student->date}}</td>
                <td>{{$student->celular}}</td>
                <td>{{$student->correo}}</td>
                <td>{{$student->sexo}}</td>
                <td>{{$student->depart_id}}</td>
                <td>{{$student->univ_id}}</td>
                <td>{{$student->insti_id}}</td>
                <td>{{$student->carrer_id}}</td>
                <td>{{$student->caso_esp}}</td>

              </tr>
              @endforeach
            </tbody>
        </table>
</div>
@endsection