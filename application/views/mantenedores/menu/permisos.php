<div class="container">
    <div class="page-header">
        <h2>Permisos de Acceso Menús</h2>
    </div>
    <div class="col-md-12">
            <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1primary" data-toggle="tab"><span class="glyphicon glyphicon-flag" aria-hidden="true"></span>  Tipo de Usuario</a></li>
                            <li><a href="#tab2primary" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Por Usuario</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1primary">
                            <form id="form1" name="form1">
                             <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                                <select class="form-control" id="tipo_usuario" name="tipo_usuario" onchange="buscar_permisos();">
                                  <option value="-1">Seleccione Tipo de Usuario</option>
                                  <?php
                                  foreach($tipo as $datos)
                                  {
                                  ?>
                                    <option value="<?=$datos->id_tipo?>"><?=$datos->nom_tipo?></option>
                                  <?php
                                  }
                                  ?>
                                </select> 
                              </div>
                              <br>

                              <div id="lista_menus" style="display:none" class="table-responsive">
                                <font color="#CC0000">(*) Menú padre destacado con color rojo</font><br><br>
                                <table width="100%" >
                                    <tr>
                                    <?php
                                    $i=0;

                                    foreach($menus as $row)
                                    {  $i++;?>
                                            <td width="33.3%">
                                                <div class="checkbox">
                                                  <label>
                                                    <input class="aux" type="checkbox" value="<?=$row->id_menu?>" id="check<?=$row->id_menu?>" name="check<?=$row->id_menu?>" onclick="cambiarMenu(<?=$row->id_menu;?>)">
                                                    <?php
                                                    if(empty($row->id_padre))
                                                    {
                                                    ?><font color="#CC0000"><?=$row->nom_menu;?>&nbsp;&nbsp;</font>
                                                    <?php
                                                    }
                                                    else
                                                    {?>
                                                    <?=$row->nom_menu;?>&nbsp;&nbsp;
                                                <?php
                                                    }
                                                ?>
                                                  </label>
                                                </div>
                                            </td>
                                        <?php
                                        if($i%3==0)
                                        {
                                            ?></tr><tr><?php
                                        }
                                    }
                                    ?>
                                </tr>
                                </table>
                              </div>
                          </form>
                        </div>
                        <div class="tab-pane fade" id="tab2primary">
                            <center>
                                    <h3>Listado de Usuarios</h3>
                                    </center>
                                     <div class="row">
                                     <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12 col-xs-12">
                                     <div class="table-responsive">
                                    <table id="usuariospermisos" class="table table-striped table-bordered" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Id_usuario</th>
                                                    <th>Nombre</th>
                                                    <th>Tipo Usuario</th>
                                                    <th>Editar</th>
                                                </tr>
                                            </thead>        
                                            <tbody>
                                                <?php
                                                foreach($lista_usuarios as $row)
                                                {
                                                ?>
                                                <tr>
                                                    <td><?=$row->id?></td>
                                                    <td><?=$row->usuario?></td>
                                                    <td><?=$row->nom_tipo?></td>
                                                    <td><button type="button" class="btn btn-info sweet-11" id="editar" name="editar" onclick="editar_permiso(<?=$row->id?>)">
                                                    <span class="glyphicon glyphicon-pencil"></span>  Editar
                                                    </button>
                                                    </td>
                                                </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>  
                                     </div>
                                    </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<script>
function editar_permiso(id)
{
    window.open('<?php echo base_url();?>mantenedores/editar_permisos_usuario/'+id,'_self');
}
function cambiarMenu(id)
{
    var nom="check"+id;
    var valor=document.getElementById(nom).checked;
    var tipo=$('#tipo_usuario').val();
    $.ajax({
        type:"POST",
        url:"<?php echo base_url();?>mantenedores/actualizarPermisos",
        data:{valor:valor,tipo:tipo,id:id},
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

function buscar_permisos()
{
    $('#lista_menus').slideUp();
    var tipo=$('#tipo_usuario').val();

    if(tipo!=-1)
    {
        $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>mantenedores/buscar_permisos",
            data:{tipo:tipo},
            success:function(data)
            {
                var datos=JSON.parse(data);

                if(datos!=false)
                {
                    for(var i=0;i<datos.length;i++)
                    {

                        var nom_check="check"+datos[i]['id_menu'];
                      //  $('#'+nom_check).attr('checked',true);
                       document.getElementById('check'+datos[i]['id_menu']).checked = true;
                    }
                }
                else
                {
                    $('.aux').each(function()
                    {
                        $(this).attr('checked',false);
                    });
                    swal("Usuario Sin Permisos","El tipo de usuario no posee permisos, sin embargo puede agregar menús a su cartera de permisos","info");

                }
                $('#lista_menus').slideDown();
            }
        });

    }
}

$(document).ready(function()
{
    $('#usuariospermisos').dataTable
      ({
        "bLengthChange": true,
        "bFilter": true,
        "bAutoWidth":true,
        "sDom": '<"top"fl>rt<"bottom"pi><"clear">',
        "sPaginationType": "full_numbers",
        "oLanguage": {
               "sSearch": "Filtrar:",
               "sInfoEmpty": "Sin registros",
               "sZeroRecords": "No se encontraron registros",
               "sInfo": "Est&aacute;s viendo _END_ de _TOTAL_ registros",
               "sInfoFiltered": "(filtrados de _MAX_ registros totales)",
               "oPaginate": {
                "sFirst":    "Primero ",
                "sPrevious": " << ",
                "sNext":     " >> ",
                "sLast":     " &Uacute;ltimo"
                    }
              }
      });
});
</script>