<?php
	require '../../include/db_conn.php';

  date_default_timezone_set('America/Tijuana');
	page_protect();
	$principalColor = $_SESSION['principalColor'];
	$backgroundColor =  $_SESSION['backgroundColor'];
  $_DIR = dirname(dirname(dirname(__FILE__)));
  require  $_DIR . '/vendor/autoload.php' ;
  $dotenv = Dotenv\Dotenv::createImmutable($_DIR);
  $dotenv->load(); 
?>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <script src="../assets/js/sweetalert.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
      <?php echo $_SESSION['siteTitle']; ?>
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="../assets/js/kit-font-awesome.js" crossorigin="anonymous"></script>
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/all-min.css"  />

  </head>
  <body class="g-sidenav-show  bg-gray-100" style="<?php echo "background:$backgroundColor !important;"?>">
    <?php $active = 'new'; include 'components/menu.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <?php $titlePage = 'Nuevo Registro'; include 'components/navbar.php'; ?>
      <div class="container-fluid py-4">

        <div class="row">
          <div class="col-12">
          </div>
        </div>
      </div>
    </main>
      
  </body>
  <?php
    date_default_timezone_set('America/Tijuana');
    //echo date("d-m-Y H:i:s");  
    //$memID=$_POST['m_id'];
    $uname=$_POST['u_name'];
    $gender=$_POST['gender'];
    $dob= date('Y-m-d', strtotime($_POST['dob']));
    $jdate= date('Y-m-d', strtotime($_POST['jdate']));
    //echo $jdate;
    echo $jdate;
    $plan=$_POST['plan'];
    $phone=$_POST['phone'];

//inserting into users table
    $query="insert into users(username,gender,dob,joining_date, phone) values('$uname','$gender','$dob','$jdate', '$phone')";
      if(mysqli_query($con,$query)==1){
        $memID = $con->insert_id;
        //Retrieve information of plan selected by user
        $query1="select * from plan where pid='$plan'";
        $result=mysqli_query($con,$query1);

          if($result){
            $value=mysqli_fetch_row($result);
            $isDayOrMonth = $value[6];
            if ($isDayOrMonth == "d") {
              $timeType = " Days";
            }
            if ($isDayOrMonth == "m") {
              $timeType = " Months";
            }
            $d=strtotime("+".$value[3]. $timeType);
            //echo $value[6];
            $cdate=date("Y-m-d"); //current date
            echo $cdate;
            $expiredate=date("Y-m-d",$d); //adding validity retrieve from plan to current date
            //inserting into enrolls_to table of corresponding userid
            $query2="insert into enrolls_to(pid,uid,paid_date,expire, startDate) values('$plan','$memID','$cdate','$expiredate','$jdate')";
            if(mysqli_query($con,$query2)==1){

              echo "<html><head><script>
                    document.addEventListener('DOMContentLoaded', function () {
                      swal('Guardado' ,  'Miembro agregado exitosamente' ,  'success').then((event) => {window.location.href = window.location.href.replace('new_submit.php', 'view_member.php?id=$memID');});
                      //setTimeout(function(){ window.location.href = window.location.href.replace('new_submit.php', 'view_member.php?id=$uid'); }, 3000);
                    });
                    </script></head></html>";
              
            }
            else{
              echo "<html><head><script>
              document.addEventListener('DOMContentLoaded', function () {
                swal('Error' ,  'Error al intentar guardar' ,  'error').then((event) => {window.location.href = window.location.href.replace('new_submit.php', 'new_entry.php');});
                //setTimeout(function(){ window.location.href = window.location.href.replace('new_submit.php', 'new_entry.php'); }, 3000);
              });
              </script></head></html>";
              echo "error: ".mysqli_error($con);
              //Deleting record of users if inserting to enrolls_to table failed to execute
              $query3 = "DELETE FROM users WHERE userid='$memID'";
              mysqli_query($con,$query3);
            }

          
          }
          else
          {
            echo "<html><head><script>
            document.addEventListener('DOMContentLoaded', function () {
              swal('Error' ,  'Error al intentar guardar' ,  'error').then((event) => {window.location.href = window.location.href.replace('new_submit.php', 'new_entry.php');});
              //setTimeout(function(){ window.location.href = window.location.href.replace('new_submit.php', 'new_entry.php'); }, 3000);
            });
            </script></head></html>";
            echo "error: ".mysqli_error($con);
            //Deleting record of users if retrieving inf of plan failed
            $query3 = "DELETE FROM users WHERE userid='$memID'";
            mysqli_query($con,$query3);
          }

      }
      else{
        echo "<html><head><script>
                  document.addEventListener('DOMContentLoaded', function () {
                    swal('Error' ,  'Error al intentar guardar' ,  'error').then((event) => {window.location.href = window.location.href.replace('new_submit.php', 'new_entry.php');});
                    //setTimeout(function(){ window.location.href = window.location.href.replace('new_submit.php', 'new_entry.php'); }, 3000);
                  });
                  </script></head></html>";
        echo "error: ".mysqli_error($con);
      }
  ?>

</html>