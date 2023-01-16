<?php
    require '../../../include/db_conn.php';
    $response = new stdClass();
    
    if (isset($_GET['search'])) {
        $search  = $_GET['search'];
        $sql = "select * from users where userid LIKE '%${search}%' OR username LIKE '%${search}%'";
        $result = $con->query($sql);
        if ($result) {
            //echo "Registro actualizado exitosamente";
            $response->status = true;

            $response->userData = 
            $rows = array();
            while($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
            //cho json_encode($rows);
            $response->numResults = mysqli_num_rows($result);
            $response->userData =json_encode($rows);
        } else {
            $response->status = false;
        }
    } 
    
    $responseJSON = json_encode($response);
    
    echo $responseJSON;
    header("Content-Type: application/json");
    exit();


?>