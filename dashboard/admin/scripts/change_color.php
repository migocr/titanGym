<?php
    require '../../../include/db_conn.php';
    $response = new stdClass();
    $response->status = false;
    $response->updateStatus = false;
    $response->errorCode = $_POST['color'];
    
    if (isset($_POST['color'])) {
        $response->errorCode = "ENTRA";
        $color  = $_POST['color'];
        $atributo  = $_POST['atributo'];
        $sql = "update system_settings set config='$color' where nombre='${atributo}'";
    
        if ($con->query($sql) === TRUE) {
            //echo "Registro actualizado exitosamente";
            $response->status = true;
            $response->updateStatus = true;   
        } else {
            //echo "Error actualizando registro: " . $con->error;
            $response->errorCode = $con->error;
        }
    } 
    
    $responseJSON = json_encode($response);
    header("Content-Type: application/json");
    echo json_encode($responseJSON);
    exit();


?>