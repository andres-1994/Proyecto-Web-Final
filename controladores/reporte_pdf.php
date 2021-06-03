<?php 

require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    /*$this->Image('logo.png',10,8,33);*/
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Lista de Empleados Teisa',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    //cabecera de mi tabla
    $this->Cell(18,10,'Codigo', 1, 0, 'C', 0);
	$this->Cell(22,10,'Nombre', 1, 0, 'C', 0);
	$this->Cell(25,10,'Apellido', 1, 0, 'C', 0);
	$this->Cell(25,10,'Telefono', 1, 0, 'C', 0);
	$this->Cell(50,10,'Correo', 1, 0, 'C', 0);
	$this->Cell(50,10,'Direccion', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require 'conexion.php';

$consulta = "SELECT CONCAT(codigo,id) codigo, nombre, apellido, telefono, correo, direccion FROM datos_usuarios";

$resultado = $conexion->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

while($row = $resultado->fetch_assoc()){

	$pdf->Cell(18,10,$row['codigo'], 0, 0, 'C', 0);
	$pdf->Cell(22,10,$row['nombre'], 0, 0, 'C', 0);
	$pdf->Cell(25,10,$row['apellido'], 0, 0, 'C', 0);
	$pdf->Cell(25,10,$row['telefono'], 0, 0, 'C', 0);
	$pdf->Cell(50,10,$row['correo'], 0, 0, 'C', 0);
	$pdf->Cell(50,10,$row['direccion'], 0, 1, 'C', 0);
}

$pdf->Output();