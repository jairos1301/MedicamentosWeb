<?php
$cod_reporte = $_REQUEST['cod_rpt'];
//$nombre_rpt = $_REQUEST['nombre_rpt'];
$nombre_rpt = "Reporte csv";
$caracterSeparado = ";";

require "../DAO/reportesDAO.php";
require '../infrastructure/CORS.php';

$dao = new reportesDAO();
$arr = $dao->generar_csv($cod_reporte);
$keys = array_keys($arr[0]);

/* Se define la zona horaria en Colombia para generar el archivo */
date_default_timezone_set("America/Bogota");
/* Se genera el nombre del archivo con la fecha y hora de la generacion */
$fileName = 'REPORTE ' . $nombre_rpt . '-' . date("Y-m-d") . "(" . date("h:i:sa") . ")" . '.csv';
/* Se define que se retornara un archivo CVS */
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename=' . $fileName);

$content = '';

for ($i = 0; $i < count($keys); $i++) {
    $content .= $keys[$i] . $caracterSeparado;
}
$content .= "\n";

for ($cont = 0; $cont < count($arr); $cont++) {
    for ($i = 0; $i < count($keys); $i++) {
        $content .= $arr[$cont][$keys[$i]] . $caracterSeparado;
    }
    //$content .= trim($content, $caracterSeparado);
    $content .= "\n";
}

echo $content;
