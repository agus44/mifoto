<!--<div class="container-fluid">
<center>
	<h3>Almacenamiento y Distribución Logística</h3>
	<div class="row">
    <div class="col-lg-5 col-lg-offset-3">
	<div style="margin-bottom: 25px" class="input-group">
      	<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
            <select class="form-control" id="nivel" name="nivel" onchange="seleccionado();">
                <option value="0">Seleccione Bodega</option>
                <?php
                foreach($bodegas as $row)
                {?>
                <option value="<?=$row->id_bodega?>"><?=$row->bodega?></option>
                <?php
                }
                ?>
            </select> 
        </div>
        </div>
        </div>
        <div id="bodega" style="display:none;">
         <img src="<?php echo base_url() ?>images/bodegas.png" width="100%" height="50%">
        </div>
</center>
</div>-->
<style>
#contenedor{
    background-image: url('<?php echo base_url()?>images/ceramica.jpg'); 
    background-repeat: repeat;

}
</style>
<div class="container-fluid">
<center>
<h3>Estructuras Bodegas Wurth</h3>
 <div class="row" id="contenedor">
 <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12 col-xs-12">
    <br><br>
 <div class="table-responsive">
<div id="bodega" style="display:none;">
<table>
<!--<tr>
<td colspan="18"><div onclick="bodega(1000,1);"><img src="<?php echo base_url() ?>images/Ubicaciones/q1.jpg" width="600" height="100"></div></td>
</tr>
<tr>
<td colspan="18"><div onclick="bodega(1000,2);"><img src="<?php echo base_url() ?>images/q2.jpg" width="20%" height="20%"></div></td>
</tr>
<tr>
<td colspan="18"><div onclick="bodega(1000,3);"><img src="<?php echo base_url() ?>images/q3.jpg" width="20%" height="20%"></div></td>
</tr>
<tr>
<td colspan="18"><div onclick="bodega(1000,4);"><img src="<?php echo base_url() ?>images/q4.jpg" width="30%" height="10%"></div></td>
</tr>
</tr>-->
<tr>
<td colspan="2">
<div onclick=""><img src="<?php echo base_url() ?>images/estantes.jpg" width="180" height="180"> 
</td>
<td>
<div onclick="bodega(3000,1);"><img src="<?php echo base_url() ?>images/r1.jpg" width="100" height="300"> 
</td>
<td>
 <div onclick="bodega(3000,2);"><img src="<?php echo base_url() ?>images/r2.jpg" width="100" height="300"> 
   
</td>
<td>
 <div onclick="bodega(3000,3);"><img src="<?php echo base_url() ?>images/r3.jpg" width="100" height="300">    
</td>
<td>
 <div onclick="bodega(3000,4);"><img src="<?php echo base_url() ?>images/r4.jpg" width="100" height="300"> 
   
</td>
<td>
 <div onclick="bodega(3000,5);"><img src="<?php echo base_url() ?>images/r5.jpg" width="100" height="300"> 
   
</td>
<td>
 <div onclick="bodega(3000,6);"><img src="<?php echo base_url() ?>images/r6.jpg" width="100" height="300">   
</td>
<td>
 <div onclick="bodega(3000,7);"><img src="<?php echo base_url() ?>images/r7.jpg" width="100" height="300"> 
   
</td>
<td>
 <div onclick="bodega(3000,8);"><img src="<?php echo base_url() ?>images/r8.jpg" width="100" height="300"> 
   
</td>
<td>
 <div onclick="bodega(3000,9);"><img src="<?php echo base_url() ?>images/r9.jpg" width="100" height="300"> 
   
</td>
<td>
 <div onclick="bodega(3000,10);"><img src="<?php echo base_url() ?>images/r10.jpg" width="100" height="300"> 
   
</td>
<td>
 <div onclick="bodega(3000,11);"><img src="<?php echo base_url() ?>images/r11.jpg" width="100" height="300"> 
   
</td>
<td>
 <div onclick="bodega(3000,12);"><img src="<?php echo base_url() ?>images/r12.jpg" width="100" height="300"> 
   
</td>
<td>
 <div onclick="bodega(4000,13);"><img src="<?php echo base_url() ?>images/r13.jpg" width="100" height="300"> 
 
</td>
<td>
 <div onclick="bodega(4000,14);"><img src="<?php echo base_url() ?>images/r14.jpg" width="100" height="300"> 

</td>
<td>
 <div onclick="bodega(4000,15);"><img src="<?php echo base_url() ?>images/r15.jpg" width="100" height="300"> 
  
</td>
<td>
 <div onclick="bodega(4000,16);"><img src="<?php echo base_url() ?>images/r16.jpg" width="100" height="300"> 
</td>
</tr>
<tr>
<td colspan="14"></td>
<td><div onclick="bodega(3000,33);"><img src="<?php echo base_url() ?>images/r33.jpg" width="100" height="300"> </td>
<td><div onclick="bodega(3000,34);"><img src="<?php echo base_url() ?>images/r34.jpg" width="100" height="300"> </td>
<td><div onclick="bodega(3000,35);"><img src="<?php echo base_url() ?>images/r35.jpg" width="100" height="300"> </td>
<td><div onclick="bodega(3000,35);"><img src="<?php echo base_url() ?>images/r36.jpg" width="100" height="300"> </td>
<td></td>
</tr>
</table>

</div>
</div>
</div>
</div>
</center>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Aviso Versión Beta</h4>
            </div>
            <div class="modal-body">
                <p>Ésta es una versión Beta del sistema de Distribución Logistica</p>
                <p class="text-warning"><small>La aplicación sufrirá cambios en el futuro, estamos trabajando para usted.</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
function bodega(bodega,rack)
{
    window.open('<?php echo base_url();?>logistica/racksEstantes/'+bodega+'/'+rack,'_self');
}
$(document).ready(function()
{
         $("#myModal").modal('show');

        $("#bodega").slideDown();

});
</script>
    
