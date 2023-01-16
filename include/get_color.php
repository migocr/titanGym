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
    function getBackgroundColor($con) {
        $query="select config from system_settings where nombre='backgroundColor'";
        $result=mysqli_query($con,$query);
        $principalColor;
        while ($row = $result->fetch_assoc()) {
            $principalColor = $row['config'];
        }	
        return $principalColor;
    }
/////////////////////////////////////////////////////////////////////////////////

function getColorBackground($con) {
    $query="SELECT config FROM system_settings WHERE nombre='color'";
    $result=mysqli_query($con,$query);
    $principalColor;
    while ($row = $result->fetch_assoc()) {
        $principalColor = $row['config'];
    }	
    return $principalColor;
}

function getColorIcon($con) {
    $query= "SELECT config FROM system_settings WHERE nombre='backgroundColor';";
    $result=mysqli_query($con,$query);
    $principalColor;
    while ($row = $result->fetch_assoc()) {
        $principalColor = $row['config'];
    }	
    return $principalColor;
}

function getTitle($con) {
        $query="SELECT config FROM system_settings WHERE nombre='nombreSitio';";
        $result=mysqli_query($con,$query);
        $principalColor;
        while ($row = $result->fetch_assoc()) {
            $principalColor = $row['config'];
        }	
        return $principalColor;
    }

    function getColorFound($con) {
        $query="SELECT config FROM system_settings WHERE nombre='colorFuente';";
        $result=mysqli_query($con,$query);
        $principalColor;
        while ($row = $result->fetch_assoc()) {
            $principalColor = $row['config'];
        }	
        return $principalColor;
    }

    function getLogo($con) {
        $query="SELECT config FROM system_settings WHERE nombre='logo';";
        $result=mysqli_query($con,$query);
        $principalColor;
        while ($row = $result->fetch_assoc()) {
            $principalColor = $row['config'];
        }	
        return $principalColor;
    }

?>