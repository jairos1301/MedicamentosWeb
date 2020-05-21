<?php
//nombre del dao 
$nombre = $_POST['nombre'];
//nombre del reporte
$nombre_rpt = $_POST['nombre_rpt'];
$caracterSeparado = ";";
$rpt = isset($_POST['rpt']) ? $_POST['rpt'] : "";
$name_dao = $nombre."DAO";

require "../DAO/".$name_dao.".php";

$dao = new $name_dao();
if($rpt == 'detalle'){
    $arr = $dao->generar_rptdet_csv($vwhere);
}else{
$arr = $dao->generar_rpt_csv();
}
$keys = array_keys($arr[0]);

/* Se define la zona horaria en Colombia para generar el archivo */
date_default_timezone_set("America/Bogota");
/* Se genera el nombre del archivo con la fecha y hora de la generacion */
$fileName = 'REPORTE '. $nombre_rpt . '-' . date("Y-m-d") . "(" . date("h:i:sa") . ")" . '.csv';
/* Se define que se retornara un archivo CVS */
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename=' . $fileName);

$content = '';

for ($i=0; $i < count($keys); $i++) { 
    $content .= $keys[$i] . $caracterSeparado;
}
$content .= "\n";

for ($cont = 0; $cont < count($arr); $cont++) {
    for ($i=0; $i < count($keys); $i++) { 
        $content .= $arr[$cont][$keys[$i]] . $caracterSeparado;
    }
    //$content .= trim($content, $caracterSeparado);
    $content .= "\n";
}

echo $content;
