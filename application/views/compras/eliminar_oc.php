<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container">
<center>
<h2>Eliminar Orden de Compra</h2>
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
 </button><br><br>
</center>
</div>
<div class="container-fluid" id="panelfb" style="display:none">
    
</div>
<script>
function eliminarOC(id)
{
	swal({
      title: "¿Estas seguro que quieres eliminar la Orden de Compra N° "+id+"?",
      text: "Se eliminará la Orden por completo",
      type: "info",
      showCancelButton: true,
      confirmButtonClass: 'btn-info',
      confirmButtonText: 'Eliminar',
      cancelButtonText: 'Cancelar',
      closeOnConfirm: false,
      
    },
    function(isConfirm) {
        if (isConfirm) {
        $.ajax({
			type:"post",
			url:"<?php echo base_url();?>compras/eliminarOrden",
			data:{oc:id},
			success:function(data)
			{
				var resp=data.split(':::');

				if(resp[0]!='ERROR')
				{
					 var salida1='';
					 $('#panelfb').html(salida1);
				     $('#panelfb').slideUp();
					 swal("Borrado", "La Orden de Compra ha sido eliminada correctanente", "success");
				}
				else
				{
					swal("Error", "La Orden de Compra no ha sido eliminada, por favor inténtelo nuevamente", "error");
				}
			}
		});
        } 
      });
	/*$.ajax({
		type:"post"
		url:"<?php echo base_url();?>compras/eliminarOrden",
		data:{oc:id},
		success:function(data)
		{

		}
	});*/

}
$(document).ready(function()
{
	$('#buscar').click(function()
	{
		var oc=$('#oc').val();

		if(oc.length!=0)
		{
			var salida1='';
			$('#panelfb').html(salida1);
		    $('#panelfb').slideUp();
			$.ajax({
				type:"post",
				url:'<?php echo base_url();?>compras/buscar_oc2',
				data:{oc:oc},
				success:function(data)
				{
					var datos=JSON.parse(data);

					if(datos!=false)
					{
						salida1+='<div class="fb-profile"><img align="left" class="fb-image-lg" src="<?php echo base_url(); ?>images/compra_oc2.jpg" alt="Profile image example"/><img align="left" class="fb-image-profile thumbnail" src="<?php echo base_url(); ?>images/compra_oc1.jpg" alt="Profile image example"/><div class="fb-profile-text"><h1>Orden de Compra N° '+datos[0]['orden_de_compra']+'</h1></div></div> <button type="button" class="btn btn-danger" id="eliminar" name="eliminar" onClick="eliminarOC('+datos[0]['orden_de_compra']+')"><span class="glyphicon glyphicon-trash"></span>  Eliminar</button><br><br><div class="container"><div class="table-responsive"><table width="100%"  class="table  table-bordered"><tr class="dark"><th>R.U.T Proveedor</th><th>Nombre Proveedor</th><th>Direccion</th><th>Contacto</th></tr><tr><td>'+datos[0]['rut_proveedor']+'</td><td>'+datos[0]['a']+'</td><td>'+datos[0]['direccion_proveedor']+'</td><td>'+datos[0]['at']+'</td></tr><tr class="dark"><th>Fecha</th><th>¿Necesita Autorización?</th><th>Departamento</th><th>Descuento</th></tr><tr><td>'+datos[0]['Fecha']+'</td><td>'+datos[0]['Gerencia']+'</td><td>'+datos[0]['Departamento']+'</td><td>'+datos[0]['descuento']+'</td></tr><tr class="dark"><th colspan="4" >Responsable</th></tr><tr><td colspan="4">'+datos[0]['De']+'</td></tr><tr class="dark"><th colspan="4">Observación</th></tr><tr><td colspan="4">'+datos[0]['Comentario']+'</td></tr></table></div>';

						$.ajax({
							type:"post",
								url:'<?php echo base_url();?>compras/buscar_ocDET',
								data:{oc:oc},
								success:function(data)
								{
									var det=JSON.parse(data);
									if(det!=false)
									{
										salida1+='  <h3>Detalle de Productos</h3><div class="table-responsive"><table width="100%"  class="table  table-bordered"><tr class="dark"><th>Código</th><th>Producto</th><th>Cantidad</th><th>Precio Unitario</th></tr>';

										for(var i=0;i<det.length;i++)
										{
											if(i%2==0)
											{
												salida1+='<tr class="par">';
											}
											else
											{
												salida1+='<tr>';
											}

											salida1+='<td>'+det[i]['codigo']+'</td><td>'+det[i]['Descripcion']+'</td><td>'+det[i]['cantidad']+'</td><td>'+det[i]['precio_unit']+'</td></tr>';
										}
         								$('#panelfb').html(salida1);
									}
									else
									{

									}
								}
						});

						
					    $('#panelfb').slideDown();
					}
					else
					{
						swal("Aviso", "No se ha encontrado dicha orden de compra, por favor verifique el número e inténtelo de nuevo", "error");
					}
				}
			});
		}
		else
		{
			swal("Aviso", "Debe ingresar el número de la Orden de Compra a eliminar", "info");
		}
	});
});
</script>