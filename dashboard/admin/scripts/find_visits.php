<?php
    require '../../../include/db_conn.php';
    $response = new stdClass();
    header("Content-Type: application/json");
    
    if (isset($_GET['period'])) {
        $period  = $_GET['period'];
        switch ($period) {
            case "today":
                $sql  = "SELECT * FROM bitacora WHERE datetime BETWEEN CURDATE() AND NOW() ORDER BY id DESC";
                break;
            case "yesterday":
                $sql = "SELECT * FROM bitacora WHERE datetime BETWEEN CURDATE() - INTERVAL 1 DAY AND CURDATE() ORDER BY id DESC";
                break;
            case "week":
                $sql = "SELECT * FROM bitacora WHERE datetime BETWEEN NOW() - INTERVAL 7 DAY AND NOW() ORDER BY id DESC";
                break;
            case "month":
                $sql = "SELECT * FROM bitacora WHERE YEAR(datetime) = YEAR(NOW()) AND MONTH(datetime) = MONTH(NOW()) ORDER BY id DESC";
                break;
            case "custom":
                $sql  = "SELECT * FROM bitacora WHERE datetime BETWEEN NOW() - INTERVAL 1 DAY AND NOW() ORDER BY id DESC";
                break;
            default:
                echo "Opcion invalida";
        }
        
        
        
        
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
    
    exit();


?>