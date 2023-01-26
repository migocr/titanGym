<?php
require '../../include/db_conn.php';
date_default_timezone_set('America/Mazatlan'); 
page_protect();

  $memID=$_POST['m_id'];
  $plan=$_POST['plan'];

  $expireDate = date('Y-m-d', strtotime($_POST['dob']));
  $startDate = date('Y-m-d', strtotime($_POST['startdate']));
  
  $response = new stdClass();
  $response->status = false;
  $response->userUpdate = false;
  $response->errorCode = "";
  $response->startDate = $startDate;
  $response->expireDate = $expireDate;

  $queryUserUpdate="update users set dob='".$expireDate."' where userid='".$memID."'";
  if(mysqli_query($con,$queryUserUpdate)){
    $response->userUpdate = true;
  }
  if(mysqli_query($con,$queryUserUpdate)){
      //inserting new payment data into enrolls_to table
    $query1="select * from plan where pid='$plan'";
    $result=mysqli_query($con,$query1);

        if($result){
          $value=mysqli_fetch_row($result);
          $timeType = $value[6];
          $amount = $value[4];
          if ($timeType == "m") {
            $d= strtotime("+".$value[3]." Months");
          } else {
            $d= strtotime("+".$value[3]." Days");
          }
          $payDate=date("Y-m-d"); //current date
          //$expiredate=date("Y-m-d",$d); //adding validity retrieve from plan to current date
          //inserting into enrolls_to table of corresponding userid
          $query2="insert into enrolls_to(pid,uid,paid_date,expire, startDate, amount) values('$plan','$memID','$payDate','$expireDate','$startDate', '${amount}')";
          if(mysqli_query($con,$query2)==1){
              $response->status = true;
          } else{
              //echo "<head><script>alert('Pago no Ingresado Fallo en Sistema');</script></head></html>";
              $response->errorCode = "error: ";
          }   
        } else{
            //echo "<head><script>alert('Pago no Ingresado Fallo en Sistema');</script></head></html>";
            //echo "error: ".mysqli_error($con);
            $response->errorCode = "error: ";
        }
         
  } else {
      //echo "<head><script>alert('Pago no Ingresado Fallo en Sistema');</script></head></html>";
      //echo "error: ".mysqli_error($con);
      $response->errorCode = "error: ";
    }
    $responseJSON = json_encode($response);
    header("Content-Type: application/json");
    echo json_encode($responseJSON);
    exit();
?>
