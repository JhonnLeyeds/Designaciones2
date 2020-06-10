@component('components.create_card')
    @slot('title')
		Registro Nuevos Roles
    @endslot    
	@slot('bodycard')
	<form action="store_roles" method="POST" class="save_date">    
        <div class="row">
            <div class="col-sm-5">
                @csrf
                <div class="form-group">
                <label for="name">NOMBRE ROL</label>
                <small class="text-red" id=""></small>
                <input type="text" class="form-control name_form" name="name" placeholder="Ingrese su Nombre del Rol">
                </div>
                <div class="form-group">
                <label for="email">SLUG ROL</label>
                <small class="text-red" id=""></small>
                <input type="text" class="form-control name_form" name="slug" placeholder="Ingrese slug del Rol">
                </div>
                <div class="form-group">
                <label for="password">DESCRIPCION ROL</label>
                <textarea type="text" class="form-control" name="descripcion" placeholder="Descripcion del Rol"></textarea>
                </div>
                <label for="name">SELECCIONE PERMISO</label>
                <div class="form-group">                
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
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
            <div class="col-sm-7">
                <label for="name">LISTA DE PERMISOS</label>
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
                        <div class="text-red">
                            <i class="fas fa-exclamation"></i> No hay permisos Registrados
                        </div>
                    @endforelse
                    </ul>
                </div>  
            </div>        
        </div>
    </form>
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