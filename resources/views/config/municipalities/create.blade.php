@component('components.create_card')
    @slot('title')
		Registrar Nuevo Municipio
    @endslot    
	@slot('bodycard')
	<form action="{{ route('store_municipalities') }}" method="POST" class="save_date">  
		<div class="col-sm-6">
		@csrf
			<div class="form-group">
				<label for="name">SELECCIONE DEPARTAMENTO</label>
					<select name="id_department" id="department_prov" class="form-control select2bs4 select2-danger">
							<option>Seleccione Departamento</option>
						@forelse($departments as $d)
							<option  value="{{ $d->id }}">{{ $d->nombre }}</option>
						@empty
							<option value="">No hay Departamentos Registrados</option>
						@endforelse
					</select>
			</div>
		<div class="form-group">
			<label for="name">SELECCIONE PROVINCIA</label>
				<select name="id_province" id="provinces" class="form-control select2bs4 select2-danger clear_options">
				</select>
		</div>
		<div class="form-group">
			<label for="name">NOMBRE MUNICIPIO</label>
				<small class="text-red" id=""></small>
			<input type="text" class="form-control name_form" name="name_municipality" placeholder="Ingrese Nombre del Municipio">
		</div>
		<div class="form-group">
			<label for="cod_depa">CODIGO MUNICIPIO</label>
				<small class="text-red" id=""></small>
			<input type="text" class="form-control name_form" name="cod_muni" placeholder="Ingrese Codigo del Municipio">
		</div>
		<div class="p-2">
			<button type="submit" class="btn btn-primary">Guardar</button>
			<button type="reset" class="btn btn-danger">Cancelar</button>
		</div>   
		<div class="col-md-1"></div>      
	</form>
	@endslot
	@slot('action')
		@can('index_municipalities')
			<button href="{{ route('index_municipalities') }}" class="btn btn-sm btn-outline-success button_back float-right"> <i class="fas fa-arrow-left"></i> Atras </button>
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