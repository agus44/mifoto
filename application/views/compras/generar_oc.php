<div class="container">
<center>
<h2>Generar Documentos Ordenes de Compra</h2>
 <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12">
          <label class="control-label">N° Orden de Compra</label>
          <div class="col-lg-5 col-md-5 col-sm-5 input-group" style="margin-bottom: 25px">
          	<span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
            <input type="text" class="form-control requerido" id="oc" name="oc" placeholder="N° Orden de Compra"/>
          </div>
      </div>
 </div>
 <button type="button" class="btn btn-success" id="OC_conIVA" name="OC_conIVA">
                  <span class="glyphicon glyphicon-open-file"></span>  Orden con I.V.A
                  </button><br><br>
  <button type="button" class="btn btn-info" id="OC_sinIVA" name="OC_sinIVA">
                  <span class="glyphicon glyphicon-save-file"></span>  Orden sin I.V.A
                  </button><br><br>
 </div>

 <script>
 $(document).ready(function()
 {
 	$('#OC_conIVA').click(function()
 	{
 		var oc=$('#oc').val();

 		if(oc.length!=0)
 		{
      $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>compras/verificar_oc",
          data:{oc:oc},
          success:function(data)
          {
            var Resdata=data.split(':::');
            if(Resdata[0]!='ERROR')
            {
              window.open('<?php echo base_url();?>pdf/pdf_OCconIVA/'+oc,'_blank');
            }
            else
            {
              swal("Aviso", "El número de compra ingresado no existe", "error");
            }

          }
      });
 			
 		}
 	});

 	$('#OC_sinIVA').click(function()
 	{
 		var oc=$('#oc').val();

 		if(oc.length!=0)
 		{
       $.ajax({
          type:"POST",
          url:"<?php echo base_url();?>compras/verificar_oc",
          data:{oc:oc},
          success:function(data)
          {
            var Resdata=data.split(':::');
            if(Resdata[0]!='ERROR')
            {
 			        window.open('<?php echo base_url();?>pdf/pdf_OCsinIVA/'+oc,'_blank');
            }
            else
            {
              swal("Aviso", "El número de compra ingresado no existe", "error");
            }

          }
      });
 		}

 	});


 });
 </script>
