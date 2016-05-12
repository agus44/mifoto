<html>
<head>
	@include('plantilla')
</head>
<body  class="hold-transition login-page">
<div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>Tomahawk GT</b>Softwares</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Ingresa para iniciar tu sesión</p>
        <form action="../../index2.html" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nombre de Usuario" id="usuario" name="usuario">
            <span class="glyphicon  glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="clave" name="clave">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <center><button class="btn btn-primary">Ingresar</button></center>
          </div>
        </form>
      </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</body>
</html>
