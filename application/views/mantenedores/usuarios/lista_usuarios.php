<script>
$(document).ready(function() {
    $('#example').dataTable
  ({
    "bLengthChange": true,
    "bFilter": true,
    "bAutoWidth":true,
    "sDom": '<"top"fl>rt<"bottom"pi><"clear">',
    "sPaginationType": "full_numbers",
    "oLanguage": {
           "sSearch": "Filtrar:",
           "sInfoEmpty": "Sin registros",
           "sZeroRecords": "No se encontraron registros",
           "sInfo": "Est&aacute;s viendo _END_ de _TOTAL_ registros",
           "sInfoFiltered": "(filtrados de _MAX_ registros totales)",
           "oPaginate": {
            "sFirst":    "Primero ",
            "sPrevious": " << ",
            "sNext":     " >> ",
            "sLast":     " &Uacute;ltimo"
                }
          }
  });
});
</script>
<div class="container">
<center>
<h3>Listado de Usuarios</h3>
</center>
 <div class="row">
 <div class="col-lg-11 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-12 col-xs-12">
 <div class="table-responsive">
<table id="example" class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Usuario</th>
                <th>Password</th>
                <th>Tipo Usuario</th>
            </tr>
        </thead>        
        <tbody>
            <?php
            foreach($usuarios as $row)
            {
            ?>
            <tr>
            	<td><?=$row->id?></td>
            	<td><?=$row->usuario?></td>
            	<td><?=$row->pass?></td>
            	<td><?=$row->nom_tipo?></td>
            </tr>
            <?php
        	}
            ?>
        </tbody>
    </table>  
 </div>
</div>
</div>
</div>
