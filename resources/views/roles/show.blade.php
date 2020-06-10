@component('components.show_card')
    @slot('title')
		Detalles Rol: {{ $role->name }}
    @endslot    
	@slot('bodycard')
    <div class="row">
        <div class="col-8">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nombre Rol:</th>
                            <td>{{ $role->name }}</td>
                        </tr>
                        <tr>
                            <th>Slug Rol:</th>
                            <td>{{ $role->slug }}</td>
                        </tr>
                        <tr>
                            <th>Descripcion Rol:</th>
                            <td>{{ $role->description }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Creacion Rol:</th>
                            <td>{{ $role->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Ultima Modificacion Rol:</th>
                            <td>{{ $role->updated_at }}</td>
                        </tr>
                        <tr>
                            <th class="text-green">Permisos Especiales:</th>
                            @if(($role->special))
                            <td>{{ $role->special }}</td>
                            @else
                                <td>No hay Permisos Especiales</td> 
                            @endif
                        </tr>
                        
                    </tbody>
                </table>
            </div>            
        </div>
        <div class="col-4">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Lista de Permisos Permisos:</th>  
                        </tr>
                        <tr>
                            @forelse($role_p as $r_p)
                                <td>{{$r_p->name}} <small class="text-green text-size-help">({{ $r_p->description }})</small> </td>
                            @empty
                                <td class="text-danger">  
                                        <i class="fas fa-exclamation"></i> 
                                   No existe permisos para este ROL</td>
                            @endforelse
                        </tr>
                    </tbody>
                </table>    
            </div>
        </div>
    </div>
	@endslot
	@slot('action')
		@can('index_roles')
			<button href="{{ route('index_roles') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent