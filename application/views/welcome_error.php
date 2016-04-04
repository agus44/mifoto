<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<center><h1>Sistema de Distribución Logística</h1></center>


		<div class="container">

      <form class="form-signin" method="post" action="login/login">
        <h4 class="form-signin-heading">Bienvenido(/a)</h4>
        
        <label for="inputUsuario" class="sr-only">Usuario</label>
        <input type="text" id="inputUsuario" name="inputUsuario" class="form-control" placeholder="Usuario" required autofocus>
        <BR>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Contraseña" required>
        <div class="row">
			<div class="col-md-12">
					<div class="alert alert-danger alert-dismissable" id="alert1">
                        <button type="button" class="close"aria-hidden="true" id="boton-alert1">x</button>
                        <strong>Atención</strong>  Usuario o contraseña no válidos</p>
                        </div>

			</div>
		</div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      </form>
	</div>

  <script>
  $(document).ready(function()
  {
   $('#boton-alert1').click(function()
    {
     $('#alert1').slideUp(); 
    });
  });
  </script>