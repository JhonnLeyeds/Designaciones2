<div class="col-md-12">
    <h2 class="mover">Lista de Tipos de Internados</h2>
</div> 
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