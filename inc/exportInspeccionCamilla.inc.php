<?php
require_once "../PHPExcel/PHPExcel.php";
require_once "mysql_conector.inc.php";
require_once "constantes.inc.php";
require_once "tables.inc.php";
require_once "../words/words.php";

$TODOS_PROYECTOS = 100;


$sede = $_POST['sede'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];


$sedeSQL = "sede <> '$sede'";

if ($sede != $TODOS_PROYECTOS) {
    $sedeSQL = "sede = '$sede'";
}


// Se crea el objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Se asignan las propiedades del libro
$objPHPExcel->getProperties()->setCreator("SEPCON"); // Nombre del autor
$objPHPExcel->getProperties()->setLastModifiedBy("SEPCON"); //Ultimo usuario que lo modificó
$objPHPExcel->getProperties()->setTitle("Reporte Inspección de camillas"); // Titulo
$objPHPExcel->getProperties()->setSubject("reporte"); //Asunto
$objPHPExcel->getProperties()->setDescription("reporte"); //Descripción
$objPHPExcel->getProperties()->setKeywords("ssma"); //Etiquetas
$objPHPExcel->getProperties()->setCategory("Reporte excel"); //Categorias

$Titulo = array(
    'font' => array(
        'bold' => true,
        'size' => 14,
        'name' => 'Verdana',
    )
);

$subTitulo = array(
    'font' => array(
        'bold' => true,
        'size' => 9,
        'name' => 'Verdana',
        'color' => array('rgb' => 'FF0000'),
    )
);

$TituloTabla = array(
    'font' => array(
        'bold' => true,
        'size' => 9,
        'name' => 'Arial',
    )
);

$borderCellOutLine = array(
    'borders' => array(
        'outline' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '000000'),
        ),
    ),
);

$borderCellTop = array(
    'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '000000'),
        ),
    ),
);

$borderCellBottom = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '000000'),
        ),
    ),
);

$borderCellRight = array(
    'borders' => array(
        'right' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '000000'),
        ),
    ),
);

$borderCellLeft = array(
    'borders' => array(
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '000000'),
        ),
    ),
);

$borderCellAll = array(
    'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '000000'),
        ),
    ),
);

$objPHPExcel->getActiveSheet()->getStyle('A1:Z100')->getFill()->applyFromArray(array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'startcolor' => array(
        'rgb' => 'FFFFFF',
    ),
));


$backgroundCellRed = array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'startcolor' => array(
        'rgb' => 'FF0000',
    ),
);

$backgroundCellYellowLight = array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'startcolor' => array(
        'rgb' => 'FFFF00',
    ),
);

$backgroundCellGreen = array(
    'type' => PHPExcel_Style_Fill::FILL_SOLID,
    'startcolor' => array(
        'rgb' => '00DD00',
    ),
);

//estilo de fuentes
$objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($Titulo);
$objPHPExcel->getActiveSheet()->getStyle('B8:Q8')->applyFromArray($TituloTabla);


//Alineación de todos las celdas centradas
$objPHPExcel->getActiveSheet()->getStyle('A1:Z100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A1:Z100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

$objPHPExcel->getActiveSheet()->getStyle('B2:Z2000')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B2:Z2000')->getAlignment()->setWrapText(true);


//Alineación de la seccion de leyenda de acronimos
$objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

$objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
$objPHPExcel->getActiveSheet()->getStyle('I4:K7')->getAlignment()->setWrapText(true);




// Bordes que faltaban completar a los costado del reporte
$objPHPExcel->getActiveSheet()->getStyle('B4')->applyFromArray($borderCellLeft);
$objPHPExcel->getActiveSheet()->getStyle('B7')->applyFromArray($borderCellLeft);
$objPHPExcel->getActiveSheet()->getStyle('V4:V7')->applyFromArray($borderCellRight);




// =====================================CABECERA 1  DEL EXCEL ===================================================

$objPHPExcel->getActiveSheet()->getStyle('B2:V3')->applyFromArray($borderCellAll);

//LOGO DE LA EMPRESA
$objPHPExcel->getActiveSheet()->mergeCells('B2:C3');
$objPHPExcel->getActiveSheet()->getRowDimension(2)->setRowHeight(50);
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setCoordinates('B2');
$objDrawing->setName('nueva imagen');
$objDrawing->setDescription('imagen ');
$objDrawing->setPath("../img/logo.png");
$objDrawing->setHeight(80);
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
$objDrawing->setOffsetX(25);
$objDrawing->setOffsetY(5);


//TITULO DEL REPORTE
$objPHPExcel->getActiveSheet()->mergeCells('D2:O3');
$objPHPExcel->setActiveSheetIndex()->setCellValue('D2', 'Reporte de Inspección de camillas');

//FECHA Y REVISION DEL DOCUMENTO
$objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(60);
$objPHPExcel->getActiveSheet()->mergeCells('P2:V3');
$objPHPExcel->setActiveSheetIndex()->setCellValue('P2', "PSPC-120-X-PG-001-FR-003 \n Revisión:0 \n Emisión: 29/08/2019 \n Página: 1 de 1 ");


// =====================================CABECERA 2 DEL EXCEL ===================================================


$objPHPExcel->getActiveSheet()->getStyle('B5:G6')->applyFromArray($borderCellAll);

$objPHPExcel->getActiveSheet()->mergeCells('B5:C5');
$objPHPExcel->getActiveSheet()->getStyle('B5')->applyFromArray($TituloTabla);
$objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'SEDE/PROYECTO:');

$objPHPExcel->getActiveSheet()->mergeCells('D5:G5');
$objPHPExcel->setActiveSheetIndex()->setCellValue('D5', '');

$objPHPExcel->getActiveSheet()->mergeCells('B6:C6');
$objPHPExcel->getActiveSheet()->getStyle('B6')->applyFromArray($TituloTabla);
$objPHPExcel->setActiveSheetIndex()->setCellValue('B6', 'ELABORADO POR:');

$objPHPExcel->getActiveSheet()->mergeCells('D6:G6');
$objPHPExcel->setActiveSheetIndex()->setCellValue('D6', 'SSMA');

// =====================================CUERPO DEL EXCEL ===================================================


//ancho de columnas
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);


$objPHPExcel->getActiveSheet()->getRowDimension('8')->setRowHeight(50);


// Cabecera del cuerpo
$objPHPExcel->setActiveSheetIndex()->setCellValue('B8', 'item');
$objPHPExcel->setActiveSheetIndex()->setCellValue('C8', "Tipo de inspección");
$objPHPExcel->setActiveSheetIndex()->setCellValue('D8', 'Sede');
$objPHPExcel->setActiveSheetIndex()->setCellValue('E8', 'Área');
$objPHPExcel->setActiveSheetIndex()->setCellValue('F8', 'Lugar de inspección');
$objPHPExcel->setActiveSheetIndex()->setCellValue('G8', "Elaborado por");
$objPHPExcel->setActiveSheetIndex()->setCellValue('H8', "Responsable del área");
$objPHPExcel->setActiveSheetIndex()->setCellValue('I8', "fecha");
$objPHPExcel->setActiveSheetIndex()->setCellValue('J8', "Ubicación");

$objPHPExcel->setActiveSheetIndex()->setCellValue('K8', "Condicones de la camilla");
$objPHPExcel->setActiveSheetIndex()->setCellValue('L8', "Collarín cervical regulable	");
$objPHPExcel->setActiveSheetIndex()->setCellValue('M8', "Fijador de cabeza	");
$objPHPExcel->setActiveSheetIndex()->setCellValue('N8', "Ubicación de la camilla disponible	");
$objPHPExcel->setActiveSheetIndex()->setCellValue('O8', "Señalización de camilla	");
$objPHPExcel->setActiveSheetIndex()->setCellValue('P8', "Férulas neumaticas de 6 piezas	");
$objPHPExcel->setActiveSheetIndex()->setCellValue('Q8', "Arnés de sujección corporal	");
$objPHPExcel->setActiveSheetIndex()->setCellValue('R8', "Protección de la camilla	");

$objPHPExcel->setActiveSheetIndex()->setCellValue('S8', "Clasificación");
$objPHPExcel->setActiveSheetIndex()->setCellValue('T8', "Acción correctiva");
$objPHPExcel->setActiveSheetIndex()->setCellValue('U8', "Fecha de cumplimiento");
$objPHPExcel->setActiveSheetIndex()->setCellValue('V8', "Seguimiento");



//aca iran los datos de la tabla
$fila = 9;
$item = 1;
$sql = "SELECT     
            tipo_inspeccion,
            idProyecto,
            sede, 
            area,
            lugar_inspeccion,
            usuario,
            usuario_responsable,
            fecha,
            registro,
            ubicacion,
            condicion_camilla, 
            collarin_cervical, 
            fijador_cabezera, 
            ubicacion_camilla, 
            senalizacion_camilla, 
            ferula_neumatica, 
            arnes_sujecion, 
            proteccion_camilla,

            clasificacion,
            accion_correctiva,
            fecha_cumplimiento,
            seguimiento
            
            FROM view_inspeccion_camilla

WHERE
registro >= '$fecha_inicio'  AND  
registro < DATE_ADD('$fecha_fin',INTERVAL 1 DAY)  AND $sedeSQL
ORDER BY registro DESC";


$statement = $pdo->prepare($sql);
$statement->execute(array());
$results = $statement->fetchAll();
$rowaffect = $statement->rowCount($sql);



//salida de datos
if ($rowaffect > 0) {
    foreach ($results as $rs) {


        $objPHPExcel->setActiveSheetIndex()->setCellValue('B' . $fila, $item);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('C' . $fila, $rs['tipo_inspeccion']);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('D' . $fila, $rs['sede']);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('E' . $fila, $rs['area']);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('F' . $fila, $rs['lugar_inspeccion']);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('G' . $fila, strtoupper($rs['usuario']));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('H' . $fila, strtoupper($rs['usuario_responsable']));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('I' . $fila, date("d/m/Y", strtotime($rs['registro'])));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('J' . $fila, $rs['ubicacion']);

        $objPHPExcel->setActiveSheetIndex()->setCellValue('K' . $fila, valorInspeccionCamilla($rs['condicion_camilla']));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('L' . $fila, valorInspeccionCamilla($rs['collarin_cervical']));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('M' . $fila, valorInspeccionCamilla($rs['fijador_cabezera']));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('N' . $fila, valorInspeccionCamilla($rs['ubicacion_camilla']));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('O' . $fila, valorInspeccionCamilla($rs['senalizacion_camilla']));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('P' . $fila, valorInspeccionCamilla($rs['ferula_neumatica']));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('Q' . $fila, valorInspeccionCamilla($rs['arnes_sujecion']));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('R' . $fila, valorInspeccionCamilla($rs['proteccion_camilla']));

        
        $objPHPExcel->setActiveSheetIndex()->setCellValue('S' . $fila, valorCalificacion($rs['clasificacion']));
        $objPHPExcel->setActiveSheetIndex()->setCellValue('T' . $fila, $rs['accion_correctiva']);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('U' . $fila, $rs['fecha_cumplimiento']);
        $objPHPExcel->setActiveSheetIndex()->setCellValue('V' . $fila, $rs['seguimiento']);

        $fila++;
        $item++;
    }
};

// Bordes para todos las celdas que contengan informacion acerca del reporte
$objPHPExcel->getActiveSheet()->getStyle('B8:V' . $fila)->applyFromArray($borderCellAll);

// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Matriz');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('../reports/inspeccionCamilla.xlsx');
exit();