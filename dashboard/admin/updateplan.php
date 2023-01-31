<?php
require '../../include/db_conn.php';
page_protect();
    
    
   $id=$_POST['planid'];
   $pname=$_POST['planname'];
   $pdesc=$_POST['desc'];
   $pval=$_POST['planval'];
   $pamt=$_POST['amount'];
?>

<?php
	date_default_timezone_set('America/Mazatlan');
	$principalColor = $_SESSION['principalColor'];
	$backgroundColor =  $_SESSION['backgroundColor'];

	$_DIR = dirname(dirname(dirname(__FILE__)));
	require  $_DIR . '/vendor/autoload.php' ;
	$dotenv = Dotenv\Dotenv::createImmutable($_DIR);

	$dotenv->load();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<link rel="stylesheet" href="../assets/css/all-min.css"  />
	<link rel="stylesheet" type="text/css"  href="/gym_l/dashboard/assets/css/all-min.css">
	<script src="../assets/js/popper.js"></script>
	<script src="../assets/js/tippy.js"></script>
   <script src="../assets/js/sweetalert.js"></script>
	<title>
		<?php echo $_SESSION['siteTitle'] ?>
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
</head>
<body class="g-sidenav-show" style="<?php echo "background:$backgroundColor !important;"?>     background-attachment: fixed;">
	<?php include 'components/spiner.php'; ?>	
	<?php $active = 'memberships'; $principalColor = $principalColor; include 'components/menu.php'; ?>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
		<!-- Navbar -->
		<?php $titlePage = 'Membresias'; include 'components/navbar.php'; ?>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-lg-12 col-md-6 mb-md-0 mb-4">
					
			</div>
		</div>
	</main>
    </body>
</html>

<?php 
$query1="update plan set planName='".$pname."',description='".$pdesc."',validity='".$pval."',amount='".$pamt."' where pid='".$id."'";

if(mysqli_query($con,$query1)){
  
         echo "<script>
         document.addEventListener('DOMContentLoaded', function () {
           swal('Guardado' ,  'Membresia Actualizada ' ,  'success').then(function () {
                 window.location.href = './membresias.php'
           });;
         });
         </script>";
        
}
else{
 echo "<script>window.addEventListener('load', (event) => {
            swal('Error!' ,  'No se pudo editar la membresia' ,  'error').then(function () {
               window.location.href = './membresias.php'
            });;
      })        
      </script>";
 echo "error".mysqli_error($con);
}
?>

