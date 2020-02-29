<?php

class infraestructura
{

    public function estructura_sql($nombre, $datos, $tipo = 0)
    { // 0 funcion (select) -- 1 procedimiento (call)
        $sql = "";
        if ($tipo == 0) {
            $sql .= "select $nombre(";
        } else {
            $sql .= "call $nombre(";
        }
        if (count($datos) > 0) {
            for ($i = 0; $i < count($datos); $i++) {
                if (is_numeric($datos[$i])) {
                    $sql .= $datos[$i] . ",";
                } else {
                    $sql .= "'" . $datos[$i] . "',";
                }
            }
            $sql = substr($sql, 0, -1);
        }
        $sql .= ");";
        return $sql;
    }
}
