@component('components.show_card')
    @slot('title')
		Detalles de la Facultad
    @endslot    
	@slot('bodycard')
        @forelse($faculty as $d)
            <div class="table-responsive p-3">
                <table class="table">
                    <tbody>
                        <tr>
                            <th style="width:50%">Nombre de la Universidad:</th>
                            <td>{{ $d->name_faculty }}</td>
                        </tr>
                        <tr>
                            <th>Descripcion:</th>
                            <td>{{ $d->description }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Registro Universidad:</th>
                            <td>{{ $d->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Fecha Ultima Modificacion:</th>
                            <td>{{ $d->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>Pertenece al Municipio:</th>
                            <td>{{ $d->nombre }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @empty
            asdas
        @endforelse
	@endslot
	@slot('action')
		@can('index_faculties')
			<button href="{{ route('index_faculties') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent