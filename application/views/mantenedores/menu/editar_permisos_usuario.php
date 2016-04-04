<div class="container">
<div class="row">
<div class="col-lg-12 col-md-11 col-sm-11 col-xs-11 bhoechie-tab-container">
<div class="col-lg-6 col-md-5 col-sm-11 col-xs-11">
	<div class="page-header">
	        <h4>Usuario</h4>
	</div>
	<div id="encabezado">
		<center>
		<?php
		foreach($usuario as $row)
		{?>
		 <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
            <input id="id" type="text" class="form-control" name="id" value="<?=$row->id?>" readonly>                                        
         </div> 
		 <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input id="usuario" type="text" class="form-control" name="usuario" value="<?=$row->usuario?>" readonly>                                        
         </div>
         <div style="margin-bottom: 25px" class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
            <input id="id" type="text" class="form-control" name="id" value="<?=$row->nom_tipo?>" readonly>                                        
         </div>  
		<?php
		}
		?>
		<button type="button" class="btn btn-success" id="volver" name="volver">
                <span class="glyphicon glyphicon-share-alt"></span>  volver a permisos de usuario
              </button><br><br>
        </center>
	</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-11 col-sm-11 col-xs-11 bhoechie-tab-container">
<div class="col-lg-12 col-md-11 col-sm-11 col-xs-11">
	<div class="page-header">
	        <h4>Permisos del Usuario</h4>
	</div>
	<div id="encabezado2">
		<form id="form1" name="fomr1">
		  <div id="lista_menus"  class="table-responsive">
            <table width="100%" >
                <tr>
                <?php
                    $i=0;
                    foreach($menus as $row)
                    {$i++;
                    $contador=0;
                ?>
                    <td width="10%">
                    <div class="checkbox">
                        <label>     
                        <?php
                            if($menus_usuario)
                            {
                                foreach($menus_usuario as $row2)
                                {
                                    if($row->id_menu==$row2->id_menu)
                                    {
                                        $contador=$contador+1;
                                    }
                                }

                                if($contador>0)
                                {
                        ?>
                                    <input class="aux" type="checkbox" value="<?=$row->id_menu?>" id="check<?=$row->id_menu?>" name="check<?=$row->id_menu?>" onclick="cambiarMenu(<?=$row->id_menu;?>)" checked><?=$row->id_menu.' - '.$row->nom_menu;?>&nbsp;&nbsp; 
                        <?php
                                }
                                else
                                {
                        ?>
                                    <input class="aux" type="checkbox" value="<?=$row->id_menu?>" id="check<?=$row->id_menu?>" name="check<?=$row->id_menu?>" onclick="cambiarMenu(<?=$row->id_menu;?>)"><?=$row->id_menu.' - '.$row->nom_menu;?>&nbsp;&nbsp; 
                        <?php 
                                } 
                            }
                            else
                            {
                        ?>
                                <input class="aux" type="checkbox" value="<?=$row->id_menu?>" id="check<?=$row->id_menu?>" name="check<?=$row->id_menu?>" onclick="cambiarMenu(<?=$row->id_menu;?>)"><?=$row->id_menu.' - '.$row->nom_menu;?>&nbsp;&nbsp;
                        <?php 
                            }
                        ?>
                        </label>
                    </div>
                    </td>
                    <?php
                        if($i%10==0)
                        {
                    ?>
                            </tr><tr><?php
                        }
                    }
                    ?>
                </tr>
             </table>
            </div>
        </form>
	</div>
</div>
</div>
</div>
</div>

<script>
function cambiarMenu(id_menu)
{
	var id=$('#id').val();
    var nom="check"+id_menu;
    var valor=document.getElementById(nom).checked;
    $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>mantenedores/actualizarPermisosxUsuario",
        data:{valor:valor,id:id,id_menu},
        success:function(data)
        {
            var respuesta=data.split(':::');
            if(respuesta[0]!='ERROR')
            {
                 swal(respuesta[0],respuesta[1],"success");
            }
            else
            {
                swal(respuesta[0],respuesta[1],"error");
            }
        }
    });
}

$(document).ready(function()
{
    $('#volver').click(function()
    {
        window.open('<?php echo base_url();?>mantenedores/permisos','_self');
    });
});
</script>
