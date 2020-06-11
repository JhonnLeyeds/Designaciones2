<div class="row">
    <input type="hidden" name="type_uni_inst" value="instituto">
    <div class="col-md-4">
        <div class="form-group">
            <label for="">DEPARTAMENTO</label>
            <select name="id_department" id="department_prov" class="change_select form-control select2bs4 select2-danger name_form">
                    <option>Seleccione Departamento</option>
                @forelse($departments as $d)
                    <option  value="{{ $d->id }}">{{ $d->name_department }}</option>
                @empty
                    <option value="">No hay Departamentos Registrados</option>
                @endforelse
            </select>
            <small class="text-danger" id=""></small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">PROVINCIA</label>
            <select name="id_province" id="provinces" class="change_select form-control select2bs4 select2-danger clear_options name_form">
                <option value="">No hay Provincias</option>
            </select>
            <small class="text-danger" id=""></small>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">      
            <label for="">MUNICIPIO</label> 
            <select name="id_municipality" id="municipalities" class="charge_career_insti change_select form-control select2bs4 select2-danger clear_options_prov name_form">
                <option value="">No hay Municipios</option>
            </select>
            <small class="text-danger" id=""></small>
        </div>    
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">       
            <label for="">INSTITUTO</label>                                         
            <select name="id_institute" id="career_insti" class="charge_career_institutes change_select delete_u delete_option form-control select2bs4 select2-danger name_form">
                <option value="">No hay Institutos</option>
            </select>
            <small class="text-danger" id=""></small>
        </div>  
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="">CARRERA</label>
            <select name="id_career" id="select_careers_insti" class="change_select form-control select2bs4 select2-danger name_form">
                <option value="">No hay Carreras</option>
            </select>
            <small class="text-danger" id=""></small>
        </div>
    </div>
</div>
<script>
$(function () {
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})
</script>