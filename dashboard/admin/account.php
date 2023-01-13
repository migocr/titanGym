<?php
	require '../../include/db_conn.php';
	date_default_timezone_set('America/Mexico_City');
	page_protect();
	$principalColor = $_SESSION['principalColor'];
	$backgroundColor =  $_SESSION['backgroundColor'];
	$_DIR = dirname(dirname(dirname(__FILE__)));
	require  $_DIR . '/vendor/autoload.php' ;
	$dotenv = Dotenv\Dotenv::createImmutable($_DIR);
	$dotenv->load();


	if(isset($_POST['submit'])){

	$usrname=$_POST['login_id'];
	$fulname=$_POST['full_name'];

	$query="update admin set username='".$usrname."',Full_name='".$fulname."' where username='".$_SESSION['full_name']."'";

	if(mysqli_query($con,$query)){
		echo "<head><script>alert('Perfil Cambiado ');</script></head></html>";

		echo "<meta http-equiv='refresh' content='0; url=logout.php'>";
	}
	else{
		echo "<head><script>alert('NO ES EXITOSO, verifique nuevamente');</script></head></html>";
		echo "error".mysqli_error($con);
	}

	
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<link rel="stylesheet" href="../assets/css/all-min.css"  />
	<title>
		<?php echo $_ENV["PAGE_NAME"] ?>
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
    <body class="g-sidenav-show  bg-gray-100"  style="<?php echo "background:$backgroundColor !important;"?>">
		<?php $active = 'account'; $principalColor = $principalColor; include 'components/menu.php'; ?>
		<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
			<?php $titlePage = 'Cuenta'; include 'components/navbar.php'; ?>
			<div class="container-fluid py-4">
				<div class="row">
					
						<div class="card">
							<div class="card-body p-3">
								<div class="row">
									<div class="col-12">
									
									<?php $user_id_auth = $_SESSION['user_data']; ?>
									<div class="table-responsive p-0">
										<div class="" style="margin:1em;">
											<h6>Editar cuenta</h6>
											
											<form id="form1" name="form1" method="post" action="">
											
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Nombre</label>
												
												<input type="text" class="form-control" name="login_id" value="<?php echo $_SESSION['user_data'];?>" required/>
											</div>
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Nombre</label>
												<input type="text" class="form-control" name="full_name" id="textfield2" value="<?php echo $_SESSION['username']; ?>" required/>
											</div>
											
											
											
											<div style="width: auto; display: flex;justify-content: center;">
												<input class="btn btn-primary" type="submit" name="submit" id="submit" value="Guardar">
											</div>
											
										</form>
											<div class="text-center">
												<a  href="change_pwd.php" class="a1-btn a1-orange">Cambiar Contraseña</a>
											</div>
											
										</div>
									</div>
									
								</div>
							</div>
						</div>
					
				</div>
			</div>
		</main>

    	
		<?php include 'components/fixed_plugin.php';?>
		
		<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>

		<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
		</body>
    </body>
</html>


										
