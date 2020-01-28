@extends('layouts.app')

@section('content')
  <div class="container" >
    <div class="row">
      <div class="col-sm-4">
        <h2>editar usuario: {{$user->name}} </h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.update' , $user->id)}}" method="POST">
          @method('PATCH')
          @csrf
        <div class="form-group">
          <label for="name">NOMBRE</label>
          <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Ingrese su Nombre">
        </div>

         <div class="form-group">
          <label for="email">EMAIL</label>
          <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Ingrese su Email">
        </div>


        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <button type="reset" class="btn btn-danger">Cancelar</button>
        </form>
      </div>
    </div>
</div>

@endsection