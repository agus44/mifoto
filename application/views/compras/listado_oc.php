<div class="container">
<center>
	<h3>Buscar Ordenes de compra</h3><br><br>
</center>
  <div class="row">
       <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">Fecha Desde</label>
          <div class="col-md-6 input-group input-append date" style="margin-bottom: 25px" data-provide="datepicker" date-format="dd-mm-yyyy">
          	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input type="text" class="form-control requerido" id="fecha1" name="fecha1" value="<?=date('01-m-Y')?>"/>
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">Fecha Hasta</label>
          <div class="col-md-6 input-group input-append date" style="margin-bottom: 25px" data-provide="datepicker" date-format="dd-mm-yyyy">
          	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
            <input type="text" class="form-control requerido" id="fecha2" name="fecha2" value="<?=date('d-m-Y')?>"/>
          </div>
      </div>
      <div class="col-sm-6 col-lg-4">
          <label class="col-md-4 control-label">R.U.T Proveedor</label>
          <div class="col-md-6 input-group" style="margin-bottom: 25px">
          	<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
            <input type="text" class="form-control requerido" id="rut" name="rut" placeholder="R.U.T"/>
          </div>
      </div>
   </div>
   <center>
     <button type="button" class="btn btn-primary" id="Buscar" name="Buscar">
                  <span class="glyphicon glyphicon-search"></span>  Buscar Ordenes
     </button>
     <button type="button" class="btn btn-success" id="Excel" name="Excel">
                  <span class="glyphicon glyphicon-save-file"></span>  Generar Excel
     </button><br>
    </center><br><br>


    <div class="table-responsive" style="display:none" id="tabla_list">
    	<center><h3>Listado Ordenes de compra</h3></center><br>
    	 <table id="listado" width="100%"  class="table  table-bordered">
            <tr class="dark">
            <th>N° OC</th>
            <th>R.U.T Proveedor</th>
            <th>Nombre Prov.</th>
            <th>Contacto</th>
            <th>Responsable</th>
            <th>Fecha</th>
            <th>Departamento</th>
            <th>Descuento</th>
            <th>Ver</th>
            <th>¿Autorización?</th>
            <th>Observaciones</th>
          </tr>
          <tr class="ls"></tr>
        </table>
    </div>
</div>

<script>
function verOC(id)
{
	window.open('<?php echo base_url();?>compras/verOC/'+id,'_self')
}
$(document).ready(function()
{
  $('#rut').Rut();
  $('#fecha1').datepicker({
    format: 'dd-mm-yyyy'
  });
  $('#fecha2').datepicker({
    format: 'dd-mm-yyyy'
  });

  $('#Buscar').click(function()
  {
  	$("#tabla_list tr:gt(1)").remove();
  	var f1=$('#fecha1').val();
  	var f2=$('#fecha2').val();
  	var rut=$('#rut').val();
	$('#tabla_list').slideUp();
	  $.ajax({
	  		type:"POST",
	  		url:"<?php echo base_url();?>compras/buscar_oc",
	  		data:{f1:f1,f2:f2,rut:rut},
	  		success:function(data)
	  		{
	  			var datos=JSON.parse(data);

	  			if(datos!=false)
	  			{
	  				var cantidad=datos.length;
	  				for(var i=0;i<cantidad;i++)
	  				{
	  					var oc=datos[i]['orden_de_compra'];
	  					var rut=datos[i]['rut_proveedor'];
	  					var nombre=datos[i]['a'];
	  					var contacto=datos[i]['at'];
	  					var respon=datos[i]['De'];
	  					var fecha=datos[i]['Fecha'];
	  					var dpto=datos[i]['Departamento'];
	  					var descuento=datos[i]['descuento']+'%';
	  					var gerencia=datos[i]['Gerencia'];

	  					if(datos[i]['Comentario']==null)
	  					{
	  						datos[i]['Comentario']='';
	  					}

	  					if(datos[i]['Comentario2']==null)
	  					{
	  						datos[i]['Comentario2']='';
	  					}

	  					if(datos[i]['Comentario3']==null)
	  					{
	  						datos[i]['Comentario3']='';
	  					}

	  					if(datos[i]['Comentario4']==null)
	  					{
	  						datos[i]['Comentario4']='';
	  					}

	  					var obs=datos[i]['Comentario']+' '+datos[i]['Comentario2']+' '+datos[i]['Comentario3']+' '+datos[i]['Comentario4'];
	  					var f=fecha.split('-');
	  					fecha=f[2]+'-'+f[1]+'-'+f[0];

	  					if(i%2==0)
	  					{
	  					var salida='<tr class="par">';
	  					}
	  					else
	  					{
	  					var salida='<tr>';
	  					}

	  					salida+='<td style="text-align:center">'+oc+'</td><td>'+rut+'</td><td>'+nombre+'</td><td>'+contacto+'</td><td>'+respon+'</td><td style="text-align:center">'+fecha+'</td><td style="text-align:center">'+dpto+'</td><td style="text-align:center">'+descuento+'</td><td> <button type="button" class="btn btn-primary" id="buscar" name="buscar" onclick="verOC('+oc+')"><span class="glyphicon glyphicon-search"></span>  Ver</button></td><td style="text-align:center">'+gerencia+'</td><td>'+obs+'</td></tr>';
	  					 $('#listado .ls:last').after(salida);
	  				}
	  				$('#tabla_list').slideDown();
	  			}
	  			else
	  			{
	  				$('#tabla_list').slideUp();
	  				swal("Aviso", "No se han encontrado Ordenes de Compra para dicho filtro de búsqueda", "error");
	  			}
	  		}
	  });

  });

$('#Excel').click(function()
{
	var f1=$('#fecha1').val();
  	var f2=$('#fecha2').val();
  	var rut=$('#rut').val();

  	window.open('<?php echo base_url();?>compras/generarExcel/'+f1+'/'+f2,'_blank');
});

});
</script>