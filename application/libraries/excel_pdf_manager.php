<?php
require_once 'excel/PHPExcel.php';
require_once 'excel/PHPExcel/IOFactory.php';
 
class Excel_pdf_manager
{      
    function import($filename)
    {
  		     
    }
 
    function exportOC($datos)
    {
    
        $objPHPExcel = new PHPExcel();                                               
        $objPHPExcel->getProperties()->setCreator("Pablo Barría");  
        $objPHPExcel->setActiveSheetIndex(0);                                 
        $objPHPExcel->getActiveSheet()->setTitle("Hoja1");           
        
        

        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0,1,'N° Orden de Compra');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1,1,'Rut Proveedor');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2,1,'Proveedor');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3,1,'Dirección');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4,1,'Contacto');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(5,1,'Responsable');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(6,1,'Fecha');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(7,1,'¿Necesita Autorización?');
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(8,1,'Departamento');
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(9,1,'Descuento');
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(10,1,'Código');
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(11,1,'Descripción');
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(12,1,'Cantidad');
		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(13,1,'Precio Unitario');
    
    	$column = 0;
        $row = 2;
        foreach ($datos as $record)
        {
            $oc=$record->orden_de_compra;
        	$rut=$record->rut_proveedor;
            /**Sacando puntos del rut**/
            $rut=str_replace('.','', $rut);

        	$prov=$record->a;
        	$dir=$record->direccion_proveedor;
        	$contacto=$record->at;
        	$respon=$record->De;
        	$fecha=$record->Fecha;
        	$aut=$record->Gerencia;
        	$depto=$record->Departamento;
        	$descto=$record->descuento;
        	$codigo=$record->codigo;
        	$prod=$record->Descripcion;
        	$cantidad=$record->cantidad;
        	$precio=$record->precio_unit;


        	   
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$oc);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$rut);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$prov);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$dir);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$contacto);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$respon);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$fecha);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$aut);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$depto);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$descto);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$codigo);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$prod);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$cantidad);
                        $column++;
                        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($column, $row,$precio);
                        $column++;
              
                $column = 0;
                $row++;
        }
 
        //poniendo en negritas la fila de los títulos
        $styleArray = array('font' => array('bold' => true));
        $objPHPExcel->getActiveSheet()->getStyle('A1:Z1')-> applyFromArray($styleArray);  
 
        //poniendo columnas con tamaño auto según el contenido, asumiendo N como la última
        for ($i = 'A'; $i<= 'N'; $i++)
                $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename=excelOrdenesCompras.xls');
		header('Cache-Control: max-age=0');
		$objWriter->save('php://output');
    }    
}

?>