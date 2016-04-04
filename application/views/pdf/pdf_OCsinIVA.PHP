<?php

include("../../libraries/tcpdf/font/times.php"); //fpdf
$this->load->library('fpdf'); //fpdf

$nombre="";
$fpdf = new FPDF();

ob_end_clean();

$fpdf->AddPage();
$fpdf->SetAuthor("Pablo Barría - Departamento de Informática", true);
$fpdf->SetCreator("Pablo Barría - Departamento de Informática", true);

$fpdf->SetFont('Arial', '', 17);
$fpdf->SetTextColor("0", "0", "0"); 
$fpdf->Image(base_url() . 'images/logo2.png',135,8,78);
$fpdf->SetFont('Arial','B',9);
$fpdf->SetFont('Arial','B',9);
$fpdf->Cell(30,11,'Wurth Chile Ltda.'); $fpdf->Ln(4);
$fpdf->Cell(30,11,'78.701.740-1'); $fpdf->Ln(4);
$fpdf->Cell(30,11,'Coronel Santiago Bueras 1345'); $fpdf->Ln(4);
$fpdf->Cell(30,11,'Padre Hurtado, RM'); $fpdf->Ln(4);
$fpdf->Cell(30,11,'E-mail:   wurth@wurth.cl'); $fpdf->Ln(4);
$fpdf->Cell(30,11,'Web:  www.wurth.cl'); $fpdf->Ln(4);
$fpdf->Cell(30,11,'Tel:  (56-2) 25772100 '); $fpdf->Ln(10);
/*********************************************/
foreach($encabezado as $row1)
{
    $rut=$row1->rut_proveedor;
    $proveedor=$row1->a;
    $contacto=$row1->at;
    $responsable=$row1->De;
    $direccion=$row1->direccion_proveedor;
    $fecha=$row1->Fecha;
    $f=explode('-',$fecha);
    $fecha=$f[2].'-'.$f[1].'-'.$f[0];
    $c1=$row1->Comentario;
    $c2=$row1->Comentario2;
    $c3=$row1->Comentario3;
    $c4=$row1->Comentario4;
    $c5=$row1->Comentario5;
    $cadena=$c1.''.$c2.''.$c3.''.$c4.''.$c5;
     $Depto=$row1->Departamento;
    $jefe=$row1->solicitante;
    $moneda=$row1->moneda;
    $forma=$row1->forma_pago;
    $descuento=$row1->descuento;
    $desc=$descuento/100;
}
/********************************************/



$fpdf->SetFont('Arial','B',10);
$fpdf->SetXY(70,40);
$fpdf->Cell(70,10,utf8_decode("ORDEN DE COMPRA ".$num),0,0,'C'); 
$fpdf->SetLineWidth(0.2);
$fpdf->Line(10, 50, 210-10, 50);
$fpdf->Ln(15);
$fpdf->SetFont('Arial','B',10);
$fpdf->Cell(28,3,utf8_decode('R.U.T'));
$fpdf->Cell(10);
$fpdf->SetFont('Arial','',10);
$fpdf->Cell(28,3,utf8_decode($rut));
$fpdf->Ln(6);
$fpdf->SetFont('Arial','B',10);
$fpdf->Cell(28,3,utf8_decode('Proveedor'));
$fpdf->Cell(10);
$fpdf->SetFont('Arial','',10);
$fpdf->Cell(28,3,utf8_decode($proveedor));
$fpdf->Ln(6);
$fpdf->SetFont('Arial','B',10);
$fpdf->Cell(28,3,utf8_decode('Dirección'));
$fpdf->Cell(10);
$fpdf->SetFont('Arial','',10);
$fpdf->Cell(28,3,utf8_decode($direccion));
$fpdf->Ln(6);
$fpdf->SetFont('Arial','B',10);
$fpdf->Cell(28,3,utf8_decode('Contacto'));
$fpdf->Cell(10);
$fpdf->SetFont('Arial','',10);
$fpdf->Cell(28,3,utf8_decode($contacto));
//$fpdf->Line(45, 50, 45-0, 91);
$fpdf->Line(10, 81, 210-10, 81);
$fpdf->Line(10, 105, 210-10, 105);
$fpdf->Ln(12);
$fpdf->SetFont('Arial','B',10);
$fpdf->Cell(28,3,utf8_decode('Responsable'));
$fpdf->Cell(10);
$fpdf->SetFont('Arial','',10);
$fpdf->Cell(28,3,utf8_decode($responsable));
$fpdf->SetFont('Arial','B',10);
$fpdf->Cell(25);
$fpdf->Cell(15,3,utf8_decode('Fecha'));
$fpdf->Cell(15);
$fpdf->SetFont('Arial','',10);
$fpdf->Cell(28,3,utf8_decode($fecha));
$fpdf->Ln(6);
$fpdf->SetFont('Arial','B',10);
$fpdf->Cell(28,3,utf8_decode('Departamento'));
$fpdf->Cell(10);
$fpdf->SetFont('Arial','',10);
$fpdf->Cell(28,3,utf8_decode($Depto));
$fpdf->Cell(25);
$fpdf->SetFont('Arial','B',10);
$fpdf->Cell(15,3,utf8_decode('Jefe Dpto'));
$fpdf->Cell(15);
$fpdf->SetFont('Arial','',10);
$fpdf->Cell(28,3,utf8_decode($jefe));
$fpdf->Ln(6);
$fpdf->SetFont('Arial','B',10);
$fpdf->Cell(28,3,utf8_decode('Unidad de Compra'));
$fpdf->Cell(10);
$fpdf->SetFont('Arial','',10);
$fpdf->Cell(28,3,utf8_decode($moneda));
$fpdf->Cell(25);
$fpdf->SetFont('Arial','B',10);
$fpdf->Cell(15,3,utf8_decode('Forma de Pago'));
$fpdf->Cell(15);
$fpdf->SetFont('Arial','',10);
$fpdf->Cell(28,3,utf8_decode($forma));


$fpdf->Ln(10);
$fpdf->SetFont('Arial','B',12);
$fpdf->Cell(20,3,utf8_decode('Detalle'));
/*$fpdf->Cell(40);
$fpdf->Cell(28,3,utf8_decode($num));*/
$fpdf->Ln(10);
$fpdf->SetLineWidth(0.2);
$fpdf->SetFont('Arial','B',8);
$fpdf->SetTextColor(0,0,0);  // Establece el color del texto (en este caso es blanco) 
$fpdf->SetFillColor(255, 255, 255);
$fpdf->Cell(40,5,utf8_decode('CÓDIGO'),'T',0,'C',true);
$fpdf->Cell(62,5,utf8_decode('DESCRIPCIÓN'),'T',0,'C',true);
$fpdf->Cell(20,5,utf8_decode('CANTIDAD'),'T',0,'C',true);
$fpdf->Cell(38,5,utf8_decode('PRECIO UNIT'),'T',0,'C',true);
$fpdf->Cell(30,5,utf8_decode('SUBTOTAL'),'T',0,'C',true);
$fpdf->Ln(5);
$fpdf->Cell(188,5,'','T',0,'C',true);
$fpdf->Ln(5);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetFont('Arial','',8);

$total=0;
foreach($detalle as $row2)
{
    $codigo=$row2->codigo;
    $producto=$row2->Descripcion;
    $cantidad=$row2->cantidad;
    $precio=$row2->precio_unit;
    $subtotal=$cantidad*$precio;

    $total=$subtotal+$total;
    $fpdf->Cell(40,5,utf8_decode($codigo),0,0,'C');
    $fpdf->Cell(62,5,utf8_decode($producto),0,0,'C');
    $fpdf->Cell(20,5,utf8_decode($cantidad),0,0,'C');
    $fpdf->Cell(38,5,'$ '.number_format($precio, 0, '', '.'),0,0,'C');
    $fpdf->Cell(30,5,'$ '.number_format($subtotal, 0, '', '.'),0,0,'C');
           
    $fpdf->Ln(5);
}
$fpdf->Ln(5);
$fpdf->Cell(188,5,'','T',0,'C',true);

$fpdf->Ln(5);
$fpdf->Cell(122);
//$fpdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco) 
//$fpdf->SetFillColor(204, 0, 0);
$fpdf->SetFont('Arial','B',8);
$fpdf->Cell(38,5,utf8_decode('SUB-TOTAL'),0,0,'C',true);
$total=$total;          
$fpdf->SetTextColor(0,0,0);
$fpdf->SetFont('Arial','',8);
$fpdf->Cell(30,5,'$ '.number_format($total, 0, '', '.'),0,0,'R');
$fpdf->Ln(5);
$fpdf->Cell(120);

$DESCUENT=$total*$desc;
//$fpdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco) 
//$fpdf->SetFillColor(204, 0, 0);
$fpdf->SetFont('Arial','B',8);
$fpdf->Cell(38,5,utf8_decode('DSCTO ( '.$descuento.'% )'),0,0,'C',true);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetFont('Arial','',8);
$fpdf->Cell(32,5,'$ '.number_format($DESCUENT, 0, '', '.'),0,0,'R');

$fpdf->Ln(5);
$fpdf->Cell(122);
//$fpdf->SetTextColor(255,255,255);  // Establece el color del texto (en este caso es blanco) 
//$fpdf->SetFillColor(204, 0, 0);
$fpdf->SetFont('Arial','B',8);
$fpdf->Cell(38,5,utf8_decode('TOTAL NETO'),'T',0,'C',true);
$total_final=$total-($total*$desc);          
$fpdf->SetTextColor(0,0,0);
$fpdf->SetFont('Arial','B',8);
$fpdf->Cell(30,5,'$ '.number_format($total_final, 0, '', '.'),'T',0,'R');
$fpdf->Ln(15);

if(!empty($cadena) || $cadena!='')
{
    $fpdf->SetFont('Arial','B',14);
    $fpdf->Cell(20,3,utf8_decode('Observaciones'));
    $fpdf->Ln(8);
    $fpdf->SetFont('Arial','',10);
    $fpdf->MultiCell(192,15,utf8_decode($cadena),1,'L',false);
}

$fpdf->Ln(25);
$fpdf->Cell(20,5,utf8_decode('______________________________________'));

if($total_final>=300000)
{
 $fpdf->Cell(100);   
 $fpdf->Cell(20,5,utf8_decode('________________________________________'));
}


$fpdf->Ln(5);
$fpdf->SetFont('Arial','',12);
$fpdf->Cell(10);
$fpdf->Cell(20,5,utf8_decode('PATRICIA GALVEZ'));

if($total_final>=300000)
{
$fpdf->Cell(95);
$fpdf->Cell(20,5,utf8_decode('STEFAN DE BERNARDINIS'));
}

$fpdf->Ln(5);
$fpdf->SetFont('Arial','B',12);
$fpdf->Cell(8);
$fpdf->Cell(20,5,utf8_decode('JEFE DE COMPRAS'));
if($total_final>=300000)
{
$fpdf->Cell(102);
$fpdf->Cell(20,5,utf8_decode('GERENTE GENERAL'));
}

$fpdf->SetFont('Arial','B',10);
$fpdf->Ln(15);
$fpdf->Cell(200,5,utf8_decode('Favor enviar productos con Guía de Despacho, Factura y Orden de Compra a Coronel Santiago Bueras 1345,'));
$fpdf->Ln(5);
$fpdf->Cell(200,5,utf8_decode('Comuna Padre Hurtado, Santiago, Chile.'));
$fpdf->Ln(10);
$fpdf->SetFont('Arial','',10);
$fpdf->Cell(200,5,utf8_decode('Recepción de mercaderia 9:00 a 14:00 horas y de 15:00 a 16:30 horas.'));

$fpdf->Output($num.".pdf","I");


?>