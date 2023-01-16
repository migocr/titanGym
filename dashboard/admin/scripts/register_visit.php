<?php
    require '../../../include/db_conn.php';
    $response = new stdClass();
    
    if (isset($_POST['search'])) {
        $userId  = $_POST['userId'];
        $sql = "INSERT INTO bitacora (usuario, fecha, accion) VALUES (?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sss", $usuario, $fecha, $accion);
        $stmt->execute();

    } 
    
    $responseJSON = json_encode($response);
    
    echo $responseJSON;
    header("Content-Type: application/json");
    exit();


?>