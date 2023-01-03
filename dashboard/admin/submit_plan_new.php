<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<?php
require '../../include/db_conn.php';
page_protect();

	$planid =$_POST['planid'];
    $name = $_POST['planname'];
    $desc = $_POST['desc'];
    $planval = $_POST['planval'];
    $amount = $_POST['amount'];
    if ( isset( $_POST['planTimeType'] ) ) {
      $planTimeType  = $_POST['planTimeType'];
    } else {
      $planTimeType  = '';
    }
   
    
   //Inserting data into plan table
    $query="insert into plan(pid,planName,description,validity,amount,active, planType) values('$planid','$name','$desc','$planval','$amount','yes', '$planTimeType')";
   
   

	 if(mysqli_query($con,$query)==1){        
        
        echo "<script>window.addEventListener('load', (event) => {
          swal('Listo!' ,  'Membresia Agregada' ,  'success').then(function () {
              window.location.href = './view_plan.php'
          });;
        })        
        </script>";
      }

    else{
      echo "<script>window.addEventListener('load', (event) => {
          swal('Error!' ,  'No se pudo agregar el membresia' ,  'error').then(function () {
              window.location.href = './view_plan.php'
          });;
        })        
        </script>";
      }

?>
