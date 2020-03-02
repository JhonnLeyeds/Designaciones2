  <div class="container-fkuid">
    <h4 class="p-2">Lista de Roles Registrados 
        <a href="{{ route('create_roles') }}" class="btn btn-success float-right click_charge_button">Agregar Nuevo Rol</a> 
    </h4>
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">NRO.</th>
                <th scope="col">NOMBRE ROL</th>
                <th scope="col">FECHA CREACION</th>
                <th scope="col"> ACCION </th>
            </tr>
        </thead>
        <tbody>
            @foreach( $roles as $r)
            <tr>
            <th scope="row">{{$r->id}}</th>
            <td>{{$r->name}}</td>
            <td>{{$r->created_at}}</td>
            <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>