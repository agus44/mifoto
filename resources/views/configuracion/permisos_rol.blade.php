@include('head')
<style>

</style>
<section class="content">
   <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		<div class="box box-info animated fadeInRight">
		    <div class="box-header with-border">
		        <h3 class="box-title">Búsqueda de Permisos</h3>
		    </div>
		    <div class="box-body">
          <div id="input-empresa">
  		    	<label for="" class="col-lg-2 col-md-12 control-label">Empresa</label>
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
            <label for="" class="col-lg-2 col-md-12 control-label">Departamento</label>
  		    	<div class="input-group col-lg-10 col-md-12">

                  	<select class="form-control" id="depto" name="depto">
                    </select>
                  	<span class="input-group-addon"><i class="fa fa-building"></i></span>
            </div>
          </div><br>

          <div id="input-rol" style="display:none">     
            <label for="" class="col-lg-2 col-md-12 control-label">Rol</label>
            <div class="input-group col-lg-10 col-md-12">

                    <select class="form-control" id="rol" name="rol">
                    </select>
                    <span class="input-group-addon"><i class="fa fa-flag"></i></span>
            </div>
          </div>
			</div>
            <!-- /.box-body -->
        </div>
        </div>
        <div class="row" id="permisos" style="display:none">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="box box-info animated fadeInRight ">
            <div class="box-header with-border">
                <h3 class="box-title">Menús</h3>
            </div>
            <div class="box-body" id="permisos-body">
            </div>
        </div>
        </div>
        </div>
	  
   </div>

   @include('configuracion.ver_submenus')
</section>
<script>

function ver_hijos2(id)
{
  var activado=$('#activo'+id).val();
  if(activado==0)
  {
  $('#submenus'+id).html('');
   $.ajax({
      url: '{{url()}}/get_permisos_rol_hijos',
      type: 'POST',
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{menu:id},
      success:function(data)
      {
        if(data!=0)
        {
          var datos=JSON.parse(data);
        
          if(datos[1].length>0)
          {
            var sub="";
            $('#submenus'+id).append('<center><i class="'+datos[0][0]['clase']+'"></i>&nbsp;&nbsp;<strong>'+datos[0][0]['nombre']+'</strong></center>');
            for(var i=0;i<datos[1].length;i++)
            {
              sub+='<a class="btn btn-app bg-red" onclick=ver_hijos2('+datos[1][i]['id']+')><i class="'+datos[1][i]['clase']+'"></i> '+datos[1][i]['nombre']+'</a><div class="bg-navy color-palette" id="submenus'+datos[1][i]['id']+'" style="display:none"></div><input type="hidden" id="activo'+datos[1][i]['id']+'" value=0 />';
              
            }
            $('#submenus'+id).append(sub);
            $('#submenus'+id).slideDown();
            $('#activo'+id).val(1);

          }
         // $('#ver_submenus').modal();
        }
        else
        {

        }
      }
    });
  }
  else
  {
     $('#submenus'+id).slideUp();
     $('#activo'+id).val(0);
  }
   
}


function ver_hijos(id)
{
   $('#titulo-submenus').html('');
   $('#submenu-body').html('');
   $.ajax({
      url: '{{url()}}/get_permisos_rol_hijos',
      type: 'POST',
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{menu:id},
      success:function(data)
      {
        if(data!=0)
        {
          var datos=JSON.parse(data);
          $('#titulo-submenus').append(datos[0][0]['nombre']+'&nbsp;&nbsp;<button class="btn btn-success">Activado</button>');

          if(datos[1].length>0)
          {

            for(var i=0;i<datos[1].length;i++)
            {
              $('#submenu-body').append('<a class="btn btn-app bg-red" onclick=ver_hijos2('+datos[1][i]['id']+')><i class="'+datos[1][i]['clase']+'"></i> '+datos[1][i]['nombre']+'</a><div class="bg-navy color-palette" id="submenus'+datos[1][i]['id']+'" style="display:none"></div><input type="hidden" id="activo'+datos[1][i]['id']+'" value=0 />');
            }
          }
          $('#ver_submenus').modal();
        }
        else
        {

        }
      }
    });
   
}

$(document).ready(function()
{
  $('#empresa').change(function()
  {
    var id_emp=$('#empresa').val();
    $('#input-depto').slideUp();
    $('#input-rol').slideUp();
    $("#depto").find('option').remove();
    $("#rol").find('option').remove();
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
                
                $("#depto").append('<option value="0">Seleccione un Departamento...</option>');
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

  $('#depto').change(function()
  {
    var id_depto=$('#depto').val();
    $('#input-rol').slideUp();
    $("#rol").find('option').remove();
    if(id_depto>0)
    {
      $.ajax({
            url: '{{url()}}/get_roles',
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{dpto:id_depto},
            success:function(data)
            {
              if(data!=0)
              {
                var datos=JSON.parse(data);
                
                $("#rol").append('<option value="0">Seleccione un Rol...</option>');
                for(var i=0;i<datos.length;i++)
                { 
                $("#rol").append('<option value="' + datos[i]['id'] + '">' + datos[i]['nombre'] + '</option>');
                }
                $('#input-rol').slideDown();
              }
              else
              {

              }
            }
          });
    }
  });

  $('#rol').change(function()
  {
    var id_rol=$('#rol').val();
    $('#permisos').attr('style','display:none');
    $('#permisos-body').html('');
    if(id_rol>0)
    {
       $.ajax({
            url: '{{url()}}/get_permisos_rol',
            type: 'POST',
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{rol:id_rol},
            success:function(data)
            {

              if(data!=0)
              {

                var datos=JSON.parse(data);

                for(var i=0;i<datos[0].length;i++)
                {
                  $('#permisos-body').append('<a class="btn btn-app bg-red" onclick=ver_hijos('+datos[0][i]['id']+')><i class="'+datos[0][i]['clase']+'"></i> '+datos[0][i]['nombre']+'</a>');
                }
              $('#permisos').attr('style','display:');
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