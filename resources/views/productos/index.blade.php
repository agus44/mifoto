@include('head')
<section class="content">
   <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
		    <div class="box-header with-border">
		        <h3 class="box-title">Formulario de Creación</h3>
		    </div>
		    <div class="box-body">
		    	<div class="nav-tabs-custom">
		            <ul class="nav nav-tabs">
		              <li class="active"><a href="#datos_generales" data-toggle="tab">Datos Generales</a></li>
		              <li><a href="#restricciones" data-toggle="tab">Restricciones</a></li>
		              <li><a href="#descripcion" data-toggle="tab">Descripción</a></li>
		              <li><a href="#datos_logisticos" data-toggle="tab">Datos Logísticos</a></li>
		            </ul>
            		<div class="tab-content">
		              <div class="active tab-pane" id="datos_generales">
		              	@include('productos.datos_generales')
	
		            	</div>
		            	<div id="tipo_2" style="display:none" class="animated fadeInRight">
		            		tipo 2
		            	</div>
		            	<div id="tipo_3" style="display:none" class="animated fadeInRight">
		            		tipo 3
		            	</div>
		              </div>
		              <!-- /.tab-pane -->
		              <div class="tab-pane" id="restricciones">
		                @include('productos.restricciones')
		              </div>
              		  <!-- /.tab-pane -->
              		  <div class="tab-pane" id="descripcion">
              		  	 @include('productos.descripcion')
                	  </div>
                	  <div class="tab-pane" id="datos_logisticos">
                	  	 @include('productos.datos_logisticos')
                	  </div>
              		  <!-- /.tab-pane -->
                    </div>
            		  <!-- /.tab-content -->
         		</div>
		    </div>
            <!-- /.box-body -->
        </div>
      </div>
    </div>
</section>
<script>
function select_tipo_producto()
{
	var tipo=$('#tipo').val();
	if(tipo==1)
	{
		$('#tipo_1').attr('style','display:');
		$('#tipo_2').attr('style','display:none');
		$('#tipo_3').attr('style','display:none');
	}

	if(tipo==2)
	{
		$('#tipo_1').attr('style','display:none');
		$('#tipo_2').attr('style','display:');
		$('#tipo_3').attr('style','display:none');
	}

	if(tipo==3)
	{
		$('#tipo_1').attr('style','display:none');
		$('#tipo_2').attr('style','display:none');
		$('#tipo_3').attr('style','display:');
	}

	if(tipo==0)
	{
		$('#tipo_1').attr('style','display:none');
		$('#tipo_2').attr('style','display:none');
		$('#tipo_3').attr('style','display:none');
	}

}
</script>
@include('footer')