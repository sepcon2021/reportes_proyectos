<?php 
    require_once("../PHPExcel/PHPExcel.php");
    require_once("mysql_conector.inc.php");
    require_once("constantes.inc.php");
    require_once("tables.inc.php");



    $mes    = $_POST['me'];
    $anio   = $_POST['an'];

    // Se crea el objeto PHPExcel
    $objPHPExcel = new PHPExcel();

    // Se asignan las propiedades del libro
    $objPHPExcel->getProperties()->setCreator("Helena Minaya"); // Nombre del autor
    $objPHPExcel->getProperties()->setLastModifiedBy("Helena Minaya"); //Ultimo usuario que lo modificó
    $objPHPExcel->getProperties()->setTitle("Reporte Tarjetas Top"); // Titulo
    $objPHPExcel->getProperties()->setSubject("Reporte Excel con PHP y MySQL"); //Asunto
    $objPHPExcel->getProperties()->setDescription("Reporte de Tops"); //Descripción
    $objPHPExcel->getProperties()->setKeywords("tarjetas tops"); //Etiquetas
    $objPHPExcel->getProperties()->setCategory("Reporte excel"); //Categorias
       
    $Titulo = array(
     'font'  => array(
     'bold'  => true,
     'size'  => 14,
     'name'  => 'Verdana'
    ));

    $TituloTabla = array(
     'font'  => array(
     'bold'  => true,
     'size'  => 9,
     'name'  => 'Arial'
    ));

    // Crea un nuevo objeto PHPExcel
    $objPHPExcel = new PHPExcel();

    //combinar celdas
    $objPHPExcel->getActiveSheet()->mergeCells('B3:U3');

    //estilo de fuentes
    $objPHPExcel->getActiveSheet()->getStyle('B3')->applyFromArray($Titulo);
    $objPHPExcel->getActiveSheet()->getStyle('B5:Z5')->applyFromArray($TituloTabla);

    //alineacion
    $objPHPExcel->getActiveSheet()->getStyle('B3:M3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getActiveSheet()->getStyle('B5:Z5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    //Titulo 
    $objPHPExcel->getActiveSheet()->setCellValue('B3','REPORTE DE TARJETAS TOPS');

    $objPHPExcel->getActiveSheet()->getStyle('B5:Z2000')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
    $objPHPExcel->getActiveSheet()->getStyle('B5:Z2000')->getAlignment()->setWrapText(true);
        
          
            //ancho de columnas
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(50);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(22);
            $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
            $objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
            $objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(100);
            $objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(35);
        
            $objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(35);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(35);

            //alto de la fila
            $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(50);

  
            //alto de la fila
            $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(50);
        
            // Agregar Informacion
        
            $objPHPExcel->setActiveSheetIndex()->setCellValue('B5', 'ID');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('C5', 'Reportado por');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('D5', 'Proyecto');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('E5', 'Área');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('F5', 'Ubicación');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('G5', 'Área observada');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('H5', 'Puesto del observado');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('I5', 'Tiempo en el proyecto');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('J5', 'Horario');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('K5', 'Rango de edad');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('L5', 'Fecha');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('M5', 'Tipo de observación');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('N5', 'Detalle del Tipo de Observación');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('O5', 'Relacionado con');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('P5', 'Otros');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Q5', 'Tipo Epp');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('R5', 'Condición del epp');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('S5', 'Descripción de la Observación Acto o condición/Casi Accidente');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('T5', 'Acción Inmediata (correctiva)/Que medidas correctivas se tomaron para eliminar el acto o condición sub estandar');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('U5', 'Potencial del Riesgo');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('V5', 'Evidencia de la observación/caso accidente encontrado(registro,imagen o foto,otros)');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('W5', 'Lesión');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('X5', 'Obstaculo');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Y5', 'Cambio observado');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Z5', 'Retroalimentación');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AA5', 'Reincidente');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AB5', 'Comentario');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AC5', 'DNI');
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AD5', 'Responsable');

        

        //aca iran los datos de la tabla
        $fila = 6;

        $query = "SELECT 
        tops.idtop AS idtop,
        tops.lugar AS lugar,
        CONCAT(tabla_aquarius.nombres,' ',tabla_aquarius.apellidos) AS reportado,
        tops.fecha AS fecha,
        tops.observacion AS observacion,
        tops.actins AS actins,
        tops.conins AS conins,
        tops.actseg AS actseg,
        tops.relacion AS relacion,
        tops.descripcion AS descripcion,
        tops.medidas AS medidas,
        tops.potencial AS potencial,
        tops.reg AS reg,
        tops.conepp AS conepp,
        tops.tipepp AS tipepp,
        tops.otros AS otros,
        tops.area AS area,
        tops.foto AS foto,
        tops.iduser AS iduser,
        tops.sede AS sede,
        tops.observado_lugar AS observado_lugar,
        tops.observado_puesto AS observado_puesto,
        tops.idproyectodetalle AS idproyectodetalle,
        tiempo_proyecto.id AS idobservado_tiempo,
        tiempo_proyecto.nombre AS tiempo_proyecto,
        horario_observacion.id AS idobservado_hora,
        horario_observacion.nombre AS horario_observacion,
        rango_edad.id AS idobservado_edad,
        rango_edad.nombre AS rango_edad,
        lesion.id AS idobservado_lesion,
        lesion.nombre AS lesion,
        obstaculo.id AS idobservado_obstaculo,
        obstaculo.nombre AS obstaculo,
        tops.observado_cambio AS observado_cambio,
        tops.observado_retroalimentacion AS observado_retroalimentacion,
        tops.observado_reincidente AS observado_reincidente,
        tops.observado_comentario AS observado_comentario,
        area_general.nombre AS area_nombre,
        tabla_aquarius.dni AS dni,
        tops.url_pdf AS url_pdf,
        tops.reg AS registro,
        seguimiento_aquarius.responsable
                
        
        FROM
        ssma.tops
        
        JOIN (SELECT ssma.area_general.id,ssma.area_general.nombre FROM ssma.area_general) AS area_general ON ssma.tops.idproyectodetalle = area_general.id
        JOIN (SELECT ssma.tiempo_proyecto.id,ssma.tiempo_proyecto.nombre FROM ssma.tiempo_proyecto) AS tiempo_proyecto ON ssma.tops.idobservado_tiempo = tiempo_proyecto.id
        JOIN (SELECT ssma.horario_observacion.id,ssma.horario_observacion.nombre FROM ssma.horario_observacion) AS horario_observacion ON ssma.tops.idobservado_hora = horario_observacion.id
        JOIN (SELECT ssma.rango_edad.id,ssma.rango_edad.nombre FROM ssma.rango_edad) AS rango_edad ON ssma.tops.idobservado_edad = rango_edad.id
        JOIN (SELECT ssma.lesion.id,ssma.lesion.nombre FROM ssma.lesion) AS lesion ON ssma.tops.idobservado_lesion = lesion.id
        JOIN (SELECT ssma.obstaculo.id,ssma.obstaculo.nombre FROM ssma.obstaculo) AS obstaculo ON ssma.tops.idobservado_obstaculo = obstaculo.id
        JOIN (SELECT rrhh.tabla_aquarius.usuario,rrhh.tabla_aquarius.apellidos,rrhh.tabla_aquarius.nombres,rrhh.tabla_aquarius.dni FROM rrhh.tabla_aquarius) AS tabla_aquarius ON ssma.tops.iduser = tabla_aquarius.usuario
        LEFT JOIN(SELECT 
                        ssma.seguimiento.iddocumento,
                        ssma.seguimiento.dni_propietario,
                        CONCAT(tabla_aquarius.nombres,' ',tabla_aquarius.apellidos) AS responsable
        
                        FROM ssma.seguimiento JOIN 
                            (
                            SELECT 
                                rrhh.tabla_aquarius.usuario,
                                rrhh.tabla_aquarius.apellidos,
                                rrhh.tabla_aquarius.nombres,
                                rrhh.tabla_aquarius.dni FROM rrhh.tabla_aquarius
                            ) 
                            
                            AS tabla_aquarius
                        ON ssma.seguimiento.dni_propietario = tabla_aquarius.dni) AS seguimiento_aquarius
                        ON ssma.tops.idtop = seguimiento_aquarius.iddocumento
                    
                
                    WHERE MONTH(tops.reg) = $mes AND
                        YEAR(tops.reg) = $anio
                        ORDER BY
                        tops.reg DESC";

        $statement 	= $pdo->prepare($query);
        $statement -> execute(array());
        $results 	= $statement ->fetchAll();

        $salida 	= "";

        $sede  = master($pdo,"00");
        $obser = master($pdo,"01");
        $relac = master($pdo,"02");

        $actins =  master($pdo,"06");
        $conins =  master($pdo,"07");
        $acseg  =  master($pdo,"08");

        $tipo = master($pdo,"03");
        $condicion = master($pdo,"04");
        $potencial = master($pdo,"05");
        $area = master($pdo,"09");
        
        $idRow=1;



        foreach ($results as $rs) {
            $rel = $rs['relacion'] != "00" ? $relac[(int)$rs['relacion']] : "OTROS";
            $tip = $rs['tipepp'] != "00" ? $tipo[(int)$rs['tipepp']] : "";
            $con = $rs['conepp'] != "00" ? $condicion[(int)$rs['conepp']] : "";
            $pot = $rs['potencial'] != "00" ? $potencial[(int)$rs['potencial']] : "";
            $are = $rs['area'] != "00" ? $area[(int)$rs['area']] : "";

            $observacion_detalle = "";
            if ( $rs['actins'] != "00" ) {

                $observacion_detalle =  $actins[(int)$rs['actins']];
            }elseif( $rs['conins'] != "00" ) {

                $observacion_detalle =  $conins[(int)$rs['conins']];
            }elseif( $rs['actseg'] != "00" ){

                $observacion_detalle =  $acseg[(int)$rs['actseg']];
            }

            $observado_cambio=$rs['observado_cambio'] == '1' ? 'Si' : 'No';
            $observado_retroalimentacion=$rs['observado_retroalimentacion'] == '1' ? 'Si' : 'No';
            $observado_reincidente=$rs['observado_reincidente'] == '1' ? 'Si' : 'No';


            $objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$fila,$idRow);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$fila,$rs['reportado']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$fila,$sede[(int)$rs['sede']]);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$fila,$rs['area_nombre']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$fila,$rs['observado_lugar']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$fila,$are);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$fila,$rs['observado_puesto']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$fila,$rs['tiempo_proyecto']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$fila,$rs['horario_observacion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$fila,$rs['rango_edad']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$fila,date("d/m/Y", strtotime($rs['fecha'])));
           
            $objPHPExcel->setActiveSheetIndex()->setCellValue('M'.$fila,getObservacion($rs['observacion']));
            $objPHPExcel->setActiveSheetIndex()->setCellValue('N'.$fila, $observacion_detalle);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('O'.$fila,$rel);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('P'.$fila,$rs['otros']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('Q'.$fila,$tip);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('R'.$fila,$con);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('S'.$fila,$rs['descripcion']);

            
            $objPHPExcel->setActiveSheetIndex()->setCellValue('T'.$fila,$rs['medidas']);

            $objPHPExcel->setActiveSheetIndex()->setCellValue('U'.$fila,$pot);

            $foto = "../../ssma/public/photos/".$rs['foto'];

            if ( $rs['foto'] != '' && file_exists($foto)) {
                $objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(50);
                $objDrawing = new PHPExcel_Worksheet_Drawing();
                $objDrawing->setCoordinates('V'.$fila);
                $objDrawing->setName($rs['foto']);
                $objDrawing->setDescription( constant("URL")."photos/".$rs['foto']);
                $objDrawing->setPath("../../ssma/public/photos/".$rs['foto']);

                $objDrawing->setHeight(50);
                
                $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
            }
            



            $objPHPExcel->setActiveSheetIndex()->setCellValue('W'.$fila,$rs['lesion']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('X'.$fila,$rs['obstaculo']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Y'.$fila,$observado_cambio);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('Z'.$fila,$observado_retroalimentacion);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AA'.$fila,$observado_reincidente);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AB'.$fila,$rs['observado_comentario']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AC'.$fila,$rs['dni']);
            $objPHPExcel->setActiveSheetIndex()->setCellValue('AD'.$fila,$rs['responsable']);



        $idRow++;
        $fila++;
        }
        // Renombrar Hoja
        $objPHPExcel->getActiveSheet()->setTitle('Reportes de Tarjetas Tops');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('../reports/topsNuevo.xlsx');
        exit();
?>