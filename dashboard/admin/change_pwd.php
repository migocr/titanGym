<?php
	require '../../include/db_conn.php';
	date_default_timezone_set('America/Tijuana');
	page_protect();

	$principalColor = $_SESSION['principalColor'];
	$backgroundColor =  $_SESSION['backgroundColor'];
	$_DIR = 'C:\xampp\htdocs\gym_l';
	require  $_DIR . '\vendor\autoload.php' ;
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>
		<?php echo $_ENV["PAGE_NAME"] ?>
	</title>
	<!--     Fonts and icons     -->
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
	<body class="g-sidenav-show  bg-gray-100" style="<?php echo "background-image:$backgroundColor;"?>">
		<?php $active = 'account'; $principalColor = $principalColor; include 'components/menu.php'; ?>
		<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
			<?php $titlePage = 'Cuenta'; include 'components/navbar.php'; ?>
			<form id="form1" name="form1"  action="change_s_pwd.php" enctype="multipart/form-data" method="POST" >
			<div class="container-fluid py-4">
				<div class="row">
					<div class="card">
						<div class="card-body p-3">
							<div class="row">
								<div class="col-12">
									<div class="table-responsive p-0">
										<div class="" style="margin:1em;">
											<h6>Cambiar contraseña</h6>
											
											<form id="form1" name="form1" method="post" action="">
											
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">ID de usuario</label>
												<input class="form-control" type="text" id="boxx" name="login_id" readonly value="<?php echo $_SESSION['user_data']; ?>"  required/>	
											</div>
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Contraseña actual</label>
												<input type="text" id="boxx" name="login_key"  class="form-control"  data-rule-required="true" placeholder="Tu código secreto">
											</div>
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Nueva contraseña</label>
												<input type="text" name="pwfield" id="boxx" class="form-control"  data-rule-required="true" data-rule-minlength="6" placeholder="Tu nueva contraseña">	
											</div>
											<div class="form-group">
												<label for="example-search-input" class="form-control-label">Repite la nueva contraseña</label>
												<input type="text" name="confirmfield" id="boxx" class="form-control"  data-rule-equalto="#pwfield" data-rule-required="true" data-rule-minlength="6" placeholder="Confirmar tu nueva contraseña">	
											</div>
											<div class="text-center">
												<button class="btn btn-primary" type="submit">Guardar</button>
											</div>
										</div>		
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</main>

    </body>
</html>


