@include('head')
<section class="content">
   <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
		    <div class="box-header with-border">
		        <h3 class="box-title">Búsqueda de Permisos</h3>
		    </div>
		    <div class="box-body">
		    	<label for="inputEmail3" class="col-sm-2 control-label">Empresa</label>
		    	<div class="input-group">

                	<select class="form-control" id="empresa" name="empresa">
                	<option value="0">Seleccione una empresa...</option>
                    @foreach($empresas as $row_empresa)
                    <option value="{{$row_empresa->id}}">{{$row_empresa->nombre}}</option>
                    @endforeach
                    
                  </select>
                	<span class="input-group-addon"><i class="fa fa-building"></i></span>
              	</div><br>
              	<label for="inputEmail3" class="col-sm-2 control-label">Rol</label>
		    	<div class="input-group">

                	<select class="form-control" id="empresa" name="empresa">
                	<option value="0">Seleccione un Departamento...</option>
                    @foreach($departamentos as $row_depto)
                    <option value="{{$row_depto->id}}">{{$row_depto->nombre}}</option>
                    @endforeach
                    
                  </select>
                	<span class="input-group-addon"><i class="fa fa-flag"></i></span>
              	</div>


			</div>
            <!-- /.box-body -->
        </div>
	  </div>
   </div>
</section>
@include('footer')