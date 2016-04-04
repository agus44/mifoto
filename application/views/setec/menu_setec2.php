<div class="row">
    <div class="col-sm-4 col-md-3 sidebar">
    <div class="mini-submenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </div>
    <div class="list-group">
        <span href="#" class="list-group-item" style="background-color:black; color:#FFFFFF;">
            Menú Compras
            <span class="pull-right" id="slide-submenu" style="background-color:black; color:#CC0000;">
                <i >x</i>
            </span>
        </span>
        <a href="<?php echo base_url();?>setec/lista_tarea" class="list-group-item">
            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Lista de Tareas
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
    });
   
});
</script>