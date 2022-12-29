<?php      
    function getColor($con) {
        $query="select config from system_settings where nombre='color'";
        $result=mysqli_query($con,$query);
        $principalColor;
        while ($row = $result->fetch_assoc()) {
            $principalColor = $row['config'];
        }	
        return $principalColor;
    }
?>