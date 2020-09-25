<table>
    <thead>
    <tr>
        <th>NRO.</th>
        <th>DOCUMENTO</th>
        <th>FECHA NACIMIENTO</th>
        <th>ESTUDIANTE</th>
        <th>GENERO</th>
        <th>CONTACTO</th>
        <th>UNIVERSIDAD</th>
        <th>SEDE UNIVERSITARIA</th>
        <th>CARRERA</th>
        <th>FECHA INICIO</th>
        <th>FECHA FIN</th>
        <th>CASO ESPECIAL</th>
        <th>ROTACION</th>
        <th>ESTABLECIMIENTO DE SALUD</th>
        <th>OBSERVACIONES</th>
        <th>SEDES</th>
    </tr>
    </thead>
    <tbody>
        <?php $a = 1?>
        @foreach($designations as $user)        
            <tr>
                <td>{{ $a++ }}</td>
                <td>{{ $user->ci }}</td>
                <td>{{ $user->birth_date }}</td>
                <td>{{ $user->name }} {{ $user->ap_pat }} {{ $user->ap_mat }}</td>
                <td>{{ $user->sexo }}</td>
                <td>{{ $user->correo }}</td>
                <td>{{ $user->name_university }}</td>
                <td>Revisar este campo</td>
                <td>{{ $user->name_career }}</td>
                <td>{{ $user->start_date }}</td>
                <td>{{ $user->end_date }}</td>
                <td>{{ $user->caso_esp }} Revisar </td>
                <td>{{ $user->periodo }}/2020</td>
                <td>{{ $user->name_estable_salud }} </td>
                <td></td>
                <td></td>
            </tr>
        @endforeach
    </tbody>
</table>