<table>
    <thead>
    <tr>
        <th>NRO.</th>
        <th>CENTRO MEDICO</th>
        <th>TIPO CUPO</th>
        <th>PERIODO</th>
        <th>ESTADO</th>
        <th>FECHA REGISTRO</th>
    </tr>
    </thead>
    <tbody>
        <?php $a = 1?>
        @foreach($quotas as $user)        
            <tr>
                <td>{{ $a++ }}</td>
                <td>{{ $user->name_estable_salud }}</td>
                <td>{{ $user->name_type }} </td>
                <td>{{ $user->periodo }} </td>
                <td>{{ $user->status_designation = 1 ? "Designado" : "No Desigando" }} </td>
                <td>{{ $user->created_at }} </td>
            </tr>
        @endforeach
    </tbody>
</table>