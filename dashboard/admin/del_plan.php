<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<?php
require '../../include/db_conn.php';
page_protect();

$msgid = $_POST['name'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "update plan set active ='no' WHERE pid='$msgid'");
    echo "<script>window.addEventListener('load', (event) => {
        swal('Listo!' ,  'Membresia Eliminada' ,  'success').then(function () {
            window.location.href = './view_plan.php'
        });;
    })        
    </script>";
   
} else {
    echo "<script>window.addEventListener('load', (event) => {
        swal('Error!' ,  'No se pudo eliminar la membresia' ,  'error').then(function () {
            window.location.href = './view_plan.php'
        });;
    })        
    </script>";
}

?>