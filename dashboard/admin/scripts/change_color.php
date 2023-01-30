<?php
    require '../../../include/db_conn.php';
    header("Content-Type: application/json");
    $response = new stdClass();
    $response->status = false;
    $response->updateStatus = false;
    $response->color = $_POST['value'];
    
    if (isset($_POST['value'])) {
        $color  = $_POST['value'];
        $atributo  = $_POST['atributo'];
        $sql = "update system_settings set config='$color' where nombre='${atributo}'";
    
        if ($con->query($sql) === TRUE) {
            //echo "Registro actualizado exitosamente";
            $response->status = true;
            $response->updateStatus = true;   
            session_start();
            if ($atributo == "color") {
            $_SESSION['principalColor'] = $color;

            } else {
                $_SESSION[$atributo]     = $color;
            }
           
        } else {
            //echo "Error actualizando registro: " . $con->error;
            $response->errorCode = $con->error;
        }
    } 
    
    $responseJSON = json_encode($response);
    
    echo json_encode($responseJSON);
    exit();


?>