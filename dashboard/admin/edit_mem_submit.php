<?php
   require '../../include/db_conn.php';
	require '../../include/get_color.php';
   require  $_DIR . '\vendor\autoload.php' ;

	page_protect();
	$principalColor = getColor($con);
   $_DIR = 'C:\xampp\htdocs\gym_l';
   $dotenv = Dotenv\Dotenv::createImmutable($_DIR);
   $dotenv->load();

?>

<html lang="es">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
      <link rel="icon" type="image/png" href="../assets/img/favicon.png">
      <title>
         Soft UI Dashboard by Creative Tim
      </title>
      <!--     Fonts and icons     -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
      <!-- Nucleo Icons -->
      <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
      <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
      <!-- Font Awesome Icons -->
      <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
      <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
      <!-- CSS Files -->
      <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
   </head>
   <body class="g-sidenav-show  bg-gray-100">
      <?php $active = 'members'; include 'components/menu.php'; ?>
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
      $uid=$_POST['uid'];
      $uname=$_POST['uname'];
      $gender=$_POST['gender'];
      $dob=$_POST['dob'];
      $jdate=$_POST['jdate'];
      
      $query1="update users set username='".$uname."',gender='".$gender."',dob='".$dob."',joining_date='".$jdate."' where userid='".$uid."'";

      if(mysqli_query($con,$query1)){
         echo "<html><head><script>
                    document.addEventListener('DOMContentLoaded', function () {
                      swal('Guardado' ,  'Miembro agregado exitosamente' ,  'success').then((event) => {window.location.href = window.location.href.replace('edit_mem_submit.php', 'table_view.php');});
                      //setTimeout(function(){ window.location.href = window.location.href.replace('new_submit.php', 'new_entry.php'); }, 3000);
                    });
                    </script></head></html>";
      }else{
      echo "<html><head><script>alert('ERROR! No es posible actualizar el registro actualmente');</script></head></html>";
      echo "error".mysqli_error($con);
      }
   ?>
</html>
