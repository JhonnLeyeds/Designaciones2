@component('components.show_card')
    @slot('title')
		Detalles del Tipo de Internado
    @endslot    
	@slot('bodycard')
        
	@endslot
	@slot('action')
		@can('index_internship_types')
			<button href="{{ route('index_internship_types') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent