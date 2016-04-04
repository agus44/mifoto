
<script>
function imprSelec(muestra)
{
    var ficha=document.getElementById(muestra);
    var ventimp=window.open(' ','popimpr');
    ventimp.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/signin.css'>");
    ventimp.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/bootstrap.min.css'>");
    ventimp.document.write("<link rel='stylesheet' href='<?php echo base_url();?>assets/css/dataTables.bootstrap.min.css'>");
    ventimp.document.write(ficha.innerHTML);
    ventimp.document.close();
    ventimp.print();
    ventimp.close();
}
$(document).ready(function()
{
});
</script>

<!--Procesamiento de Datos-->
<?php
foreach($encabezado as $general)
{
	$orden_compra=$general->orden_de_compra;
	$rut=$general->rut_proveedor;
	$direccion=$general->direccion_proveedor;
	$nom_proveedor=$general->a;
	$contacto=$general->at;
	$fecha=$general->Fecha;
	$auto=$general->Gerencia;
	$observacion=$general->Comentario;
	$depto=$general->Departamento;
	$descto=$general->descuento.'%';
    $responsable=$general->De;
	$f=explode('-',$fecha);
	$fecha=$f[2].'-'.$f[1].'-'.$f[0];
    $moneda=$general->moneda;
    $forma_pago=$general->forma_pago;
    $jefe=$general->solicitante;
}
?>

<div id="container1"  class="container">
<div class="container">
    <div class="fb-profile">
        <img align="left" class="fb-image-lg" src="<?php echo base_url(); ?>images/compra_oc2.jpg" alt="Profile image example"/>
        <img align="left" class="fb-image-profile thumbnail" src="<?php echo base_url(); ?>images/compra_oc1.jpg" alt="Profile image example"/>
        <div class="fb-profile-text">
            <h1>Orden de Compra N° <?php echo $orden_compra;?></h1>
        </div>
       
        <button type="button" class="btn btn-primary" id="imprimir" name="imprimir" onClick="javascript:imprSelec('container1')">
                  <span class="glyphicon glyphicon-print"></span>  Imprimir
                  </button>
       
    </div>
</div>
<div class="container-fluid">
<div class="table-responsive">
        <table width="100%"  class="table  table-bordered">
        <tr class="dark">
        	<th>R.U.T Proveedor</th>
        	<th>Nombre Proveedor</th>
        	<th>Direccion</th>
        	<th>Contacto</th>
        </tr>
        <tr>
        	<td><?=$rut?></td>
        	<td><?=$nom_proveedor?></td>
        	<td><?=$direccion?></td>
        	<td><?=$contacto?></td>
        </tr>
        <tr class="dark">
        	<th>Fecha</th>
        	<th>¿Necesita Autorización?</th>
        	<th>Departamento</th>
        	<th>Jefe Departamento</th>
        </tr>
        <tr>
        	<td><?=$fecha?></td>
        	<td><?=$auto?></td>
        	<td><?=$depto?></td>
        	<td><?=$jefe?></td>

        </tr>
        <tr class="dark">
            <th>Responsable Compras</th>
            <th>Moneda</th>
            <th>Forma de Pago</th>
            <th>Descuento</th>
        </tr>
        <tr>
            <td><?=$responsable?></td>
            <td><?=$moneda?></td>
            <td><?=$forma_pago?></td>
            <td><?=$descto?></td>
        </tr>
        <tr class="dark">
        	<th colspan="4">Observación</th>
        </tr>
        <tr>
        	<td colspan="4"><?=$observacion?></td>
        </tr>
        </table>
     </div>
     <h3>Detalle de Productos</h3>
     <div class="table-responsive">
        <table width="100%"  class="table  table-bordered">
        <tr class="dark">
        	<th>Código</th>
        	<th>Producto</th>
        	<th>Cantidad</th>
        	<th>Precio Unitario</th>
        </tr>
         <?php
         $cont=0;
         foreach($detalle as $row)
         {
            if($cont%2==0)
            {
            ?>
     	    <tr class="par">
            <?php
            }
            else
            {
            ?>
            <tr>
            <?php
            }
            ?>
     		<td><?=$row->codigo;?></td>
     		<td><?=$row->Descripcion;?></td>
     		<td style="text-align:center"><?=$row->cantidad;?></td>
     		<td style="text-align:center"><?=$row->precio_unit;?></td>
        </tr>
<?php
            $cont=$cont+1;
         }
?>
        
        </table>
     </div>
</div>
</div>