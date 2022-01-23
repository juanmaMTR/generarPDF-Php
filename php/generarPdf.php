<?php
    require 'operaciones_bd.php';//LLamo al archivo que conecta con la base de datos
    $operaciones=new Operaciones();
    $titulos= $operaciones->consultar('SELECT COLUMN_NAME FROM `empleados`.`COLUMNS`');
    $resultado=$operaciones->consultar('SELECT * FROM empleados;');
    require '../fpdf/fpdf.php';//LLamo al archivo que genera el pdf
    $pdf=new FPDF(); //Lo instancio para utilizar sus métodos.
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(0,0,'PDF de la base de datos de Empleados',0,0,'C');
    $pdf->Ln('30');

    /*foreach($titulos as $titulo){
        foreach($titulo as $fila_titulo){
            $pdf->Cell(30,12,$fila_titulo,1);
        }
    }*/
    //$pdf->Cell(30,12,$titulos,1);

    //Saco los datos de la base de datos en una tabla
    foreach($resultado as $fila) {
        $pdf->SetFont('Arial','',12);
        $pdf->Ln();
        foreach($fila as $columna)
            $pdf->Cell(30,12,$columna,1);
    }


    $pdf->Output();
?>