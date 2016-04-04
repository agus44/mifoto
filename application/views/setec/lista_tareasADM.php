<script>
$(document).ready(function()
{
	$('#listado').dataTable
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


<div class="container-fluid">
	<center>
		<h3>Lista de Tareas Devoluciones</h3>


			<div class="table-responsive">
			    <table id="listado" width="100%"  class="table  table-bordered">
			    	<thead>
            		<tr class="dark">
            		<th>N° CTM</th>
            		<th>Tarea a Realizar</th>
            		</tr>
            		</thead>
            		<tbody>
            		<?php
            		foreach($devoluciones as $row)
            		{?>
            			<tr>
            				<td><?=$row->id_setec;?></td>
            				<td><?=$row->id_estado;?></td>
            			</tr>

            		<?php
            		}
            		?>	
            		</tbody>
            	</table>
			</div>
			
		
	</center>
</div>

