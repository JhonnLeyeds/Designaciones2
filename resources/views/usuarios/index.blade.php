@extends('layouts.app')

@section('content')

<div class="container">

	<h2>Lista de Usuarios Registrados <a href="usuarios/create"><button type="button" class="btn btn-success float-right	">Agregar Usuario</button> </a></h2>

  <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" name="search" type="search" placeholder="Buscar usuarios"
              aria-label="Search">
          <div class="input-group-append">
              <button class="btn btn-navbar float-right" type="submit">
                  <i class="fas fa-search"></i>
              </button>
          </div>
      </div>
  </form>

  <h6>
      @if($search)
        <div class="alert alert-primary" role="alert">
          Los resultados '{{$search}}' son:
        </div>
      @endif
  </h6>

  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nro</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">EMAIL</th>
      <th scope="col">OPCIONES</th>

    </tr>
  </thead>
  <tbody>
  	@foreach( $users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
          <td>
            <form action="{{route('usuarios.destroy' , $user->id)}}" method="POST">

                <a href="{{route('usuarios.show' , $user->id)}}"><button type="button" class="btn btn-secondary">Ver</button></a>

                <a href="{{route('usuarios.edit' , $user->id)}}"><button type="button" class="btn btn-primary">Editar</button></a>

                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Eliminar</button>
             </form>
          </td>
      </tr>
    @endforeach
  </tbody>
</table>
  <div class="row">
      <div class="mx-auto">
         {{$users->links() }}
      </div>
  </div>

</div>

@endsection