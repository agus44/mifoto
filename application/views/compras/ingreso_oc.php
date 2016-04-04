<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
hr {border: 2px inset #eee; height: 1px; width: 100%;}
</style>
<div class="container-fluid">
 
<center>
	    <h3>Ingreso Orden de Compra</h3><br><br>
      <input type="hidden" class="form-control" id="iva_global"  value="<?=$iva;?>"/>
      <input type="hidden" class="form-control" id="orden_compra"/>
<form  method="post" action="guardar_oc" id="Form1" name="Form1">
    <div class="row">
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">R.U.T </label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
          	<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
            <input type="text" class="form-control requerido" id="rut" name="rut" placeholder="R.U.T del Proveedor" onfocusout="verificar_proveedor();"/>
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">Proveedor</label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control requerido" id="nom_prov" name="nom_prov" placeholder="Nombre del Proveedor" />
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">Dirección</label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección del Proveedor"/>
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label  class="col-md-4 control-label">Contacto</label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
            <span class="input-group-addon"><i class="glyphicon glyphicon-hand-right"></i></span>
            <input type="text" class="form-control" id="at" name="at" placeholder="Contacto del proveedor"/>
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label  class="col-md-4 control-label">Responsable</label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
          <select class="form-control requerido" id="responsable" name="responsable">
            <option value="">Seleccione...</option>
            <?php
            foreach($users_compras as $row_users)
            {?>
            <option value="<?=$row_users->id?>"><?=$row_users->nombre?></option>

            <?php
            }
            ?>
          </select>
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">Fecha</label>
          <div class="col-md-6 input-group input-append date" style="margin-bottom: 25px" data-provide="datepicker" date-format="dd-mm-yyyy">
          	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input type="text" class="form-control requerido" id="fecha" name="fecha" value="<?=date('d-m-Y')?>"/>
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">¿Autorización de Gerencia?</label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
          <select class="form-control requerido" id="aut" name="aut">
            <option value="">Seleccione...</option>
            <option value="0">No</option>
            <option value="1">Si</option>
          </select> 
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">Departamento</label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-tower"></i></span>
          <select class="form-control requerido" id="departamento" name="departamento">
            <option value="">Seleccione...</option>
            <?php
            foreach($departamentos as $row_dpto)
            {?>
            <option value="<?=$row_dpto->id?>"><?=$row_dpto->departamento?></option>
          <?php
            }
            ?>
          </select> 
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">Descuento</label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-sort-by-attributes-alt"></i></span>
          <input type="number" class="form-control" id="descuento" name="descuento" />
          </textarea>
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">Moneda</label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
          <select class="form-control requerido" id="moneda" name="moneda">
            <option value="">Seleccione...</option>
            <?php
            foreach($monedas as $row_money)
            {?>
            <option value="<?=$row_money->id?>"><?=$row_money->moneda?></option>
          <?php
            }
            ?>
          </select> 
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">Forma de Pago</label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-credit-card"></i></span>
          <select class="form-control requerido" id="forma_pago" name="forma_pago">
            <option value="">Seleccione...</option>
            <?php
            foreach($forma_pago as $row_forma)
            {?>
            <option value="<?=$row_forma->id_pago?>"><?=$row_forma->forma_pago?></option>
          <?php
            }
            ?>
          </select> 
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">Observaciones</label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
          <span class="input-group-addon"><i class="glyphicon glyphicon-eye-open"></i></span>
          <textarea class="form-control" id="observaciones" name="observaciones" rows="4" onkeypress="return event.keyCode!=13">
          </textarea>
          </div>
      </div>
    </div>
    <center>
     <button type="button" class="btn btn-primary" id="Guardar" name="Guardar">
                  <span class="glyphicon glyphicon-floppy-disk"></span>  Guardar Orden de Compra
                  </button><br>
    </center>
    <br> 
         <h4>Agregar Productos</h4><br>
    
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
 
    </div>
     <HR class="style17" width="100%">   
      <h4>Productos Agregados</h4><br>
      <div class="row">
      <div class="table-responsive">
        <table id="detalle" width="100%"  class="table  table-bordered">
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
  </form>
</center> 
</div>

<script>

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
  /******************************************************************************/

  /******************************************************************************/
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
function limpiar_add()
{
  $('#codigo_prod').val('');
  $('#producto').val('');
  $('#cantidad').val('');
  $('#precio_unit').val('');
  $('#subtotal').val('');
  $('#iva').val('');
  $('#codigo_prod').focus();
}
$(document).ready(function()
{
  $('#rut').Rut();
  $('#fecha').datepicker({
    format: 'dd-mm-yyyy'
  });


  $('#agregar').click(function()
  {
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
                if(iva=='' || iva==0)
                {
                   $('#iva').focus();
                  swal("Aviso", "Debe ingresar el iva total del articulo", "error");
                }
                else
                {
                   var salida='<tr><td><input type="hidden" id="Acod[]" name="Acod[]" value="'+codigo+'"/><input type="hidden" class="CantArticulos" id="Aprod[]" name="Aprod[]" value="'+prod+'"/><input type="hidden" id="Acant[]" name="Acant[]" value="'+cantidad+'"/><input type="hidden" id="Apunit[]" name="Apunit[]" value="'+precio_unit+'"/><input type="hidden" id="Asub[]" name="Asub[]" value="'+subtotal+'"/><input type="hidden" id="Aiva[]" name="Aiva[]" value="'+iva+'"/>'+codigo+'</td><td>'+prod+'</td><td>'+cantidad+'</td><td>'+precio_unit+'</td><td>'+subtotal+'</td><td>'+iva+'</td><td><button type="button" class="btn btn-danger sweet-11 eliminar-ls" id="eliminar" name="eliminar"><span class="glyphicon glyphicon-remove"></span>Eliminar</button></td></tr>';
                   $('#detalle .ls:last').after(salida);
                   $('.eliminar-ls').click(function()
                   {
                    $(this).closest('tr').remove();
                   });
                   limpiar_add();
                }
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
  $('#Guardar').click(function()
  {
    validacion();
  });
});


</script>