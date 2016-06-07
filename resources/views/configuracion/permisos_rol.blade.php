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
                <h3 class="box-title">Acceso a módulos</h3>
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
function buscar_permisos()
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
                   var class_aux="bg-red";
                   var estado=0;
                  if(datos[1])
                  {
                    for(var t=0;t<datos[1].length;t++)
                    {
                      if(datos[0][i]['id']==datos[1][t]['id'])
                      {
                       var class_aux="bg-green";
                       var estado=1;
                       break;
                      }
                    }
                  }
                  $('#permisos-body').append('<a class="btn btn-app '+class_aux+'" onclick=ver_hijos('+datos[0][i]['id']+')><i class="'+datos[0][i]['clase']+'"></i> '+datos[0][i]['nombre']+'</a><input type="hidden" name="estado'+datos[0][i]['id']+'" id="estado'+datos[0][i]['id']+'" value="'+estado+'" />');
                }
              $('#permisos').attr('style','display:');
              }
              else
              {

              }
            }
      });
    }
}

function actualizar_modulo_completo(id,accion,rol,depto,empresa)
{
  swal.close();
  $('#ver_submenus').modal('hide');
  $.ajax({
        url: '{{url()}}/actualizar_modulo_conhijos',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{menu:id,accion:accion,rol:rol,depto:depto,empresa:empresa},
        success:function(data) 
        {
            if(data!=0 || data!==false || data!=="")
            {
              if(accion==1)
              {
                var respuesta="El módulo ha sido activado correctamente";
              }
              else
              {
                var respuesta="El módulo ha sido desactivado correctamente";
              }
              swal("Permiso Actualizado", respuesta, "success");
              setTimeout(function(){ swal.close();
              buscar_permisos();
            }, 1500);
            }
            else
            {
              swal("Error", "Se ha producido un problema al actualizar el permiso, inténtelo nuevamente", "error");
            }
        }
        });

}

function actualizar_modulo_sinhijos(id,accion,rol,depto,empresa)
{
    swal.close();
    $('#ver_submenus').modal('hide');
    $.ajax({
        url: '{{url()}}/actualizar_modulo_sinhijos',
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{menu:id,accion:accion,rol:rol,depto:depto,empresa:empresa},
        success:function(data) 
        {
            if(data!=0 || data!==false || data!=="")
            {
              if(accion==1)
              {
                var respuesta="El módulo ha sido activado correctamente";
              }
              else
              {
                var respuesta="El módulo ha sido desactivado correctamente";
              }
              swal("Permiso Actualizado", respuesta, "success");
              setTimeout(function(){ swal.close();
              buscar_permisos();
            }, 1500);
            }
            else
            {
              swal("Error", "Se ha producido un problema al actualizar el permiso, inténtelo nuevamente", "error");
            }
        }
        });
  
}
function actualizar_modulo(id,accion)
{
  
  var tiene_hijos=$('#tiene_hijos').val();
  var rol=$('#rol').val();
  var depto=$('#depto').val();
  var empresa=$('#empresa').val();
  if(tiene_hijos==1)
  {
    if(accion==0)
    {
      var titulo="¿Desactivar módulo?";
      var texto='Debe seleccionar el tipo de desactivación antes de continuar<br><div onclick="actualizar_modulo_completo('+id+','+accion+','+rol+','+depto+','+empresa+');"><button class="btn btn-danger" style="background-color:#CC0000">Módulo Completo</button></div>&nbsp;&nbsp;<div onclick="actualizar_modulo_sinhijos('+id+','+accion+','+rol+','+depto+','+empresa+');"><button class="btn btn-primary" style="background-color:#3005AF" >Módulo sin componentes</button></div>';    
      var respuesta="El módulo ha sido desactivado correctamente";
    }
    else
    {
      var titulo="¿Activar módulo?";
      var texto='Debe seleccionar el tipo de activación antes de continuar<br><div onclick="actualizar_modulo_completo('+id+','+accion+','+rol+','+depto+','+empresa+');"><button class="btn btn-success" style="background-color:#00C92F">Módulo Completo</button></div>&nbsp;&nbsp;<div onclick="actualizar_modulo_sinhijos('+id+','+accion+','+rol+','+depto+','+empresa+');"><button class="btn btn-primary" style="background-color:#3005AF">Módulo sin componentes</button></div>';
      var respuesta="El módulo ha sido activado correctamente";
    }

    swal({  title: titulo,
                    text: texto,        
                    html: true,
                    showConfirmButton:false,
                    cancelButtonText: "Cerrar",
                    showCancelButton: true,   
                             
                });


  }
  else
  {
    if(accion==0)
    {
      var titulo="¿Desactivar módulo?";
      var texto="Se desactivará el módulo para todos los usuarios que pertenezcan al rol y a la empresa seleccionada";
      var acto="Desactivar";
      var respuesta="El módulo ha sido desactivado correctamente";
      var color="#CC0000";
    }
    else
    {
      var titulo="Activar módulo?";
      var texto="Se activará el módulo para todos los usuarios que pertenezcan al rol y a la empresa seleccionada";
      var acto="Activar";
      var respuesta="El módulo ha sido activado correctamente";
      var color="#00C92F";
    }
      swal({   title: titulo,   text: texto,   type: "info",   showCancelButton: true,   confirmButtonColor: color,   confirmButtonText: acto,   cancelButtonText: "Cancelar",   closeOnConfirm: false,   closeOnCancel: true },
      function(isConfirm)
      {   
          if (isConfirm) 
          {     
               actualizar_modulo_sinhijos(id,accion,rol,depto,empresa);
          }  
      });
  }
}

function ver_hijos2(id)
{
  var activado=$('#activo'+id).val();
  var rol=$('#rol').val();
  var depto=$('#depto').val();
  var empresa=$('#empresa').val();
  var sub_estado=$('#sub_estado'+id).val();
  if(activado==0)
  {
  $('#submenus'+id).html('');
   $.ajax({
      url: '{{url()}}/get_permisos_rol_hijos',
      type: 'POST',
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{menu:id,rol:rol,depto:depto,empresa:empresa},
      success:function(data)
      {
        if(data!=0)
        {
          var datos=JSON.parse(data);
            var sub="";
            if(sub_estado==1)
            {
              var subbutton='<button class="btn btn-danger" onclick="actualizar_modulo('+datos[0][0]['id']+',0)">Desactivar</button>';
            }
            else
            {
              var subbutton='<button class="btn btn-success" onclick="actualizar_modulo('+datos[0][0]['id']+',1)">Activar</button>';
            }
            $('#submenus'+id).append('<br><center><i class="'+datos[0][0]['clase']+'"></i>&nbsp;&nbsp;<strong>'+datos[0][0]['nombre']+'</strong>&nbsp;&nbsp;<input type="hidden" id="tiene_hijos" value=1 />'+subbutton+'</center>');
            if(datos[1]!="")
            {
              for(var i=0;i<datos[1].length;i++)
              {
                var sub_estado2=0;
                var class_estado="bg-red";
                if(datos[2]!="")
                {
                  for(var t=0;t<datos[2].length;t++)
                  {
                    if(datos[1][i]['id']==datos[2][t]['id'])
                    {
                      var sub_estado2=1;
                       var class_estado="bg-green";
                       break;
                    }
                  }
                }
                sub+='<a class="btn btn-app '+class_estado+'" onclick=ver_hijos2('+datos[1][i]['id']+')><i class="'+datos[1][i]['clase']+'"></i> '+datos[1][i]['nombre']+'</a><div class="bg-navy color-palette" id="submenus'+datos[1][i]['id']+'" style="display:none"></div><input type="hidden" id="activo'+datos[1][i]['id']+'" value=0 /><input type="hidden" id="sub_estado'+datos[1][i]['id']+'" value="'+sub_estado2+'" />';
                
              }
            }
            else
            {
               $('#submenus'+id).append('<br><div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i>Sin Submenús</h4>Estimado usuario, dicho menú no contiene sub-módulos, puede activar o desactivar el módulo de todos modos.</div>');
            }
            $('#submenus'+id).append(sub);
            $('#submenus'+id).slideDown();
            $('#activo'+id).val(1);

          
          
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
   var rol=$('#rol').val();
   var depto=$('#depto').val();
   var empresa=$('#empresa').val();
   var estado=$('#estado'+id).val();
   $.ajax({
      url: '{{url()}}/get_permisos_rol_hijos',
      type: 'POST',
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{menu:id,rol:rol,depto:depto,empresa:empresa},
      success:function(data)
      {
        if(data!=0)
        {
          var datos=JSON.parse(data);

          if(estado==0)
          {
            var button='<button class="btn bg-green"  onclick="actualizar_modulo('+id+',1)"><i class="fa fa-check"></i> Activar</button>';
          }
          else
          {
            var button='<button class="btn bg-red" onclick="actualizar_modulo('+id+',0)"><i class="fa fa-close"></i> Desactivar</button>';
          }

          $('#titulo-submenus').append(datos[0][0]['nombre']+'&nbsp;&nbsp;'+button);

          if(datos[1]!="")
          {
             $('#titulo-submenus').append('<input type="hidden" id="tiene_hijos" value=1 />');
            for(var i=0;i<datos[1].length;i++)
            {
              var class_estado="bg-red";
              var sub_estado=0;
              if(datos[2]!="")
              {
                for(var t=0;t<datos[2].length;t++)
                {
                  if(datos[1][i]['id']==datos[2][t]['id'])
                  {
                     var class_estado="bg-green";
                     var sub_estado=1;
                     break;
                  }
                }
              }
              $('#submenu-body').append('<a class="btn btn-app '+class_estado+'" onclick=ver_hijos2('+datos[1][i]['id']+')><i class="'+datos[1][i]['clase']+'"></i> '+datos[1][i]['nombre']+'</a><div class="bg-navy color-palette" id="submenus'+datos[1][i]['id']+'" style="display:none"></div><input type="hidden" id="activo'+datos[1][i]['id']+'" value=0 /><input type="hidden" id="sub_estado'+datos[1][i]['id']+'" value="'+sub_estado+'" />');
            }
          }
          else
          {
            $('#titulo-submenus').append('<input type="hidden" id="tiene_hijos" value=0 />');
             $('#submenu-body').append('<div class="alert alert-danger alert-dismissible"><h4><i class="icon fa fa-ban"></i>Sin Submenús</h4>Estimado usuario, dicho menú no contiene sub-módulos, puede activar o desactivar el módulo de todos modos.</div>');
          }
          $('#ver_submenus').modal();
        }
        else
        {/*
            var datos=JSON.parse(data);

            if(estado==0)
            {
              var button='<button class="btn btn-warning" disabled >Desactivado</button>';
            }
            else
            {
              var button='<button class="btn btn-info" disabled>Activado</button>';
            }

            $('#titulo-submenus').append(datos[0][0]['nombre']+'&nbsp;&nbsp;'+button);
            $('#submenu-body').append('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button><h4><i class="icon fa fa-ban"></i>Sin Submenús</h4>Estimado usuario, dicho menú no contien sub-módulos</div>');
            $('#ver_submenus').modal();*/
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
    buscar_permisos();
  });
});


</script>
@include('footer')