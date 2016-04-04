<!--<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header" id="">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-aux" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="">Menú Ordenes de Compras</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-aux">
      <ul class="nav navbar-nav">
          <li><a href="<?php echo base_url();?>compras/ingreso_oc"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ingresar</a></li>
          <li><a href="<?php echo base_url();?>compras/editar_oc"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a></li>
          <li><a href="<?php echo base_url();?>compras/eliminar_oc"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar</a></li>
          <li><a href="<?php echo base_url();?>compras/listado_oc"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Listado Ordenes de Compra</a></li>
      </ul>
    </div>
  </div>
</nav>-->

<div class="row">
    <div class="col-sm-4 col-md-3 sidebar">
    <div class="mini-submenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </div>
    <div class="list-group activo">
        <span href="#" class="list-group-item " style="background-color:black; color:#FFFFFF;">
            Menú Compras
            <span class="pull-right" id="slide-submenu" style="background-color:black; color:#CC0000;">
                <i >x</i>
            </span>
        </span>
        <a href="<?php echo base_url();?>compras/ingreso_oc" class="list-group-item">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ingresar OC
        </a>
        <a href="<?php echo base_url();?>compras/editar_oc" class="list-group-item">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar OC
        </a>
        <a href="<?php echo base_url();?>compras/eliminar_oc" class="list-group-item">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Eliminar OC
        </a>
        <a href="<?php echo base_url();?>compras/listado_oc" class="list-group-item">
            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Listado de Ordenes de Compra
        </a>
    </div>        
</div>
</div>

<script>
function minimizar()
{
  $('.list-group').fadeOut('slide',function(){            
           $('.mini-submenu').fadeIn();    
  });
}
$(document).ready(function()
{
   minimizar();
    $('#slide-submenu').on('click',function() {                 
        $(this).closest('.list-group').fadeOut('slide',function(){
            $('.mini-submenu').fadeIn();    
        });
        
      });

    $('.mini-submenu').on('click',function(){       
        $(this).next('.list-group').toggle('slide');
        $('.mini-submenu').hide();
      //$('.mini-submenu').fadeIn(); 
    });
 
});
</script>