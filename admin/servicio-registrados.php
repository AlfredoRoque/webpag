<?php

include 'funciones/sesiones.php';
include 'funciones/funciones.php';
// crear mediante sql un json paraactualizar la grafica
$sql =" SELECT fecha_registro, COUNT(*) AS resultado FROM registrados GROUP BY DATE(fecha_registro) ORDER BY fecha_registro ";
$resultado = $conn->query($sql);
$arreglo_registros = array();
while($registro_dia = $resultado->fetch_assoc()){
    $fecha = $registro_dia['fecha_registro'];
    $registro['fecha'] = date('Y-m-d', strtotime($fecha));
    $registro['cantidad'] = $registro_dia['resultado'];
    
    $arreglo_registros[] = $registro;
}

echo json_encode($arreglo_registros);