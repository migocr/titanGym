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
    function getAsideColor($con) {
        
        $query="select config from system_settings where nombre='asideColor'";
        $result=mysqli_query($con,$query);
        $asideColor;
        while ($row = $result->fetch_assoc()) {
            $asideColor = $row['config'];
        }	
        return $asideColor;
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

    function getTitle($con) {
        $query="SELECT config FROM system_settings WHERE nombre='nombreSitio';";
        $result=mysqli_query($con,$query);
        $title;
        while ($row = $result->fetch_assoc()) {
            $title = $row['config'];
        }	
        return $title;
    }

    function getcolorFont($con) {
        $query="SELECT config FROM system_settings WHERE nombre='colorFuente';";
        $result=mysqli_query($con,$query);
        $colorFont;
        while ($row = $result->fetch_assoc()) {
            $colorFont = $row['config'];
        }	
        return $colorFont;
    }

    function getLogo($con) {
        $query="SELECT config FROM system_settings WHERE nombre='logo';";
        $result=mysqli_query($con,$query);
        $logo;
        while ($row = $result->fetch_assoc()) {
            $logo = $row['config'];
        }	
        return $logo;
    }
    function getFixedNav($con) {
        $query="SELECT config FROM system_settings WHERE nombre='fixedNav';";
        $result=mysqli_query($con,$query);
        $fixedNav;
        while ($row = $result->fetch_assoc()) {
            $fixedNav = $row['config'];
        }	
        return $fixedNav;
    }

?>