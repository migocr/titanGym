<?php
	require '../../include/db_conn.php';
	date_default_timezone_set('America/Mazatlan');
	page_protect();
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
	<script src="https://unpkg.com/@popperjs/core@2"></script>
	<script src="https://unpkg.com/tippy.js@6"></script>

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
	<?php $active = 'memberships'; $principalColor = $principalColor; include 'components/menu.php'; ?>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
		<!-- Navbar -->
		<?php $titlePage = 'Membresias'; include 'components/navbar.php'; ?>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-lg-12 col-md-6 mb-md-0 mb-4">
					<div class="card">
						<div class="card-header pb-0">
							<div>
								<h6>Actualizar membresia</h6>
							</div>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-12">
								<?php
									$id=$_GET['id'];
									$sql="Select * from plan t Where t.pid=$id";
									$res=mysqli_query($con, $sql);
									
												if($res){
															$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
											
														}
													
								?>
								<form id="form1" name="form1" method="post" class="a1-container" action="updateplan.php">
									<div class="row">
										<div class="col-md-2">
											<div class="form-group">
												<label for="example-text-input" class="form-control-label">ID de Membresia: </label>
												<input class="form-control id-membresia" type="text" name="planid" id="planID" readonly value='<?php echo $row['pid'] ?>'></td>
												<script>
													tippy('.id-membresia', {
													content: "El ID de membresia no es editable",
													});
												</script>
											</div>
										</div>
										<div class="col-md-10">
											<div class="form-group">
												<label for="example-text-input" class="form-control-label">Nombre de Membresia:</label>
												<input class="form-control" name="planname" id="planName" type="text" value='<?php echo $row['planName'] ?>'  >
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label for="example-text-input" class="form-control-label">Descripcion de Membresia:</label>
												<input class="form-control"  type="text" name="desc" id="planDesc"  value='<?php echo $row['description'] ?>' >
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="example-text-input" class="form-control-label">Costo de Membresia:</label>
												
												<div class="input-group input-group-alternative mb-4">
													<span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
													<input class="form-control form-control-alternative"type="text" name="amount" id="planAmnt" value='<?php echo $row['amount'] ?>'  >
												</div>
											</div>
											
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label for="example-text-input" class="form-control-label">Validez de Membresia:</label>
												<input class="form-control"  type="number" name="planval" id="planVal" value='<?php echo $row['validity'] ?>' readonly>
											</div>
										</div>
										<div class="col-md-4">
											<div style="margin-left:1em;">
												<div class="form-check mb-3">
													<input class="form-check-input" type="radio" name="planTimeType" value="m" id="customRadio1" required="" <?php echo $row['planType'] == 'm' ? 'checked' : ''; ?> readonly disabled>
													<label class="custom-control-label" for="customRadio1">Meses</label>
												</div>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="planTimeType" value="d" id="customRadio2" required="" <?php echo $row['planType'] == 'd' ? 'checked' : ''; ?> readonly disabled> 
													<label class="custom-control-label" for="customRadio2">Dias</label>
												</div>
											</div>
										</div>
										
										
										
										
										
										<div class="col-md-12 text-center m-auto">
											<div class="form-group">
												<input class="btn btn-primary" type="submit" name="submit" id="submit" value="Guardar">
												<input class="btn btn-default" type="reset" name="reset" id="reset" value="Restaurar"></td>
											</div>
										</div>
									</div>
								
								</form>
								</div>
							</div>
						</div>
					
					</div>
			</div>
		</div>
	</main>
    </body>
</html>


