<div class="row">
    <div class="col-sm-4 col-md-3 sidebar">
    <div class="mini-submenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </div>
    <div class="list-group">
        <span href="#" class="list-group-item active">
            Menú Informes Compras
            <span class="pull-right" id="slide-submenu">
                <i >x</i>
            </span>
        </span>
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
   //minimizar();
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