@component('components.edit_card')
    @slot('title')
		Editar Datos Rol 
    @endslot    
	@slot('bodycard')
        {!! Form::model($role, ['route' => ['update_role', $role->id],'method' => 'POST', 'class' => 'save_date']) !!}                        
            <div class="row">
                <div class="col-md-5">
                    <small class="text-red" id=""></small>
                    <div class="input-group mb-2">
                        {{ Form::text('name', null, ['class' => 'form-control name_form', 'placeholder' => 'Nombre Rol']) }}
                    </div>
                    <small class="text-red" id=""></small>
                    <div class="input-group mb-2">
                        {{ Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug Rol']) }}
                    </div>
                    <div class="input-group mb-2">
                        {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2' , 'placeholder' => 'Descripcion de Rol']) }}
                    </div>
                    <hr>
                    <h5 class="mt-4 mb-2">PERMISO ESPECIAL</h5>
                    <div class="form-group clearfix">   
                        @switch($role->special)
                            @case ('all-access') 
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="special" value="all-access" checked>
                                    <label for="radioPrimary1">Acceso Total
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="radioPrimary2" name="special" value="no-access">
                                    <label for="radioPrimary2">Ningun Acceso
                                    </label>
                                </div>
                                @break;
                            @case ('no-access')
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="special" value="all-access">
                                    <label for="radioPrimary1">Acceso Total
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="radioPrimary2" name="special" value="no-access" checked>
                                    <label for="radioPrimary2">Ningun Acceso
                                    </label>
                                </div>
                                @break;
                            @default
                                <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="special" value="all-access">
                                    <label for="radioPrimary1">Acceso Total
                                    </label>
                                </div>
                                <div class="icheck-danger d-inline">
                                    <input type="radio" id="radioPrimary2" name="special" value="no-access">
                                    <label for="radioPrimary2">Ningun Acceso
                                    </label>
                                </div>
                        @endswitch                     
                    </div>
                </div>
                <div class="col-md-7">
                    <h5 class="">LISTA DE PERMISOS</h5>
                    <div class="input-group mr">
                        <ul class="list-unstyled">
                            <?php $a = 0?>
                            @forelse( $permissions as $permission)            
                                <li>   
                                    <label class="checkbosx">
                                        {{ Form::checkbox('permissions[]', $permission->id, null,['class' => 'checked_role']) }}
                                        <span></span>
                                        {{ $permission->name}}
                                    </label for="{{$permission->id}}"> <em>({{ $permission->description ?: 'Sin descripcion' }})</em>
                                
                                </li>
                            @empty 
                                <div class="text-danger">
                                    <i class="fas fa-exclamation"></i> No hay Permisos registrados
                                </div>
                            @endforelse
                        </ul>
                    </div>   
                    </div>
                </div>   
                <div class="form-group">
                    {{ Form::submit('Guardar',['class' => 'btn btn-sm btn-primary']) }}
                </div>
        {!! Form::close() !!}
	@endslot
	@slot('action')
		@can('index_roles')
			<button href="{{ route('index_roles') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
		@endcan
	@endslot
@endcomponent
<script>
$(function () {
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})
</script>