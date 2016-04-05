<style>
.table td, .table th {
    min-width: 140px;
}
</style>
<div class="container">
	<center><h4>Ingreso Datos de Remuneraciones</h4></center>
	<div class="table-responsive">
		<div class="row">
	       	<div class="col-sm-6 col-lg-4">
	          <label class="col-md-4 control-label">Fecha</label>
	          <div class="col-md-6 input-group input-append date" style="margin-bottom: 25px" data-provide="datepicker" date-format="dd-mm-yyyy">
	          	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
	            <input type="text" class="form-control requerido" id="fecha1" name="fecha1" value="<?=date('d-m-Y')?>"/>
	          </div>
	      	</div>
	    </div><br><br>

	     <table id="listado" width="auto"  class="table table-bordered">
	     	<tr class="dark">
	     		<td colspan="6" style="text-align:center"><strong>Datos del Trabajador</strong></td>
	     		<td colspan="2" style="text-align:center"><strong>Estado</strong></td>
	     		<td colspan="4"> </td>
	     		<td colspan="2" style="text-align:center"><strong>Atrasos</strong></td>
	     		<td colspan="4"> </td>
	     		<td colspan="2" style="text-align:center"><strong>Periodo</strong></td>
	     	</tr>
	     	<tr class="dark">
	     		<td>R.U.T</td>
	     		<td>Nombre Trabajador</td>
	     		<td>Tienda</td>
	     		<td class="td-60">Fecha Ingreso</td>
	     		<td>Cargo</td>
	     		<td>Mes</td>
	     		<td>Jornada</td>
	     		<td>Estado</td>
	     		<td>Fecha de Desvinculación</td>
	     		<td>Dias Trabajados</td>
	     		<td>Días de Ausencia</td>
	     		<td>Días de Licencia</td>
	     		<td>Horas</td>
	     		<td>Minutos</td>
	     		<td>Bono Compensatorio</td>
	     		<td>Horas Extras</td>
	     		<td>Días Festivos</td>
	     		<td>Días de vacaciones</td>
	     		<td>Desde</td>
	     		<td>Hasta</td>
	     	</tr>
	     	<tr>
	     		<td>16.844.428-1</td>
	     		<td>Pablo Barría Reyes</td>
	     		<td>Talca</td>
	     		<td><input type="text" class="form-control requerido" id="f1" name="f1" value="" size="8"/></td>
	     		<td>
	     			<select id="cargo" name="cargo" class="form-control">
	     				<option value="">Seleccione...</option>
	     				<option value="1">Jefe(A) de Sucursal</option>
	     				<option value="2">Laboratorista</option>
	     				<option value="3">Sub-Jefe Sucursal</option>
	     				<option value="4">Vendedor</option>
	     				<option value="5">Part-Time</option>
	     			</select>
	     		</td>
	     		<td><input type="text" class="form-control requerido" id="mes" name="mes" value="<?=date('m-Y');?>" readonly/></td>
	     		<td>
	     			<select id="jornada" name="jornada" class="form-control">
	     				<option value="">Seleccione...</option>
	     				<option value="1">Parcial</option>
	     				<option value="2">Completa</option>
	     			</select>
	     		</td>
	     		<td>
	     			<select id="estado" name="estado" class="form-control">
	     				<option value="">Seleccione...</option>
	     				<option value="1">Licencia Médica</option>
	     				<option value="2">Activo</option>
	     				<option value="2">Finiquitado</option>
	     			</select>
	     		</td>
	     		<td><input type="text" class="form-control requerido" id="desvin" name="desvin" value="" size="8"/></td>
	     		<td><input type="number" class="form-control requerido" id="dias_trab" name="dias_trab" value="" size="8"/></td>
	     		<td><input type="number" class="form-control requerido" id="dias_aus" name="dias_aus" value="" size="8"/></td>
	     		<td><input type="number" class="form-control requerido" id="dias_lic" name="dias_lic" value="" size="8"/></td>
	     		<td><input type="number" class="form-control requerido" id="horas" name="horas" value="" size="8"/></td>
	     		<td><input type="number" class="form-control requerido" id="minutos" name="minutos" value="" size="8"/></td>
	     		<td><input type="number" class="form-control requerido" id="bono" name="bono" value="" size="8"/></td>
	     		<td><input type="number" class="form-control requerido" id="hora_extra" name="hora_extra" value="" size="8"/></td>
	     		<td><input type="number" class="form-control requerido" id="dias_festib" name="dias_festib" value="" size="8"/></td>
	     		<td><input type="number" class="form-control requerido" id="dias_vaca" name="dias_vaca" value="" size="8"/></td>
	     		<td><input type="text" class="form-control requerido" id="desde" name="desde" value=""/></td>
	     		<td><input type="text" class="form-control requerido" id="hasta" name="hasta" value=""/></td>
	     	</tr>
	     	
	    </table>
	</div>
</div>
<script>
$(document).ready(function()
{
	$('#fecha1').datepicker({
	    format: 'dd-mm-yyyy'
	  });
	$('#f1').datepicker({
	    format: 'dd-mm-yyyy'
	  });
	$('#desvin').datepicker({
	    format: 'dd-mm-yyyy'
	  });
	$('#desde').datepicker({
	    format: 'dd-mm-yyyy'
	  });
	$('#hasta').datepicker({
	    format: 'dd-mm-yyyy'
	  });
});
</script>