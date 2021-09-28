@component('components.show_card')
    @slot('title')
		Detalles de los Cupos
    @endslot    
    @slot('bodycard')    
        <div class="row">
            <div class="col-sm-6 col-md-8">
                <div class="table-responsive p-3">
                    <table class="table">
                        <tbody>
                            <tr>
                                @if(is_null($quotas[0]->id_student))
                                    <td>{{$quotas[0]->id}} Disponible</td>
                                @else
                                    <td>{{$quotas[0]->id}} No esta disponible</td>
                                @endif                                
                            </tr>                                  
                        </tbody>
                    </table>
                </div>         
            </div>
        </div>
	@endslot
	@slot('action')
		@can('index_internship_draw')
			<button href="{{ route('index_internship_draw') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent
<style>
    .datos{
    
    }
</style>