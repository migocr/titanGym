<?php
require '../../include/db_conn.php';

page_protect();
?>
<?php
$_DIR = dirname(dirname(dirname(__FILE__)));
require  $_DIR . '/vendor/autoload.php' ;
$dotenv = Dotenv\Dotenv::createImmutable($_DIR);
$dotenv->load(); 
$principalColor = $_SESSION['principalColor'];
$backgroundColor =  $_SESSION['backgroundColor'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    <?php echo $_SESSION['siteTitle']; ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link rel="stylesheet" href="../assets/css/all-min.css"  />

  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="../assets/js/kit-font-awesome.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>
	<body class="g-sidenav-show  bg-gray-100" style="<?php echo "background:$backgroundColor !important;"?>">
		<?php $active = 'memberships'; include 'components/menu.php'; ?>
		<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
			<!-- Navbar -->
			<?php $titlePage = 'Miembros'; include 'components/navbar.php'; ?>
			<!-- End Navbar -->
			<div class="container-fluid py-4">
			<div class="row">
				<div class="col-12">
				<div class="card mb-4">
					<div class="card-header pb-0">
						<h6>Agregar Membresia</h6>
						<form id="form1" name="form1" method="post" class="a1-container" action="submit_plan_new.php">
							<div class="form-group">
								<label for="example-text-input" class="form-control-label">ID de Membresia</label>
								<?php
									function getRandomWord($len = 6)
									{
										$word = array_merge(range('A', 'Z'));
										shuffle($word);
										return substr(implode($word), 0, $len);
									}
								?>
								<input class="form-control" type="text" name="planid" id="planID" readonly value="<?php echo getRandomWord(); ?>" required></td>		
							</div>
							<div class="form-group">
								<label for="example-text-input" class="form-control-label">Nombre de membresia</label>
								<input class="form-control" name="planname" id="planName" type="text" placeholder="Ingrese el nombre del plan" size="40" required>
							</div>
							<div class="form-group">
								<label for="example-text-input" class="form-control-label">Descripción de membresia</label>
								<input class="form-control" type="text" name="desc" id="planDesc" placeholder="Ingrese la descripción del plan" size="40">
							</div>
							<div style="display: inline-flex;
										justify-content: flex-start;
										width: 100%;
										align-items: center;">
								<div class="form-group" style="width:50%;">
									<label for="example-text-input" class="form-control-label">Duraciónde Membresia</label>
									<input class="form-control" type="number" name="planval" id="planVal" placeholder="Ingrese el tiempo de duracion en meses" size="40" required>
								</div>
								<div style="margin-left:1em;">
									<div class="form-check mb-3">
										<input class="form-check-input" type="radio" name="planTimeType" value="m" id="customRadio1" required>
										<label class="custom-control-label" for="customRadio1">Meses</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="planTimeType" value="d" id="customRadio2" required>
										<label class="custom-control-label" for="customRadio2">Dias</label>
									</div>
								</div>
								
							</div>
							
							<div class="form-group">
								<label for="example-text-input" class="form-control-label">Costo de membresia</label>
								<input class="form-control" type="number" name="amount" id="planAmnt" placeholder="Enter plan amount" size="40" required>
								
								

							</div>
							
							<div class="form-group">
								<input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Crear Plan" >
								<input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Borrar">
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</main>
		<?php include 'components/fixed_plugin.php';?>
                
        <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
	</body>
</html>


