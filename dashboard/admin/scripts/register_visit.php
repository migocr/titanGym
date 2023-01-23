<?php
    require '../../../include/db_conn.php';
    $response = new stdClass();
    $response->status = false;
    if (isset($_POST['userid'])) {
        $userId  = $_POST['userid'];
        $sql = "INSERT INTO bitacora (uid, datetime) VALUES ('${userId}', NOW())";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        if (mysqli_affected_rows($con) == 1) {
            $response->status = true;
        } else {
            //echo "Error al insertar registro";
         }
    } 
        
    echo json_encode($response);
    header("Content-Type: application/json");
    exit();


?>