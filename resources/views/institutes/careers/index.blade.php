@component('components.index_card')
    @slot('title')
        Lista de Carreras Registradas para Institutos
    @endslot    
    @slot('bodycard')
    <div class="table-responsive p-3">
            <table id="example" class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">NRO.</th>
                        <th scope="col">NOMBRE CARRERA</th>
                        <th scope="col">FECHA REGISTRO</th>
                        <th scope="col">INSTITUTO</th>
                        <th scope="col"> ACCION </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $a = 1 ?>
                    @foreach( $careers_institute as $r)
                    <tr>
                    <th scope="row">{{$a++}}</th>
                    <td>{{$r->name_career}}</td>
                    <td>{{$r->created_at}}</td>
                    <td>{{$r->name_institute}}</td>
                    <td>
                        @can('show_careers_institutes')<a href="{{ route('show_careers_institutes') }}" class="btn btn-success btn-sm show_function" value="{{ $r->id }}" title="Ver Carrera" data-original-title="More Color"> <i class="far fa-eye"></i> </a>@endcan
                        @can('edit_careers_institutes')<a href="{{ route('edit_careers_institutes') }}" class="btn btn-primary btn-sm edit_function"  value="{{ $r->id }}" title="Editar Carrera" data-original-title="More Color"> <i class="fas far fa-edit"></i> </a>@endcan
                        @can('delete_careers_institutes')<a href="{{ route('delete_careers_institutes') }}" class="btn btn-danger btn-sm delete_function"  value="{{ $r->id }}" title="Borrar Carrera" data-original-title="More Color"> <i class="fas fa-trash-alt"></i> </a>@endcan
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endslot
        @slot('action')
            @can('create_careers_institutes')
                <a href="{{ route('create_careers_institutes') }}" class="btn btn-sm btn-outline-primary click_charge_button"> <i class="fas fa-plus-circle"></i> Agregar Nueva Carrera</a> 
            @endcan
        @endslot
@endcomponent
@if( session()->has('info'))
<script>
$(function(){      
    toastr.options = {
    "closeButton": true,
    "progressBar": true,
    }
    toastr.{{ session('info')['status'] }}('{{ session("info")["content"] }}');
})
</script>
@endif
<script>
    $(document).ready(function() {
    $('#example').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay informaci??n",
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