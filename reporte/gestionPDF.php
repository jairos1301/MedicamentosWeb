<?php
$nombre_rpt = $_POST['nombre_rpt'];
$rpt = isset($_POST['rpt']) ? $_POST['rpt'] : "";
$vwhere = isset($_POST['vwhere']) ? $_POST['vwhere'] : "";
$nombre = $_POST['nombre'];
$name_dao = $nombre . "DAO";

require "../DAO/" . $name_dao . ".php";

$dao = new $name_dao();
if ($rpt == 'detalle') {
    $arr = $dao->generar_rptdet($vwhere);
} else {
    $arr = $dao->generar_rpt();
}
$keys = array_keys($arr[0]);

require_once('../resource/html2pdf_4.0/html2pdf.class.php'); // Se carga la libreria

ob_start(); //Habilita el buffer para la salida de datos 
ob_get_clean(); //Limpia lo que actualmente tenga el buffer
//En la variable content entre las etiquetas <page></page> va todo el contenido del pdf en formato html
$content = "<page backtop='30mm' backbottom='30mm' backleft='30mm' backright='30mm' footer='date;page'>";

$content .= "<h1>REPORTE DE $nombre_rpt</h1>";
$content .= '<link href="../resource/css/estilosPDF.css" type="text/css" rel="stylesheet">';


$content .= "<page_header>
                <table style='width: 80%;'>
                    <tr>
                        <td>
                            <div><img src='../resource/icono.png' alt='Farmacia ALJA' height='60' width='60'></div>

                        </td>                                        
                    </tr>
                </table>
            </page_header>

            <page_footer>
                <table style='width: 80%;'>
                    <tr>
                        <td>
                            <div><label class='footer'>Armenia, Quindio</label></div>
                        </td>                                        
                     </tr>
                </table>
            </page_footer>";



$content .= "<table border='1'>";

$content .= "<tr>";
for ($i = 0; $i < count($keys); $i++) {
    $content .= "<th>" . $keys[$i] . "</th>";
}
$content .= "</tr>";

for ($cont = 0; $cont < count($arr); $cont++) {
    $content .= "<tr>";

    for ($i = 0; $i < count($keys); $i++) {
        # code...
        $content .= "<td>" . $arr[$cont][$keys[$i]] . "</td>";
    }
    $content .= "</tr>";
}

$content .= "</table>";
$content .= "</page>";


$html2pdf = new HTML2PDF('P', 'A4', 'es'); //formato del pdf (posicion (P=vertical L=horizontal), tamaño del pdf, lenguaje)
$html2pdf->WriteHTML($content); //Lo que tenga content lo pasa a pdf
ob_end_clean(); // se limpia nuevamente el buffer
$html2pdf->Output('miPDF.pdf'); //se genera el pdf, generando por defecto el nombre indicado para guardar
