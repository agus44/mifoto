@include('head')
<section class="content">
   <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
		    <div class="box-header with-border">
		        <h3 class="box-title">Búsqueda de Permisos</h3>
		    </div>
		    <div class="box-body">
          <div id="input-empresa">
  		    	<label for="inputEmail3" class="col-lg-2 col-md-12 control-label">Empresa</label>
  		    	<div class="input-group col-lg-10 col-md-12">

                  	<select class="form-control" id="empresa" name="empresa">
                  	<option value="0">Seleccione una empresa...</option>
                      @foreach($empresas as $row_empresa)
                      <option value="{{$row_empresa->id}}">{{$row_empresa->nombre}}</option>
                      @endforeach
                      
                    </select>
                  	<span class="input-group-addon"><i class="fa fa-bank"></i></span>
            </div>
          </div><br>
          <div id="input-depto" style="display:none">   	
            <label for="inputEmail3" class="col-lg-2 col-md-12 control-label">Departamento</label>
  		    	<div class="input-group col-lg-10 col-md-12">

                  	<select class="form-control" id="depto" name="depto">
                    </select>
                  	<span class="input-group-addon"><i class="fa fa-building"></i></span>
            </div>
          </div>
			</div>
            <!-- /.box-body -->
        </div>
	  </div>
   </div>
</section>
<script>

$(document).ready(function()
{
  $('#empresa').change(function()
  {
    var id_emp=$('#empresa').val();
    $('#input-depto').slideUp();
    if(id_emp>0)
    {
      $.ajax({
            url: '{{url()}}/get_departamentos',
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{empresa:id_emp},
            success:function(data)
            {
              if(data!=0)
              {
                var datos=JSON.parse(data);
                $("#depto").find('option').remove();
                for(var i=0;i<datos.length;i++)
                { 
                $("#depto").append('<option value="' + datos[i]['id'] + '">' + datos[i]['nombre'] + '</option>');
                }
                $('#input-depto').slideDown();
              }
              else
              {

              }
            }
          });
    }
  });
});
</script>
@include('footer')