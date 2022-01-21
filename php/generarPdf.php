<?php
    require 'operaciones_bd.php';//LLamo al archivo que conecta con la base de datos
    $operaciones=new Operaciones();
    $titulos= $operaciones->consultar('SELECT');
    $resultado=$operaciones->consultar('SELECT * FROM empleados;');
    require '../fpdf/fpdf.php';//LLamo al archivo que genera el pdf
    //require '../fpdf/mysql_table.php';
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,0,'PDF de la base de datos de Empleados',0,0,'C');
    $pdf->Ln();


    //Saco los datos de la base de datos en una tabla
    foreach($resultado as $row) {
        $pdf->SetFont('Arial','',12);	
        $pdf->Ln();
        foreach($row as $column)
            $pdf->Cell(30,12,$column,1);
    }


    $pdf->Output();
?>