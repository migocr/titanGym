<?php
   require '../../include/db_conn.php';

   $_DIR = dirname(dirname(dirname(__FILE__)));
   require  $_DIR . '/vendor/autoload.php' ;

	page_protect();
	$principalColor = $_SESSION['principalColor'];
	$backgroundColor =  $_SESSION['backgroundColor']; 
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
      <link rel="stylesheet" href="../assets/css/all-min.css"  />

      <script src="../assets/js/sweetalert.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
      <!-- Nucleo Icons -->
      <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
      <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
      <!-- Font Awesome Icons -->
      <script src="../assets/js/kit-font-awesome.js" crossorigin="anonymous"></script>
      <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
      <!-- CSS Files -->
      <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
   </head>
   <body class="g-sidenav-show  bg-gray-100" style="<?php echo "background:$backgroundColor !important;"?>">
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
      //$dob=$_POST['dob'];
      //$jdate=$_POST['jdate'];
      $phone=$_POST['phone'];
      
      $query1 = "update users set phone='$phone', username='$uname', gender='$gender' Where userid='$uid'";

      if(mysqli_query($con,$query1) === true){
         
         echo "<html><head><script>
                    document.addEventListener('DOMContentLoaded', function () {
                      swal('Guardado' ,  'Miembro actualizado exitosamente' ,  'success').then((event) => {window.location.href = window.location.href.replace('edit_mem_submit.php', 'members.php');});
                      //setTimeout(function(){ window.location.href = window.location.href.replace('new_submit.php', 'new_entry.php'); }, 3000);
                    });
                    </script></head></html>";
      }else{
         echo "<html><head><script>
         document.addEventListener('DOMContentLoaded', function () {
           swal('Error' ,  'Error al intentar actualizar usuario' ,  'error').then((event) => {window.location.href = window.location.href.replace('edit_mem_submit.php', 'members.php');});
           //setTimeout(function(){ window.location.href = window.location.href.replace('new_submit.php', 'new_entry.php'); }, 3000);
         });
         </script></head></html>";
      }
   ?>
</html>
