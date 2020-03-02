<div class="container" >
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
                    @foreach( $permissions as $permission)            
                        <li>   
                            <label class="checkbosx">
                                {{ Form::checkbox('permissions[]', $permission->id, null,['class' => 'checked_role']) }}
                                <span></span>
                                {{ $permission->name}}
                            </label for="{{$permission->id}}"> <em>({{ $permission->description ?: 'Sin descripcion' }})</em>
                        </li>
                    @endforeach
                    </ul>
                </div>  
            </div>        
        </div>
    </form>
</div>