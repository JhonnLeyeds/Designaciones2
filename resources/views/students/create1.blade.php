<div class="container-fluid p-2">
  <h4>Regitrar nuevo Estudiante</h4><hr>
  {{-- <div class="row">
    <div class="col-sm-4"> --}}
      <form action="/estudiantes" method="POST">
        <div class="form-row">
          @csrf
          <div class="col-md-4 mb-3">
            <label for="NOMBRE">NOMBRE</label>
            <input type="text" class="form-control" name="nombre" placeholder="Ingrese su Nombre">
          </div>

            <div class="col-md-4 mb-3">
            <label for="ap_pat">APELLIDO PATERNO</label>
            <input type="text" class="form-control" name="ap_pat" placeholder="Ingrese su Apellido Paterno">
          </div>

          <div class="col-md-4 mb-3">
            <label for="ap_mat">APELLIDO MATERNO</label>
            <input type="text" class="form-control" name="ap_mat" placeholder="Ingrese su Apellido Materno">
          </div>


          <div class="col-md-2 mb-3">
            <label for="ci">CARNET DE IDENTIDAD</label>
            <input type="text" class="form-control" name="ci" placeholder="Ej. 12404567">
          </div>

            <div class="col-md-1 mb-1">
            <label for="exp">EXP</label>
                <select class="custom-select" name="exp">
            <option>Pt</option>
            <option>Lp</option>
            <option>Tj</option>
            <option>Sc</option>

          </select>
          </div>

          <div class="col-md-2 mb-3">
            <label for="date">FECHA DE NACIMIENTO</label>
            <input type="date" class="form-control" name="date">
          </div>


          <div class="col-md-2 mb-3">
            <label for="celular">TELEFONO</label>
            <input type="numeric" class="form-control" name="celular" placeholder="Ejm. 60242367">
          </div>


          <div class="col-md-3 mb-3">
            <label for="correo">CORREO</label>
            <input type="email" class="form-control" name="correo" placeholder="Ingrese su Nombre">
          </div>

            <div class="col-md-2 mb-2">
            <label for="sexo">SEXO</label>
                <select class="custom-select" name="sexo" >
            <option>MASCULINO</option>
            <option>FEMENINO</option>
          </select>
          </div>

        <div class="col-md-2 mb-2">
            <label for="depart_id">DEPARTAMENTOs</label>
            <select   name="depart_id" id="departamento"   class="form-control cargar_uni_inst" >
            <option>--Seleccione--</option>
            @foreach ($departamentos  as $departamento)
              <option value="{{ $departamento ['id'] }}"> {{ $departamento['nombre']}}</option>
            @endforeach

            </select>
        </div>



            <div class="col-md-3 mb-2">
                <label for="name">UNIVERSIDAD</label>
                <select  name="univ_id"  id="universidad"   class="form-control delete_uni load_carrer_uni">
                    <option selected>--Seleccione--</option>
                </select>
          </div>

          <div class="col-md-3 mb-2">
                <label for="name">INSTITUTO</label>
                <select  name="insti_id"  id="instituto"  class="form-control delete_inst load_carrer_inti">
                    <option selected>--Seleccione--</option>
                </select>
          </div>


            <div class="col-md-2 mb-2">
            <label for="name">CARRERA</label>
              <select  name="carrer_id"  id="carrera"  class="form-control delete_carrera">
                    <option selected>--Seleccione--</option>
                </select>
          </div>

            <div class="col-md-2 mb-2">
            <label for="name">CASO ESPECIAL</label>
            <select   name="caso_id"  class="form-control" >
            <option>SELECCIONE</option>
            @foreach ($casos  as $caso)
              <option value="{{ $caso ['id'] }}"> {{ $caso['nombre']}}</option>
            @endforeach
          </select>
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Registrar</button>
          <button type="reset" class="btn btn-danger">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>