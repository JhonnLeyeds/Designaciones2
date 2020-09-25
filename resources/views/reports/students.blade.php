<div class="col-md-12">
    <h2 class="mover">Lista de Estudiantes Registrados</h2>
</div> 
<table>
    <thead>
    <tr>
        <th>NRO.</th>
        <th>NOMBRES Y APELLIDOS</th>
        <th>CEDULA DE IDENTIDAD</th>
        <th>CORREO ELECTRONICO</th>
        <th>DIRECCION</th>
        <th>GENERO</th>
        <th>FECHA DE REGISTRO</th>
    </tr>
    </thead>
    <tbody>
        <?php $a = 1?>
        @foreach($students as $user)        
            <tr>
                <td>{{ $a++ }}</td>
                <td>{{ $user->name }} {{ $user->ap_pat }} {{ $user->ap_mat }}</td>
                <td>{{ $user->ci }} {{ $user->exp }}</td>
                <td>{{ $user->correo }} </td>
                <td>{{ $user->direccion }} </td>
                <td>{{ $user->sexo }} </td>
                <td>{{ $user->created_at }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
<style>
    table{
        border-collapse: collapse;
        font-size: 15px;
    }
    table thead tr{background-color: #d1d1d3;
    }
    table, table tr, table tr th, table tbody tr td{
        border: 1px solid #000;        
    }
    .mover{
        margin-top: -30px;
        text-align: center;
        font-size: 20px;
    }
</style>