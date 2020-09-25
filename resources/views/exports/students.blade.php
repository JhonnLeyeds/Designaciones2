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