<?php
	require '../../include/db_conn.php';
	require '../../include/get_color.php';
	page_protect();
	$principalColor = getColor($con);
?>
<?php

$_DIR = 'C:\xampp\htdocs\gym_l';

require  $_DIR . '\vendor\autoload.php' ;
$dotenv = Dotenv\Dotenv::createImmutable($_DIR);
$dotenv->load(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<title>
		Soft UI Dashboard by Creative Tim
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

<body class="g-sidenav-show  bg-gray-100">
	<?php $active = 'new'; include 'components/menu.php'; ?>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
		<!-- Navbar -->
		<?php $titlePage = 'Nuevo Registro'; include 'components/navbar.php'; ?>
		<!-- End Navbar -->
		<div class="container-fluid py-4">

			<div class="row">
				<div class="col-12">
					<div class="card mb-4">
						<div class="card-body px-0 pt-0 pb-2">
							<div class="table-responsive p-0">
								<div class="" style="margin:1em;">
									
										<h6>Agregar Miembro</h6>
									
									<form id="form1" name="form1" method="post" class="a1-container" action="new_submit.php">
									<div class="form-group">
										<label for="example-text-input" class="form-control-label">ID de Membresia</label>
										<input class="form-control" type="text" id="boxx" name="m_id"
																	value="<?php echo time(); ?>" readonly required />
										
									</div>
									<div class="form-group">
										<label for="example-search-input" class="form-control-label">Nombre</label>
										
										<input class="form-control" type="text" placeholder="Nombre del nuevo miembro" value=""
											name="u_name" id="boxx" required>
									</div>
									<div class="form-group">
										<label for="example-email-input" class="form-control-label">Genero</label>
										<select style="width: 100%;
											border: 1px #e9ecef solid;
											border-radius: 5px;
											padding: 5px;" name="gender" id="boxx" required>
											<option value="">--Favor Seleccionar--</option>
											<option value="Hombre">Hombre</option>
											<option value="Mujer">Mujer</option>
										</select>
									</div>
									<div class="form-group">
										<label for="example-date-input" class="form-control-label">Fecha de ingreso</label>
										<input class="form-control" type="date" value='<?php echo str_replace("/","-",date("Y/m/d"));?>'
											name="jdate" id="boxx">
									</div>
									
									<div class="form-group">
										<label for="example-date-input" class="form-control-label">Fecha Caduca</label>
										<input class="form-control" type="date" value='<?php echo str_replace("/","-",date("Y/m/d"));?>'
											name="dob" id="expire-date" required>
											
									</div>
									<div class="form-group">
										<label for="example-color-input" class="form-control-label">Plan</label>
										<select  style="width: 100%;
											border: 1px #e9ecef solid;
											border-radius: 5px;
											padding: 5px;"  class="selectpicker " data-style="select-with-transition" title="Single Select" data-size="7"  name="plan" id="boxx" required
																	onchange="changeExpireDate(this.value,this.options[this.selectedIndex].getAttribute('duration'),this.options[this.selectedIndex].getAttribute('durationtype'))">
																	<option value="">--Favor Seleccionar--</option>
																	<?php
																	$query="select * from plan where active='yes'";
																	$result=mysqli_query($con,$query);
																	if(mysqli_affected_rows($con)!=0){
																		while($row=mysqli_fetch_row($result)){
																			echo "<option value=" .$row[0]." duration=". $row[3]." durationtype=". $row[6] . ">".$row[1]."</option>";
																		}
																	}

																?>

																</select>
									</div>
									<div id="plandetls"></div>
									<div style="width: auto; display: flex;justify-content: center;">
										<input class="btn btn-primary" type="submit" name="submit" id="submit" value="Registrar">
										<input class="btn btn-default" type="reset" name="reset" id="reset" value="Borrar">
									</div>
									
								</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer pt-3  ">
				<div class="container-fluid">
					<div class="row align-items-center justify-content-lg-between">
						<div class="col-lg-6 mb-lg-0 mb-4">
							<div class="copyright text-center text-sm text-muted text-lg-start">
								© <script>
									document.write(new Date().getFullYear())
								</script>,
								made with <i class="fa fa-heart"></i> by
								<a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
									Tim</a>
								for a better web.
							</div>
						</div>
						<div class="col-lg-6">
							<ul class="nav nav-footer justify-content-center justify-content-lg-end">
								<li class="nav-item">
									<a href="https://www.creative-tim.com" class="nav-link text-muted"
										target="_blank">Creative Tim</a>
								</li>
								<li class="nav-item">
									<a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
										target="_blank">About Us</a>
								</li>
								<li class="nav-item">
									<a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
										target="_blank">Blog</a>
								</li>
								<li class="nav-item">
									<a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
										target="_blank">License</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
		</div>
		
	</main>
	<?php include 'components/fixed_plugin.php';?>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
	<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
	<script>
		var win = navigator.platform.indexOf('Win') > -1;
		if (win && document.querySelector('#sidenav-scrollbar')) {
			var options = {
				damping: '0.5'
			}
			Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		}
	</script>
	<!-- Github buttons -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

<script>
	function changeExpireDate(str, duration, durationType) {
		/*Obtenemos data del plan e imprimimos en pantalla un template llamado plandetail.php */
		if (str == "") {
			document.getElementById("plandetls").innerHTML = "";
			return;
		} else {
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			}
			xmlhttp.onreadystatechange = function () {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("plandetls").innerHTML = this.responseText;

				}
			};

			xmlhttp.open("GET", "plandetail.php?q=" + str, true);
			xmlhttp.send();
		}
		/* FIN */
		/* Seteamos fecha de acuerdo al plan elegido */
		var expireDateInput = document.getElementById("expire-date");
		console.log(expireDateInput.value)
		var expireQty = parseInt(duration); //cantidad de dias o meses
		let date = new Date();
		if(durationType == "m") { // si es un plan con meses
			var expireDate = date.setMonth(date.getMonth() + expireQty);
		}
		if(durationType == "d") {// si es un plan con dias
			var expireDate = date.setDate(date.getDate() + expireQty);
		}
		let formatedDate = `${new Date(expireDate).getFullYear()}-${new Date(expireDate).getMonth()+1 > 9 ? new Date(expireDate).getMonth()+1 : '0' + (new Date(expireDate).getMonth()+1)}-${new Date(expireDate).getDate() > 9 ? new Date(expireDate).getDate() : '0'+new Date(expireDate).getDate()}`
		console.log(formatedDate);
		expireDateInput.value = formatedDate;
		//console.log(expireDateInput.value);


	}
</script>

</html>