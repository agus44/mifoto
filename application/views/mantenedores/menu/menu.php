    <div class="row">
        <div class="col-lg-12 col-md-11 col-sm-11 col-xs-11 bhoechie-tab-container">
            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item  text-center active">
                  <h4 class="glyphicon glyphicon-plus"></h4><br/>Agregar
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-remove"></h4><br/>Eliminar
                </a>  
              </div>
            </div>
            <div class="bhoechie-tab">
                <!-- flight section -->
                <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 bhoechie-tab-content active ">
                   <div class="row">
                   <div class="col-lg-5 col-lg-offset-3">
                    <center>
                        <h3>Agregar Menú</h3>

                        <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        <input id="menu-add" type="text" class="form-control" name="menu-add" value="" placeholder="Nombre del Menú" onfocusout="verificar_menu();">                                        
                        </div> 
                        <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                        <select class="form-control" id="asig_menu" name="asig_menu" onchange="verificar_padre();">
                          <option value="-1">Seleccione menú padre</option>
                          <option value="0">Menú Padre</option>
                          <?php
                          foreach($menus_padres as $row)
                          {?>
                          <option value="<?=$row->id_menu?>"><?=$row->nom_menu?></option>
                        <?php
                          }
                          ?>
                        </select>                                       
                        </div> 
                         <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-screenshot"></i></span>
                        <input id="url-add" type="text" class="form-control" name="url-add" value="" placeholder="Ingrese la url... Ejemplo('mantenedores/tu Url')" onfocusout="verificar_url();">                                        
                        </div> 

                      <div class="alert alert-success alert-dismissable" id="alert1" style="display:none">
                        <button type="button" class="close"aria-hidden="true" id="boton-alert1">x</button>
                        <strong>Atención</strong><p id="mensaje1"></p>
                        </div>

                         <div class="progress progress-striped active" id="procesando1" style="display:none">
                        <div class="progress-bar" role="progressbar"
                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"
                             style="width: 100%">
                          <span>Procesando...</span>
                        </div>
                        </div>
                         <button type="button" class="btn btn-primary" id="agregar" name="agregar" disabled>
                          <span class="glyphicon glyphicon-plus"></span>  Agregar
                         </button><br><br>
                    </center>   
                  </div>
                  </div>
                    
                  
                </div>
                <!-- hotel search -->
                <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 bhoechie-tab-content">
                    <div class="row">
                    <div class="col-lg-5 col-lg-offset-3">
                    <center>
                       <h3>Eliminar Menú</h3>
                        <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                        <input id="id-elim" type="text" class="form-control" name="id-elim" value="" placeholder="Código del Menú">                                        
                        </div> 
                        <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                        <input id="menu-elim" type="text" class="form-control" name="menu-elim" value="" placeholder="Nombre del Menú">                                        
                        </div>
                        <div class="progress progress-striped active" id="buscando" style="display:none">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                          <span>Buscando...</span>
                        </div>
                      </div>
                        <div class="alert alert-success alert-dismissable" id="alert2" style="display:none">
                        <button type="button" class="close"aria-hidden="true" id="boton-alert2">x</button>
                        <strong>Atención</strong><p id="mensaje2"></p>
                        </div>
                      <button type="button" class="btn btn-success" id="buscar" name="buscar">
                          <span class="glyphicon glyphicon-search"></span>  Buscar
                         </button>
                       <button type="button" class="btn btn-danger sweet-11" id="eliminar" name="eliminar" disabled>
                          <span class="glyphicon glyphicon-remove"></span>  Eliminar
                         </button>
                      <br><br>
 
                    </center>
                    </div>
                    </div>
                </div>
                
            </div>
        </div>
  </div><br>
  <center>
     <button type="button" class="btn btn-primary" id="lista" name="lista">
                          <span class="glyphicon glyphicon-menu-hamburger"></span>  Ver Listado de Menús
                         </button>
  </center>

  <script>

function verificar_padre()
{
  var asig=$('#asig_menu').val();
  if(asig==0)
  {
    $('#url-add').attr('readonly',true);
  }
  else
  {
    $('#url-add').attr('readonly',false);
  }
}
   


function verificar_url()
{
  $('#alert1').slideUp();
  var url_add=$('#url-add').val();

  if(url_add.length>0)
  {
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>mantenedores/verificar_url",
      data:{url_add:url_add},
      success:function(data)
      {
        var respuesta=data.split(':::');
        if(respuesta[0]=='EXISTE')
        {
          $('#alert1').removeClass('alert-success'); 
          $('#alert1').addClass('alert-danger');
          document.getElementById("mensaje1").innerHTML =respuesta[1];
          $('#url-add').val('');
          $('#url-add').focus();

        }
        else
        {
          $('#alert1').removeClass('alert-danger'); 
          $('#alert1').addClass('alert-success');
          document.getElementById("mensaje1").innerHTML =respuesta[1];
        }
        $('#alert1').slideDown();
      }
    });
  }
}
function verificar_menu()
{
  $('#alert1').slideUp();
  var nom_menu=$('#menu-add').val();

  if(nom_menu.length>0)
  {
    $.ajax({
      type:"POST",
      url:"<?php echo base_url();?>mantenedores/verificar_menu",
      data:{nom_menu:nom_menu},
      success:function(data)
      {
        var response=data.split(':::');
        if(response[0]=='EXISTE')
        {
          $('#alert1').removeClass('alert-success'); 
          $('#alert1').addClass('alert-danger');
          document.getElementById("mensaje1").innerHTML =response[1];
          $('#menu-add').val('');
          $('#menu-add').focus();
        }
        else
        {
          $('#alert1').removeClass('alert-danger'); 
          $('#alert1').addClass('alert-success');
          document.getElementById("mensaje1").innerHTML =response[1];
          $('#agregar').attr('disabled',false);
        }
          $('#alert1').slideDown();
      }
    });
  }
}
$(document).ready(function() {

    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

    $('#boton-alert1').click(function()
    {
     $('#alert1').slideUp(); 
    });

     $('#boton-alert2').click(function()
    {
     $('#alert2').slideUp(); 
    });

    $('#agregar').click(function()
    {
      var nom_menu=$('#menu-add').val();
      var url_add=$('#url-add').val();
      var asig_menu=$('#asig_menu').val();

      if(nom_menu.length==0)
      {
        swal("Error","Debe ingresar un nombre de menú válido", "error");
      }
      else
      {
        if(asig_menu==-1)
        {
          swal("Error","Debe seleccionar si es un menú padre, o si es un menú hijo", "error");   
        }
        else
        {
             $.ajax({
             type:"POST",
             url:"<?php echo base_url();?>mantenedores/agregar_menu",
             data:{nom_menu:nom_menu,url_add:url_add,asig_menu:asig_menu},
             success:function(data)
             {
              var respuesta=data.split(':::');
              if(respuesta[0]!='ERROR')
              {
                swal("Agregado",respuesta[1], "success");
              }
              else
              {
                swal("Error",respuesta[1], "error");
              }
             }
            });
        }
      }

     
    });

    $('#lista').click(function()
    {
      window.open('<?php echo base_url();?>mantenedores/lista_menus','_self');
    });

    $('#buscar').click(function()
    {
      var id=$('#id-elim').val();
      var nom=$('#menu-elim').val();

      if(id.length==0 && nom.length==0)
      {
        swal("Error","Debe ingresar a lo menos un dato del menú", "error");
      }
      else
      {
        $('#buscando').slideDown();
        $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>mantenedores/buscar_menu",
            data:{id:id,nom:nom},
            success:function(data)
            {
              $('#buscando').slideUp();
              if(data!='false')
              {
                  var datos=JSON.parse(data);
                  $('#id-elim').val(datos[0]['id_menu']);
                  $('#menu-elim').val(datos[0]['nom_menu']);

                  $('#alert2').removeClass('alert-danger'); 
                  $('#alert2').addClass('alert-success');
                  document.getElementById("mensaje2").innerHTML ='Menú encontrado exitosamente';
                  $('#alert2').slideDown();
                  $('#eliminar').attr('disabled',false);
              }
              else
              {
                 $('#id-elim').val('');
                 $('#menu-elim').val('');
                swal("No Encontrado","El menú no existe, intente modificar los filtros de búsqueda", "error");
              }
            }
        });
      }
    });

    $('#eliminar').click(function()
    {
      var id=$('#id-elim').val();
      var nom=$('#menu-elim').val();

      if(id.length==0 && nom.length==0)
      {
        swal("Error","Debe ingresar a lo menos un dato del menú", "error");
      }
      else
      {
        $.ajax({
            type:"POST",
            url:"<?php echo base_url();?>mantenedores/eliminar_menu",
            data:{id:id,nom:nom},
            success:function(data)
            {
              var resp=data.split(':::');

              if(resp[0]!='ERROR')
              {
                 swal("Eliminado",resp[1], "success");
              }
              else
              {
                 swal("Error",resp[1], "error");
                 $('#id-elim').val('');
                 $('#menu-elim').val('');
              }
            }
        });
      }
    });
});
  </script>