<div class="row">
  <div class="col-lg-12 col-md-11 col-sm-11 col-xs-11 bhoechie-tab-container">
    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
      <div class="list-group">
        <a href="#" class="list-group-item  text-center active">
          <h4 class="glyphicon glyphicon-user"></h4><br/>Agregar
        </a>
        <a href="#" class="list-group-item text-center">
          <h4 class="glyphicon glyphicon-pencil"></h4><br/>Editar
        </a>
        <a href="#" class="list-group-item text-center">
          <h4 class="glyphicon glyphicon-remove"></h4><br/>Eliminar
        </a>  
      </div>
    </div>
    <div class="bhoechie-tab">
      <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 bhoechie-tab-content active ">
        <div class="row">
          <div class="col-lg-5 col-lg-offset-3">
            <center>
              <h3>Agregar Usuario</h3>
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="usuario" type="text" class="form-control" name="usuario" value="" placeholder="Nombre de Usuario" onfocusout="verificar_usuario();">                                        
              </div>       
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña">
              </div>
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                <input id="nombre_persona" type="text" class="form-control" name="nombre_persona" value="" placeholder="Nombre de la Persona">                                        
              </div> 
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                <select class="form-control" id="tipo_usuario" name="tipo_usuario" onchange="seleccionado();">
                  <option value="0">Tipo de Usuario</option>
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
              <div class="alert alert-success alert-dismissable" id="alert1" style="display:none">
                <button type="button" class="close"aria-hidden="true" id="boton-alert1">x</button>
                <strong>Atención</strong><p id="mensaje1"></p>
              </div>
              <div class="progress progress-striped active" id="procesando1" style="display:none">
                <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
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
      <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 bhoechie-tab-content">
        <div class="row">
          <div class="col-lg-5 col-lg-offset-3">
            <center>
              <h3>Editar Usuario</h3>
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                <input id="id-edit" type="text" class="form-control" name="id-edit" value="" placeholder="Código de Usuario">                                        
              </div>    
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="usuario-edit" type="text" class="form-control" name="usuario-edit" value="" placeholder="Nombre de Usuario">                                        
              </div>   
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="password-edit" type="text" class="form-control" name="password-edit" value="" placeholder="Contraseña" readonly>                                        
              </div>
               <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                <input id="nombre_persona-edit" type="text" class="form-control" name="nombre_persona-edit" value="" placeholder="Nombre de la Persona">                                        
              </div>        
              <div style="margin-bottom: 25px" class="input-group" >
                <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                <select class="form-control" id="tipo_usuario-edit" name="tipo_usuario-edit" disabled>
                  <option value="0">Tipo de Usuario</option>
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
              <div class="alert alert-success alert-dismissable" id="alert2" style="display:none">
                <button type="button" class="close"aria-hidden="true" id="boton-alert2">x</button>
                <strong>Atención</strong><p id="mensaje2"></p>
              </div>
              <div class="progress progress-striped active" id="buscando1" style="display:none">
                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span>Buscando...</span>
                </div>
              </div>
              <div class="progress progress-striped active" id="editando" style="display:none">
                <div class="progress-bar " role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span>Editando...</span>
                </div>
              </div>
              <button type="button" class="btn btn-success" id="buscar1" name="buscar1">
                <span class="glyphicon glyphicon-search"></span>  Buscar
              </button>
              <button type="button" class="btn btn-info sweet-11" id="editar" name="editar" disabled>
                <span class="glyphicon glyphicon-pencil"></span>  Editar
              </button>
              <br><br>
            </center>
          </div>
        </div>
      </div>
    
                <!-- hotel search -->
                <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 bhoechie-tab-content">
                    <div class="row">
                    <div class="col-lg-5 col-lg-offset-3">
                    <center>
                       <h3>Eliminar Usuario</h3>
                       <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                        <input id="id-elim" type="text" class="form-control" name="id-elim" value="" placeholder="Código de Usuario">                                        
                      </div>    
                      <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="usuario-elim" type="text" class="form-control" name="usuario-elim" value="" placeholder="Nombre de Usuario">                                        
                      </div>       
                      <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                            <input id="nombre_persona-elim" type="text" class="form-control" name="nombre_persona-elim" value="" placeholder="Nombre de la Persona">                                        
                      </div> 
                        <div style="margin-bottom: 25px" class="input-group" >
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                                        <select class="form-control" id="tipo_usuario-elim" name="tipo_usuario-elim" disabled>
                                        <option value="0">Tipo de Usuario</option>
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
                        <div class="alert alert-success alert-dismissable" id="alert3" style="display:none">
                        <button type="button" class="close"aria-hidden="true" id="boton-alert3">x</button>
                        <strong>Atención</strong><p id="mensaje3"></p>
                        </div>
                      <button type="button" class="btn btn-success" id="buscar2" name="buscar2">
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
                          <span class="glyphicon glyphicon-menu-hamburger"></span>  Ver Listado de Usuarios
                         </button>
  </center>

  <script>
  function seleccionado()
  {
    var tipo=$('#tipo_usuario').val();

    if(tipo==0)
    {
      $('#agregar').attr('disabled',true);
    }
    else
    {
      $('#agregar').attr('disabled',false);
    }
  }
  function verificar_usuario()
  {
    $('#alert1').slideUp();
     var usuario=$('#usuario').val();
     if(usuario.length!=0)
     {
     $.ajax({
        type:"POST",
        data:{usuario:usuario},
        url:"<?php echo base_url();?>mantenedores/verificar_usuario",
        success:function(data)
        {
          var Resp=data.split(':::');
          if(Resp[0]!='ERROR')
          {
            $('#alert1').removeClass('alert-danger'); 
            $('#alert1').addClass('alert-success');
            document.getElementById("mensaje1").innerHTML =Resp[1];
          }
          else
          {
            $('#alert1').removeClass('alert-success'); 
            $('#alert1').addClass('alert-danger');
            $('#usuario').val('');
            $('#usuario').focus();
          }
          document.getElementById("mensaje1").innerHTML =Resp[1];
          $('#alert1').slideDown();
         
        }
     });
      }
  }

$(document).ready(function() {

    var id_global_eliminar;
    var nom_global_eliminar;

    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

    $('#agregar').click(function()
    {
      $('#alert1').slideUp();
      var usuario=$('#usuario').val();
      var pass=$('#password').val();
      var tipo=$('#tipo_usuario').val();
      var nombre=$('#nombre_persona').val();

      if(usuario=='')
      {
        $('#alert1').removeClass('alert-success'); 
        $('#alert1').addClass('alert-danger');
        document.getElementById("mensaje1").innerHTML ="Debe ingresar un nombre de usuario válido";
        $('#alert1').slideDown();
        $('#usuario').val('');
        $('#usuario').focus();

      }
      else
      {
        if(pass=='')
        {
          $('#alert1').removeClass('alert-success'); 
          $('#alert1').addClass('alert-danger');
          document.getElementById("mensaje1").innerHTML ="Debe ingresar una contraseña válida";
          $('#alert1').slideDown();
          $('#password').val('');
          $('#password').focus();
        }
        else
        {
          $('#procesando1').slideDown();
          $.ajax({
                type:"POST",
                data:{usuario:usuario,pass:pass,tipo:tipo,nombre:nombre},
                url:"<?php echo base_url();?>mantenedores/agregar_usuario",
                success:function(data)
                {
                  $('#procesando1').slideUp();
                  var response=data.split(':::');

                  if(response[0]!='ERROR')
                  {
                     swal("Agregado",response[1], "success");
                  }
                  else
                  {
                    swal("Problemas",response[1], "error");
                  }
                  
                }
          });
        }
      }
    });

    $('#boton-alert1').click(function()
    {
     $('#alert1').slideUp(); 
    });

     $('#boton-alert2').click(function()
    {
     $('#alert2').slideUp(); 
    });

    $('#boton-alert3').click(function()
    {
     $('#alert3').slideUp(); 
    });

    $('#lista').click(function()
    {
        window.open('<?php echo base_url();?>mantenedores/lista_usuarios','_self');
    });

    $('#buscar2').click(function()
    {
      $('#alert3').slideUp();
      var id=$('#id-elim').val();
      var nombre=$('#usuario-elim').val();

      if(id.length==0 && nombre.length==0)
      {
         $('#alert3').removeClass('alert-success'); 
         $('#alert3').addClass('alert-danger');
         document.getElementById("mensaje3").innerHTML ="Debe ingresar el código o nombre del usuario que desea eliminar";
         $('#alert3').slideDown();

      }
      else
      {
        $.ajax({
            type:"POST",
            data:{id:id,nombre:nombre},
            url:"<?php echo base_url();?>mantenedores/buscar_usuario",
            success:function(data)
            {
              var respuesta=JSON.parse(data);
              if(respuesta!=false)
              {
                 $('#alert3').removeClass('alert-danger'); 
                 $('#alert3').addClass('alert-success');
                 document.getElementById("mensaje3").innerHTML ="Usuario encontrado exitosamente";
                 $('#alert3').slideDown();
                 $('#id-elim').val(respuesta[0]['id']);
                 $('#usuario-elim').val(respuesta[0]['usuario']);
                 $('#tipo_usuario-elim').val(respuesta[0]['tipo_usuario']);
                 $('#nombre_persona-elim').val(respuesta[0]['nombre']);
                 $('#eliminar').attr('disabled',false);
                 id_global_eliminar=respuesta[0]['id'];
                 nom_global_eliminar=respuesta[0]['usuario'];
              }
              else
              {
                 $('#id-elim').val('');
                 $('#usuario-elim').val('');
                 $('#tipo_usuario-elim').val(0);

                 $('#alert3').removeClass('alert-success'); 
                 $('#alert3').addClass('alert-danger');
                 document.getElementById("mensaje3").innerHTML ="No existe el usuario ingresado";
                 $('#alert3').slideDown();
                 $('#eliminar').attr('disabled',true);
              }
            }

        });
      }
    });


    $('#eliminar').click(function()
    {/*
      $.ajax({
        type:"POST",
        data:{id:id_global_eliminar},
        url:"<?php echo base_url();?>mantenedores/eliminar_usuario",
        success:function(data)
        {

        }
      });*/

     swal({
      title: "¿Estas seguro que quieres eliminar al usuario: "+nom_global_eliminar+"?",
      text: "Se eliminará el usuario por completo",
      type: "info",
      showCancelButton: true,
      confirmButtonClass: 'btn-info',
      confirmButtonText: 'Eliminar',
      closeOnConfirm: false,
      
    },
    function(isConfirm) {
        if (isConfirm) {
          $.ajax({
          type:"POST",
          data:{id:id_global_eliminar},
          url:"<?php echo base_url();?>mantenedores/eliminar_usuario",
          success:function(data)
          {
            var resp_elim=data.split(':::');
            if(resp_elim[0]!='ERROR')
            {
              swal("Borrado", "El usuario ha sido eliminado correctanente", "success");
            }
            else
            {
              swal("Problemas", "No se ha podido eliminar el usuario", "error");
            }
          }
        });

          
        } 
      });
    });

    $('#buscar1').click(function()
    {
      $('#alert2').slideUp();
      var ident=$('#id-edit').val();
      var user=$('#usuario-edit').val();
      if(ident.length==0 && user.length==0)
      {
         $('#alert2').removeClass('alert-success'); 
         $('#alert2').addClass('alert-danger');
         document.getElementById("mensaje2").innerHTML ="Debe ingresar el código o nombre del usuario que desea editar";
         $('#alert2').slideDown();

      }
      else
      {
        $('#buscando1').slideDown();
        $.ajax({
            type:"POST",
            data:{id:ident,nombre:user},
            url:"<?php echo base_url();?>mantenedores/buscar_usuario",
            success:function(data)
            {
              $('#buscando1').slideUp();
              var respuesta=JSON.parse(data);
              if(respuesta!=false)
              {
                 $('#alert2').removeClass('alert-danger'); 
                 $('#alert2').addClass('alert-success');
                 document.getElementById("mensaje2").innerHTML ="Usuario encontrado exitosamente";
                 $('#alert2').slideDown();
                 $('#id-edit').val(respuesta[0]['id']);
                 $('#usuario-edit').val(respuesta[0]['usuario']);
                 $('#tipo_usuario-edit').val(respuesta[0]['tipo_usuario']);
                 $('#password-edit').val(respuesta[0]['pass']);
                 $('#nombre_persona-edit').val(respuesta[0]['nombre']);
                 $('#editar').attr('disabled',false);
                 $('#tipo_usuario-edit').attr('disabled',false);
                 $('#password-edit').attr('readonly',false); 
              }
              else
              {
                 $('#id-edit').val('');
                 $('#usuario-edit').val('');
                 $('#password-edit').val('');
                 $('#nombre_persona-edit').val('');
                 $('#tipo_usuario-edit').val(0);

                 $('#alert2').removeClass('alert-success'); 
                 $('#alert2').addClass('alert-danger');
                 document.getElementById("mensaje2").innerHTML ="No existe el usuario ingresado";
                 $('#alert2').slideDown();
                 $('#editar').attr('disabled',true);
                $('#tipo_usuario-edit').attr('disabled',true);
                 $('#password-edit').attr('disabled',true); 
              }
            }
        });
      }
    });

   $('#editar').click(function()
   {
      $('#alert2').slideUp();
      var id=$('#id-edit').val();
      var nombre=$('#usuario-edit').val();
      var pass=$('#password-edit').val();
      var tipo=$('#tipo_usuario-edit').val();
      var nom=$('#nombre_persona-edit').val();

      if(id.length==0)
      {
         $('#alert2').removeClass('alert-success'); 
         $('#alert2').addClass('alert-danger');
         document.getElementById("mensaje2").innerHTML ="Debe ingresar el código del usuario a editar";
         $('#alert2').slideDown();
      }
      else
      {
        if(nombre.length==0)
        {
          $('#alert2').removeClass('alert-success'); 
         $('#alert2').addClass('alert-danger');
          document.getElementById("mensaje2").innerHTML ="Debe ingresar el nombre de usuario";
          $('#alert2').slideDown();
        }
        else
        {
          if(pass.length==0)
          {
              $('#alert2').removeClass('alert-success'); 
              $('#alert2').addClass('alert-danger');
              document.getElementById("mensaje2").innerHTML ="Debe ingresar la contraseña";
              $('#alert2').slideDown();
          }
          else
          {
            if(tipo==0)
            {
              $('#alert2').removeClass('alert-success'); 
              $('#alert2').addClass('alert-danger');
              document.getElementById("mensaje2").innerHTML ="Debe seleccionar el tipo de usuario";
              $('#alert2').slideDown();

            }
            else
            {
              $('#editando').slideDown();
              $.ajax({
                type:"POST",
                data:{id:id,nombre:nombre,pass:pass,tipo:tipo,nom:nom},
                url:"<?php echo base_url();?>mantenedores/editar_usuario",
                success:function(data)
                {
                  $('#editando').slideUp();
                  var respuesta=data.split(':::');

                  if(respuesta[0]=='OK')
                  {
                    $('#id-edit').val('');
                    $('#usuario-edit').val('');
                    $('#password-edit').val('');
                    $('#nombre_persona-edit').val('');
                    $('#tipo_usuario-edit').val(0);
                    swal("Actualizado", respuesta[1], "success");
                  }
                  else
                  {
                    if(respuesta[0]=='EXISTENTE')
                    {
                       swal("Existente", respuesta[1], "error");
                    }
                    else
                    {
                       swal("Ups!!", respuesta[1], "error");
                    }
                  }
                }
                });
            }
          }
        }
      }
      
   });

});
  </script>