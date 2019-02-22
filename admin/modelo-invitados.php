<?php
include_once 'funciones/funciones.php';

if($_POST['registro'] == 'nuevo' ){

    // $respuesta = array(
    //     'post' => $_POST,
    //     'file' => $_FILES
    // );
    // die(json_encode($respuesta));

    $nombre = $_POST['nombre_invitado'];
    $apellido = $_POST['apellido_invitado'];
    $biografia = $_POST['biografia_invitado'];

    $directorio = "../img/invitados/";
    // comprobar que exista la carpeta y si no crearla
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    // mover archivo de la ubicacion temporal a la final
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio.$_FILES['archivo_imagen']['name'])){
        //guardar el nombre para la base de datos
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subio correctamente";
    }else{
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {
        $stmt = $conn->prepare("INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?, ?, ?, ? )");
        $stmt->bind_param('ssss', $nombre, $apellido, $biografia, $imagen_url);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado,
                'resultado_imagen' => $imagen_resultado
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

if($_POST['registro']  == 'actualizar' ){
    $nombre = $_POST['nombre_invitado'];
    $apellido = $_POST['apellido_invitado'];
    $biografia = $_POST['biografia_invitado'];
    $id_registro = $_POST['id_registro'];

    $directorio = "../img/invitados/";
    // comprobar que exista la carpeta y si no crearla
    if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
    }
    // mover archivo de la ubicacion temporal a la final
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio.$_FILES['archivo_imagen']['name'])){
        //guardar el nombre para la base de datos
        $imagen_url = $_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subio correctamente";
    }else{
        $respuesta = array(
            'respuesta' => error_get_last()
        );
    }

    try {

        if($_FILES['archivo_imagen']['size'] > 0){
            // con imagen
            $stmt = $conn->prepare(" UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, url_imagen = ?, editado = NOW() WHERE invitado_id = ? ");
            $stmt->bind_param('sssss', $nombre, $apellido, $biografia, $imagen_url, $id_registro);
        }else{
            // sin imagen
            $stmt = $conn->prepare(" UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, editado = NOW() WHERE invitado_id = ? ");
            $stmt->bind_param('ssss', $nombre, $apellido, $biografia, $id_registro);

        }
        $stmt->execute();
        $registros = $stmt->affected_rows;

        if($registros > 0){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}

if($_POST['registro'] == 'eliminar'){
    $id_borrar = $_POST['id'];

    try {
        $stmt = $conn->prepare(" DELETE FROM invitados WHERE invitado_id = ? ");
        $stmt->bind_param('i', $id_borrar); 
        $stmt->execute();
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();
    }  catch (Exception $e) {
        $respuesta = array(
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}