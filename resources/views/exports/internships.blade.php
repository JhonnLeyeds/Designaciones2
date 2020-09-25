<table>
    <thead>
    <tr>
        <th>NRO.</th>
        <th>NOMBRES TIPO</th>
        <th>DESCRIPCION</th>
        <th>FECHA DE REGISTRO</th>
    </tr>
    </thead>
    <tbody>
        <?php $a = 1?>
        @foreach($internships as $user)        
            <tr>
                <td>{{ $a++ }}</td>
                <td>{{ $user->name_type }}</td>
                <td>{{ $user->description }} </td>
                <td>{{ $user->created_at }} </td>
            </tr>
        @endforeach
    </tbody>
</table>