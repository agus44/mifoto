<div class="container">
<center>
<h2>Editar Orden de Compra</h2>

<input type="hidden" class="form-control" id="iva_global"  value="<?=$iva;?>"/>
 <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
          <label class="control-label">N° Orden de Compra</label>
          <div class="col-lg-5 col-md-5 col-sm-5 input-group" style="margin-bottom: 25px">
          	<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
            <input type="text" class="form-control requerido" id="oc" name="oc" placeholder="N° Orden de Compra"/>
          </div>
      </div>
 </div>
 <button type="button" class="btn btn-success" id="buscar" name="buscar">
    <span class="glyphicon glyphicon-search"></span>  Buscar
 </button>
 <br><br>
</center>
</div>

<div class="container-fluid" id="nuevo" style="display:none">
<div class="container-fluid" id="nuevo1">

</div>
<HR class="style17" width="100%">
<center> 
<h4>Agregar Productos</h4><br>
 </center>
    <div class="row">
    <div class="col-sm-6 col-lg-2">
      <div class="col-lg-12 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
          <input type="text" class="form-control" id="codigo_prod" placeholder="Código de Producto" />
      </div>
    </div>
    <div class="col-sm-6 col-lg-2">
      <div class="col-lg-122 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-shopping-cart"></i></span>
          <input type="text" class="form-control" id="producto" name="producto" placeholder="Nombre de Producto"/>
      </div>
    </div>
    <div class="col-sm-6 col-lg-2">
      <div class="col-lg-122 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-equalizer"></i></span>
          <input type="text" class="form-control" id="cantidad" placeholder="Cantidad"/>
      </div>
    </div>
    <div class="col-sm-6 col-lg-2">
      <div class="col-lg-122 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
          <input type="text" class="form-control" id="precio_unit" placeholder="Precio Unitario"/>
      </div>
    </div>
    <div class="col-sm-6 col-lg-2">
      <div class="col-lg-12 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-copy"></i></span>
          <input type="text" class="form-control" id="subtotal" placeholder="Subtotal"/>
      </div>
    </div>
    <div class="col-sm-6 col-lg-2">
      <div class="col-lg-12 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
          <input type="text" class="form-control" id="iva" placeholder="I.V.A" />
      </div>
    </div>

    <center>
    <button type="button" class="btn btn-primary" id="agregar" name="agregar">
                  <span class="glyphicon glyphicon-plus"></span>  Agregar
                  </button><br><br>
    </center>

    <HR class="style17" width="100%">   
     <center><h4>Productos Agregados</h4><br>
     <div class="container">
      <div class="row">
      <div class="table-responsive">
        <table id="detalle" width="auto"  class="table  table-bordered">
            <tr class="dark">
            <th>Código</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
            <th>I.V.A</th>
            <th>Eliminar</th>
          </tr>
          <tr class="ls"></tr>
        </table>
      </div>
      </div>
      </div>
 </center>

    </div>
</div>

<script>

function buscar_oc()
{
    var oc=$('#oc').val();
    var salida='';
    if(oc.length!=0)
    {

      $('#nuevo').slideUp();
      $("#detalle tr:gt(1)").remove();  
      $.ajax({
        type:"post",
        url:"<?php echo base_url();?>compras/buscar_oc3",
        data:{oc:oc},
        success:function(data)
        {
          var datos=data.split('///');
          if(datos[0]!='FALSE')
          { 

            var datosOC=datos[0].split(':::');
            var cont1=datosOC[0];
            var i=1;
            for(ciclos=1;ciclos<=cont1;ciclos++)
            {
              var orden=datosOC[i];i++;
              var rut=datosOC[i];i++;
              var dir=datosOC[i];i++;
              var prov=datosOC[i];i++;
              var contact=datosOC[i];i++;
              var resp=datosOC[i];i++;
              var fecha=datosOC[i];i++;

              var f=fecha.split('-');
              fecha=f[2]+'-'+f[1]+'-'+f[0];

              var gerencia=datosOC[i];i++;
              var c1=datosOC[i];i++;
              var c2=datosOC[i];i++;
              var c3=datosOC[i];i++;
              var c4=datosOC[i];i++;
              var c5=datosOC[i];i++;
              var depto=datosOC[i];i++;
              var desc=datosOC[i];i++;
              var moneda=datosOC[i];i++;
              var forma=datosOC[i];i++;
            }

            salida+='<form  method="post" action="editar_orden" id="Form1" name="Form1"><input type="hidden" class="form-control" id="orden_compra" name="orden_compra" value="'+oc+'"/><div class="row"><div class="col-sm-6 col-lg-4"><label class="col-md-4 control-label">R.U.T </label>';
            salida+='<div class="col-md-6 input-group" style="margin-bottom: 25px"><span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>';
            salida+='<input type="text" class="form-control requerido" id="rut" name="rut" placeholder="R.U.T del Proveedor" value="'+rut+'" onfocusout="verificar_proveedor();"/></div></div>';
              
            salida+='<div class="col-sm-6 col-lg-4"><label class="col-md-4 control-label">Proveedor</label>';
            salida+='<div class="col-md-6 input-group" style="margin-bottom: 25px"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>';
            salida+='<input type="text" class="form-control requerido" id="nom_prov" name="nom_prov" placeholder="Nombre del Proveedor" value="'+prov+'"/></div></div>';

            salida+='<div class="col-sm-6 col-lg-4"><label class="col-md-4 control-label">Dirección</label>';
            salida+='<div class="col-md-6 input-group" style="margin-bottom: 25px"><span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>';
            salida+='<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección del Proveedor" value="'+dir+'"/></div></div>';
               
            salida+='<div class="col-sm-6 col-lg-4"><label  class="col-md-4 control-label">Contacto</label>';
            salida+='<div class="col-md-6 input-group" style="margin-bottom: 25px"><span class="input-group-addon"><i class="glyphicon glyphicon-hand-right"></i></span>';
            salida+='<input type="text" class="form-control" id="at" name="at" placeholder="Contacto del proveedor" value="'+contact+'"/></div></div>';

            salida+='<div class="col-sm-6 col-lg-4"><label  class="col-md-4 control-label">Responsable</label>';
            salida+='<div class="col-md-6 input-group" style="margin-bottom: 25px"><span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>';
            salida+='<select class="form-control requerido" id="responsable" name="responsable"><option value="">Seleccione...</option>';

                    var datosUs=datos[1].split(':::');
                    var t=1;
                    var cont2=datosUs[0];
             
                    for(ciclos2=1;ciclos2<=cont2;ciclos2++)
                    {
                      var id_user=datosUs[t];t++;
              var name_user=datosUs[t];t++;

              if(name_user==resp)
              {
                  salida+='<option value="'+id_user+'" selected>'+name_user+'</option>';
              }
              else
              {
                  salida+='<option value="'+id_user+'">'+name_user+'</option>';
              }
                    }

                    salida+='</select></div></div>';
            salida+='<div class="col-sm-6 col-lg-4"><label class="col-md-4 control-label">Fecha</label>';         
                salida+='<div class="col-md-6 input-group input-append date" style="margin-bottom: 25px" data-provide="datepicker" date-format="dd-mm-yyyy">';
                  salida+='<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span><input type="text" class="form-control requerido" id="fecha" name="fecha" value="'+fecha+'" readonly/></div></div>';
                  
                  salida+='<div class="col-sm-6 col-lg-4"><label class="col-md-4 control-label">¿Autorización de Gerencia?</label><div class="col-md-6 input-group" style="margin-bottom: 25px">';
                  salida+='<span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span><select class="form-control requerido" id="aut" name="aut">';
                salida+='<option value="">Seleccione...</option>';

                if(gerencia=='SI')
                {
                salida+='<option value="0">No</option><option value="1" selected>Si</option></select></div></div>';
                }
                else
                {
                salida+='<option value="0" selected>No</option><option value="1" selected>Si</option></select></div></div>';
                } 
                
                  salida+='<div class="col-sm-6 col-lg-4"><label class="col-md-4 control-label">Departamento</label>';
                  salida+='<div class="col-md-6 input-group" style="margin-bottom: 25px"><span class="input-group-addon"><i class="glyphicon glyphicon-tower"></i></span>';
                  salida+='<select class="form-control requerido" id="departamento" name="departamento"><option value="">Seleccione...</option>';
                  
                  var datosDepto=datos[2].split(':::');
                    var r=1;
                    var cont3=datosDepto[0];
             
                    for(ciclos3=1;ciclos3<=cont3;ciclos3++)
                    {
                      var id_depto=datosDepto[r];r++;
                      var n_depto=datosDepto[r];r++;

                      if(n_depto==depto)
                      {
                        salida+='<option value="'+id_depto+'" selected>'+n_depto+'</option>';   
                      }
                      else
                      {
                        salida+='<option value="'+id_depto+'">'+n_depto+'</option>';
                      }
                    }

                    salida+='</select></div></div>';

                    salida+='<div class="col-sm-6 col-lg-4"><label class="col-md-4 control-label">Descuento</label>';
                    salida+='<div class="col-md-6 input-group" style="margin-bottom: 25px"><span class="input-group-addon"><i class="glyphicon glyphicon-sort-by-attributes-alt"></i></span>';
                    salida+='<input type="number" class="form-control" id="descuento" name="descuento" /></div></div>';
                    
                    salida+='<div class="col-sm-6 col-lg-4"><label class="col-md-4 control-label">Moneda</label>';
                    salida+='<div class="col-md-6 input-group" style="margin-bottom: 25px"><span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>';
                    salida+='<select class="form-control requerido" id="moneda" name="moneda"><option value="">Seleccione...</option>';

                    var datosMonedas=datos[3].split(':::');
                    var t=1;
                    var cont5=datosMonedas[0];

                    for(ciclos5=1;ciclos5<=cont5;ciclos5++)
                    {
                      var id_moneda=datosMonedas[t];t++;
                      var nom_moneda=datosMonedas[t];t++;

                      if(moneda==nom_moneda)
                      {
                        salida+='<option value="'+id_moneda+'" selected>'+nom_moneda+'</option>';   
                      }
                      else
                      {
                        salida+='<option value="'+id_moneda+'">'+nom_moneda+'</option>';
                      }
                    }

                    salida+='</select></div></div>';

                    salida+='<div class="col-sm-6 col-lg-4"><label class="col-md-4 control-label">Forma de Pago</label>';
                    salida+='<div class="col-md-6 input-group" style="margin-bottom: 25px"><span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>';
                    salida+='<select class="form-control requerido" id="forma_pago" name="forma_pago"><option value="">Seleccione...</option>';

                    var datosFormas=datos[4].split(':::');
                    var e=1;
                    var cont6=datosFormas[0];

                    for(ciclos6=1;ciclos6<=cont6;ciclos6++)
                    {
                      var id_forma=datosFormas[e];e++;
                      var nom_forma=datosFormas[e];e++;

                      if(forma==nom_forma)
                      {
                        salida+='<option value="'+id_forma+'" selected>'+nom_forma+'</option>';   
                      }
                      else
                      {
                        salida+='<option value="'+id_forma+'">'+nom_forma+'</option>';
                      }
                    }
                    salida+='</select></div></div>';

                    salida+='<div class="col-sm-6 col-lg-4"><label class="col-md-4 control-label">Observaciones</label>';
                    salida+='<div class="col-md-6 input-group" style="margin-bottom: 25px"><span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>';
                    salida+='<textarea class="form-control" id="observaciones" name="observaciones" rows="4">'+c1+' '+c2+' '+c3+' '+c4+' '+c5+'</textarea></div></div></div>';
                
                salida+='<center><button type="button" class="btn btn-primary" id="Editar" name="Editar" onclick="validacion();">';
                salida+='<span class="glyphicon glyphicon-pencil"></span>  Editar Orden de Compra</button><br></center>'; 
              
            $('#nuevo1').html(salida);

            var datosDet=datos[5].split(':::');
            var x=1;
            var cont4=datosDet[0];
            var iva=$('#iva_global').val();
            for(ciclos4=1;ciclos4<=cont4;ciclos4++)
            {
              var id=datosDet[x];x++;
              var codigo=datosDet[x];x++;
              var producto=datosDet[x];x++;
              var cantidad=datosDet[x];x++;
              var precio_unit=datosDet[x];x++;
              var subtotal=cantidad*precio_unit;
              var iva_parcial=(subtotal*(iva/100));

              salidadet='<tr><td><input type="text" id="Acod[]" name="Acod[]" value="'+codigo+'" readonly/></td><td><input type="text" class="CantArticulos" id="Aprod[]" name="Aprod[]" value="'+producto+'" readonly/></td><td><input type="text" id="Acant[]" name="Acant[]" value="'+cantidad+'" readonly/></td><td><input type="text" id="Apunit[]" name="Apunit[]" value="'+precio_unit+'" readonly/></td><td><input type="text" id="Asub[]" name="Asub[]" value="'+subtotal+'" readonly/></td><td><input type="text" id="Aiva[]" name="Aiva[]" value="'+iva_parcial+'" readonly/></td><td><button type="button" class="btn btn-danger sweet-11 eliminar-ls" id="eliminar" name="eliminar" onclick="eliminarDet('+id+');"><span class="glyphicon glyphicon-remove"></span>Eliminar</button></td></tr>'
              
              $('#detalle .ls:last').after(salidadet);
            }
            $('#nuevo').slideDown();
          }
          else
          {
            swal("Aviso", "No se ha encontrado dicha orden de compra, por favor verifique el número e inténtelo de nuevo", "error");
          }
        }
      });
    } 
}
function eliminarDet(id)
{
  $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>compras/eliminarDetOc",
      data:{id:id},
      success:function(data)
      {
        var RESdata=data.split(':::');
        if(RESdata[0]!='ERROR')
        {
          buscar_oc();
        }
        else
        {
          swal("Aviso", "Problemas al eliminar el detalle de la orden de compra, por favor inténtelo nuevamente", "error");
        }
      }

  });
}
function verificar_proveedor()
{
  var rut=$('#rut').val();

  $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>compras/verificar_proveedor",
      data:{rut:rut},
      success:function(data)
      {
        var x=JSON.parse(data);
        if(x!=false)
        {
          var nom=x[0]['a'];
          var dir=x[0]['direccion_proveedor'];
          var con=x[0]['at'];
          var orden=x[0]['orden_de_compra'];
          $('#nom_prov').val(nom);
          $('#direccion').val(dir);
          $('#at').val(con);
          $('#orden_compra').val(orden);
        }
        else
        {
           swal("Proveedor No Encontrado", "El rut del proveedor no ha sido registrado anteriormente, por favor ingrese los datos necesarios.", "info");
        }
      }
  });
}

function validacion()
{
  var errores = 0;
    $('.requerido').each(function()
    {
      if($.trim($(this).val())=="")
      {
        $(this).addClass('rellenar');
        errores++;
      }
      else
      {
        $(this).removeClass('rellenar');
      }             
    });

  if(errores==0)
 {
    var contador=0;
    
     $('.CantArticulos').each(function()
         {
          var valor=$(this).val();
          if(valor!=0)
          {

            contador++;
          }
         
         });
    if(contador==0)
    {
      swal("Aviso", "Debe ingresar a lo menos un articulo en la orden de compra", "error");
    }
    else
    {
      $('#Form1').submit();
    }
 }
 else
 {
  swal("Campos Faltantes", "Debe ingresar los campos obligatorios", "info");
 }
}

$(document).ready(function()
{

  $('#agregar').click(function()
  {
    var oc=$('#oc').val();
    var codigo=$('#codigo_prod').val();
    var prod=$('#producto').val();
    var cantidad=$('#cantidad').val();
    var precio_unit=$('#precio_unit').val();
    var subtotal=$('#subtotal').val();
    var iva=$('#iva').val();
   // var descuento=$('#descuento').val();
   
      if(prod=='')
      {
        $('#producto').focus();
        swal("Aviso", "Debe ingresar el nombre del producto", "error");
      }
      else
      {
        if(cantidad=='' || cantidad==0)
        {
          $('#cantidad').focus();
          swal("Aviso", "Debe ingresar una cantidad mayor a cero", "error");
        }
        else
        {
          if(precio_unit=='' || precio_unit==0)
          {
            $('#precio_unit').focus();
            swal("Aviso", "Debe ingresar el precio unitario del artículo", "error");
          }
          else
          {
            if(subtotal=='' || subtotal==0)
            {
              $('#subtotal').focus();
              swal("Aviso", "Debe ingresar el subtotal del artículo", "error");
            }
            else
            {
                $.ajax({
                  type:"POST",
                  url:"<?php echo base_url();?>compras/agregar_DETOC",
                  data:{oc:oc,codigo:codigo,prod:prod,cantidad:cantidad,precio_unit:precio_unit},
                  success:function(data)
                  {
                      var resp=data.split(':::');
                      if(resp[0]!='ERROR')
                      {
                        buscar_oc();
                      }
                      else
                      {
                        swal("Aviso", "Problemas al guardar el producto en la orden de compra, por favor inténtelo nuevamente", "error");
                      }

                  }
                });
            }
          }
        }
      }

    

   
    //$("#detalle > tbody").append(salida);
  });

	/************Eventos Keydown***********************************/
  $('#codigo_prod').keydown(function(event)
  { 
    var codigo=$('#codigo_prod').val();
    if (event.which == '13')
    {
      var orden=$('#orden_compra').val();
      $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>compras/buscar_compras",
          data:{orden:orden,codigo:codigo},
          success:function(data)
          {
            var datos=JSON.parse(data);
            if(datos!=false)
            {
            var iva_aux=$('#iva_global').val();
            var nombre=datos[0]['descripcion'];
            var cantidad=datos[0]['cantidad'];
            var precio_unit=datos[0]['precio_unit'];
            var subtotal=cantidad*precio_unit;
            var iva=(subtotal*(iva_aux/100));
            $('#producto').val(nombre);
            $('#cantidad').val(cantidad);
            $('#precio_unit').val(precio_unit);
            $('#subtotal').val(subtotal);
            $('#iva').val(iva);
            $('#agregar').focus();
            }
            else
            {
              $('#producto').focus();
            }
          }
      });

      
    }
    else if (event.which == '9') 
    {
      return false;
    }
  });

  $('#producto').keydown(function(event)
  { 
    if (event.which == '13')
    {
      $('#cantidad').focus();
    }
    else if (event.which == '9') 
    {
      return false;
    }
  });

  $('#cantidad').keydown(function(event)
  { 
    if (event.which == '13')
    {
      var cantidad=$('#cantidad').val();
      var precio_unit=$('#precio_unit').val();

      if(precio_unit=='')
      {
        precio_unit=0;
      }

      if(cantidad=='')
      {
        cantidad=0;
      }
      total=cantidad*precio_unit;
      iva_aux=($('#iva_global').val())/100;
      iva=total*iva_aux;
      $('#subtotal').val(total);
      $('#iva').val(iva);
      $('#precio_unit').focus();
    }
    else if (event.which == '9') 
    {
      return false;
    }
  });

  $('#precio_unit').keydown(function(event)
  { 
    if (event.which == '13')
    {
      var cantidad=$('#cantidad').val();
      var precio_unit=$('#precio_unit').val();

      if(precio_unit=='')
      {
        precio_unit=0;
      }

      if(cantidad=='')
      {
        cantidad=0;
      }
      total=cantidad*precio_unit;
      iva_aux=($('#iva_global').val())/100;
      iva=total*iva_aux;
      $('#subtotal').val(total);
      $('#iva').val(iva);
      $('#subtotal').focus();
    }
    else if (event.which == '9') 
    {
      return false;
    }
  });

  $('#subtotal').keydown(function(event)
  { 
    if (event.which == '13')
    {
      var cantidad=$('#cantidad').val();
      var precio_unit=$('#precio_unit').val();

      if(precio_unit=='')
      {
        precio_unit=0;
      }

      if(cantidad=='')
      {
        cantidad=0;
      }
      total=cantidad*precio_unit;
      iva_aux=($('#iva_global').val())/100;
      iva=total*iva_aux;
      $('#subtotal').val(total);
      $('#iva').val(iva);
      $('#iva').focus();
    }
    else if (event.which == '9') 
    {
      return false;
    }
  });

/**********************************************************/

	$('#buscar').click(function()
	{
		buscar_oc();
	});

});
</script>