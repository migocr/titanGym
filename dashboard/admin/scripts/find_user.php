<?php
    require '../../../include/db_conn.php';
    $response = new stdClass();
    $response->status = false;
    $response->updateStatus = false;
    $response->errorCode = $_POST['search'];
    
    if (isset($_POST['search'])) {
        $response->errorCode = "ENTRA";
        $search  = $_POST['search'];
       
        
        $sql = "select * from users where userid LIKE '${search}' OR username LIKE '${search}'";
        $result = $con->query($sql);
        if ($result) {
            //echo "Registro actualizado exitosamente";
            $response->status = true;
            $response->updateStatus = true;   
            $response->userData = 
            
            $rows = array();
            while($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            //cho json_encode($rows);
          
            $response->userData =json_encode($rows);
        } else {
            //echo "Error actualizando registro: " . $con->error;
            //$response->errorCode = $con->error;
        }
    } 
    
    $responseJSON = json_encode($response);
    header("Content-Type: application/json");
    echo json_encode($responseJSON);
    exit();


?>