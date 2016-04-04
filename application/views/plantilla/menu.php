<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url();?>dashboard/index">Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <?php
          foreach($lista_menu as $row)
          {
            if($row->id_padre==null && $row->id_menu!=1 && $row->id_menu!=11)
            {
            ?>
             <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$row->nom_menu?><span class="caret"></span></a>
            <ul class="dropdown-menu"> 
            <?php
              foreach($lista_submenu as $row2)
              {
                if($row->id_menu==$row2->id_padre)
                {
                ?>

                <li><a href="<?=base_url().$row2->url?>"><?=$row2->nom_menu?></a></li>
            <?php
                }
              }

            ?>
            </ul>
            </li>

            
            <?php
            }
          }
          ?>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">

      <?php
          foreach($lista_menu as $row)
          {
            if($row->id_padre==null && $row->id_menu==1 || $row->id_menu==11)
            {
            ?>
             <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$row->nom_menu?><span class="caret"></span></a>
            <ul class="dropdown-menu"> 
            <?php
              foreach($lista_submenu as $row2)
              {
                if($row->id_menu==$row2->id_padre)
                {
                ?>

                <li><a href="<?=base_url().$row2->url?>"><?=$row2->nom_menu?></a></li>
            <?php
                }
              }

            ?>
            </ul>
            </li>

            
            <?php
            }
          }
          ?>


        <li><a href="<?=base_url().'login/logout'?>"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar Sesión</a></li>     
      </ul>
    </div>
  </div>
</nav>


