@component('components.index_card')
@slot('title')
    Lista de Estudiantes para Sorteo
@endslot    
@slot('bodycard')
    <div class="card-body">
        <table id="example" class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">NRO.</th>
                    <th scope="col">C.I.</th>
                    <th scope="col">ESTUDIANTE</th>
                    <th scope="col">ESTABLECIMIENTO SALUD DESIGNADO</th>
                </tr>
            </thead>
            <tbody>
                <?php $a = 1 ?>
                @forelse($lista as $d)
                    <tr>
                        <td>{{ $a++ }}</td>
                        <td>{{ $d->ci }}</td>
                        <td>{{ $d->name }} {{ $d->ap_pat }} {{ $d->ap_mat }}</td>   
                        @if($d->id_d)                  
                            <td> {{ $d->name_estable_salud }} </td>
                        @else
                            <td class="text-danger"> Sin Designacion </td>
                        @endif
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <form action="{{ route('sorteo_tentativo') }}" method="POST" class="save_date">
            @csrf              
            <input type="hidden" name="datos" value="{{ $datos_enviar }}">
            <h6 class="card-title text-success"> DATOS PARA EL SORTEO</h6>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Tipo Internado</label>
                        <input class="form-control" type="text" value="{{$tipos_internado[0]->name_type}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Cantidad de Cupos Disponibles</label>
                        <input class="form-control" type="text" value="{{$cantidad}}" disabled>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Cantidad de Estudiates</label>
                        <input class="form-control" type="text" value="{{$cantidad_estudiantes}}" disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 align-content-center">
                    @if(isset($lista[0]->id_d))
                        @if($lista[0]->confirmado == "si")
                            <!--button type="button" class="btn btn-primary"> Ver Lista de Designaciones</button-->
                            <div class="alert alert-success" role="alert">
                                Ya se Realizo el Sorteo para esta Gestion y Periodo. Ingrese a: Ver Designaciones
                            </div>
                        @else
                            <button type="button" class="btn btn-danger confirmar_sorteo">Confirmar Sorteo</button>
                        @endif
                    @else
                        <button type="submit" class="btn btn-success">Realizar Sorteo</button>
                    @endif
                </div>            
            </div>
        </form>
    </div>
@endslot
@slot('action')
    @can('tecnico_sedes')
        <!--a href="{{ route('create_internship_types') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Agregar Nuevo Tipo</a--> 
    @endcan
@endslot
@endcomponent
<script>
$(document).ready(function() {
$('#example').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar por:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    },
});
} );
</script>