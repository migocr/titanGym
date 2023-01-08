<?php
    require '../../../include/db_conn.php';
    $response = new stdClass();
    $response->status = false;
    $response->updateStatus = false;
    $response->color = $_POST['color'];
    
    if (isset($_POST['color'])) {
        $response->errorCode = "ENTRA";
        $color  = $_POST['color'];
        $atributo  = $_POST['atributo'];
        $sql = "update system_settings set config='$color' where nombre='${atributo}'";
    
        if ($con->query($sql) === TRUE) {
            //echo "Registro actualizado exitosamente";
            $response->status = true;
            $response->updateStatus = true;   
            session_start();
            $atributo == 'color' ? $atributo = 'principalColor' : $atributo = $atributo;
            $_SESSION[$atributo]     = $color;
            header("location: ../");
           
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