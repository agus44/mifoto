<html>
<head>
	@include('plantilla')
<style>
body{
  background-image:url('fondo.jpg');
  background-repeat:no-repeat;
}
</style>
</head>
<body >
<div class="login-box animated fadeInDown">
      <div class="login-logo">
        <a href="../../index2.html" style="color:#ffffff"><b >Titan Development Solutions</b><br> Tomahawk Sytem</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Ingresa para iniciar tu sesión</p>
        <form action="{{ URL::to('login') }}" method="post" role="form" id="form" name="form">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nombre de Usuario" id="usuario" name="usuario">
            <span class="glyphicon  glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" id="clave" name="clave">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fadeInDown">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                      <h4>
                        <i class="icon fa fa-ban"></i>
                        Datos Incorrectos
                      </h4>
                        {{ Session::get('error') }}
                    </div>
                        @endif
           <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
          <div class="form-group has-feedback">
            <center><button class="btn btn-primary" type="submit">Ingresar</button></center>
          </div>
        </form>
      </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</body>
</html>
