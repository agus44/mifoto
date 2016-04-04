<?php
foreach($estructura as $dato)
{
	$niveles=$dato->niveles;
	$columnas=$dato->columnas;
	$bodega=$dato->bodega;
	$rack=$dato->rack;
	$niveles_pick=$dato->niveles_picking;
	if($bodega==1000)
	{
		$sub=1;
	}

	if($bodega==2000)
	{
		$sub=2;
	}

	if($bodega==3000)
	{
		$sub=3;
	}

	if($bodega==4000)
	{
		$sub=4;
	}


	if($rack<10)
	{
		$subrak='0'.$rack;
	}
	else
	{
		$subrak=$rack;
	}
}
?>


<div class="container">
<center>
<h3>Bodega <?=$bodega?> - Rack <?=$rack?></h3>
</center>
<div class="row">
<div class="col-lg-6 col-lg-offset-3">
<div style="margin-bottom: 25px" class="input-group">
 <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
<select class="form-control" id="niveles" name="niveles" onchange="selectNivel();">
<?php
for($i=1;$i<=$niveles;$i++)
{?>
<option value="<?php echo $i?>">Nivel <?=$i?></option>
<?php
}
?>
</select>
</div>
</div>
</div>

<div class="row" id="contenedor">
<div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12 col-xs-12">
<div class="table-responsive">
	
	<?php
	for($i=1;$i<=$niveles;$i++)
	{
		if($i<10)
		{
			$sub_nivel='0'.$i;
		}
		else
		{
			$sub_nivel=$i;
		}


		if($i>$niveles_pick)
		{
			$foto='reserva';
		}
		else
		{
			$foto='picking';
		}

	?>
	<div id="nivel<?=$i?>" style="display:none">
	<table>
	<tr>
		<td></td>
		<td colspan="3"><img src="<?php echo base_url() ?>images/Ubicaciones/divisor.png" width="100%"></td>
		<td></td>
		<td colspan="3"><img src="<?php echo base_url() ?>images/Ubicaciones/divisor.png" width="100%"></td>
		<td></td>
		<td colspan="3"><img src="<?php echo base_url() ?>images/Ubicaciones/divisor.png" width="100%"></td>
		<td></td>
		<td colspan="3"><img src="<?php echo base_url() ?>images/Ubicaciones/divisor.png" width="100%"></td>
		<td></td>
	</tr>
	<tr>
		<td><img src="<?php echo base_url() ?>images/Ubicaciones/pilar.png" width="100%"></td>
		<?php
		for($t=1;$t<=$columnas;$t++)
		{

			if($t<10)
			{
				$sub_columna='0'.$t;
			}
			else
			{
				$sub_columna=$t;
			}

			$cadena=$sub.$subrak.$sub_columna.$sub_nivel;
			$formato=$sub.'-'.$subrak.'-'.$sub_columna.'-'.$sub_nivel;
     	?>
		<td><center><p class="contenido"><?=$formato?></p></center><div onclick="VerContenido(<?=$bodega?>,<?=$cadena?>,'<?=$formato?>');" style="margin-left: 10%;margin-right: 10%;"><img src="<?php echo base_url() ?>images/Ubicaciones/<?=$foto?>.jpg" width="100%" ></div></td>
		<?php
		if($t%3==0)
		{?>
		<td><img src="<?php echo base_url() ?>images/Ubicaciones/pilar.png" width="100%"></td>
		<?php
		}
		}
		?>
	</tr>
	<tr>
		<td colspan="17"><img src="<?php echo base_url() ?>images/Ubicaciones/base.png" width="100%" height="20%"></td>
		
	</tr>
	</table>
	</div>
	<?php }?>

</div>
</div>
</div>

	<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <img src="<?php echo base_url() ?>images/logo2.png" width="120" height="55"/>
                <center><h4 class="modal-title">Ubicación <b id="ubi"></b></h4></center>
            <div class="modal-body" id="detalle-productos">
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
	</div>
</div>



<script>
function VerContenido(bodega,ubi1,ubidet)
{
	
document.getElementById("ubi").innerHTML =ubidet;
$.ajax({
	type:"post",
	url:"<?php echo base_url();?>logistica/buscarUbicacion",
	data:{ubi:ubi1,bodega:bodega},
	success:function(data)
	{
		
		if(data!="false")
		{
			var datos=JSON.parse(data);

			var salida='<table id="example" class="table table-striped table-bordered" width="100%">';
			salida+='<tr style="background-color:black;color:white;" ><th>Código</th><th>Producto</th><th>cantidad</th></tr>';

			for(var i=0;i<datos.length;i++)
			{
				salida+='<tr><td>'+datos[i]['artnr']+'</td><td>'+datos[i]['artkubez']+'</td><td style="text-align:center">'+datos[i]['bbestlg']+'</td></tr>';
			}

			salida+='</table>';
			$('#detalle-productos').html(salida);
			$("#myModal").modal('show');
		}
		else
		{
			var salida="";
			$('#detalle-productos').html(salida);
			 swal("Sin Registros", "Ubicacion "+ubidet+ " sin registros de productos", "error");
		}
	}
	});

//$('#detalle-productos').html(salida);

}
function selectNivel()
{
	var nivel=$('#niveles').val();	
	var nom="#nivel"+nivel;
	$(nom).slideDown();

	for(var i=1;i<=8;i++)
	{
		if(i!=nivel)
		{
			$('#nivel'+i).slideUp();
		}
	}
}
$(document).ready(function()
{

$('#nivel1').slideDown();

});
</script>