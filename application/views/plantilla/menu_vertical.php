
<div class="barra_vertical">
<ul class="nav nav-pills nav-stacked navbar-inverse">
  <li role="tab" class="active" data-toggle="tab"><a href="#" class="a-blanco">Usuarios</a></li>
  <li role="tab" data-toggle="tab"><a href="#" class="a-blanco">Menú</a></li>
  <li role="tab" data-toggle="tab"><a href="#" class="a-blanco">Permisos</a></li>
</ul>
</div>

 <script>
	 $(document).ready(function()
	{
		$('#myTabs a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		});
	});
 </script>

