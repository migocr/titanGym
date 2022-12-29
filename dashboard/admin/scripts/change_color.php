<?php
    require '../../../include/db_conn.php';
    $response = new stdClass();
    $response->status = false;
    $response->updateStatus = false;
    $response->errorCode = $_POST['color'];
    if (isset($_POST['color'])) {
        $response->errorCode = "ENTRA";
        $color  = $_POST['color'];
        $sql="select config from system_settings where nombre='color'";
        $result = $con->query($sql);
        if ($result) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                // Actualizar el campo 
                $sql = "update system_settings set config='$color' where nombre='color'";
    
                if ($con->query($sql) === TRUE) {
                    echo "Registro actualizado exitosamente";
                    $response->status = true;
                    $response->updateStatus = true;
                   
                } else {
                    echo "Error actualizando registro: " . $con->error;
                    $response->errorCode = $con->error;
                }
            }
        } else {
            echo "0 results";
            $response->errorCode = "NO RESULTS";
        }
    } 
    
    $responseJSON = json_encode($response);
    header("Content-Type: application/json");
    echo json_encode($responseJSON);
    exit();


?>