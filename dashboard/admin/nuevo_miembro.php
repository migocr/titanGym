<?php
	require '../../include/db_conn.php';
	date_default_timezone_set('America/Mazatlan');
	
	page_protect();
	$principalColor = $_SESSION['principalColor'];
	$backgroundColor =  $_SESSION['backgroundColor'];
?>
<?php

$_DIR = dirname(dirname(dirname(__FILE__)));

require  $_DIR . '/vendor/autoload.php' ;
$dotenv = Dotenv\Dotenv::createImmutable($_DIR);
$dotenv->load(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<link href="../assets/css/font-awesome.css" rel="stylesheet"/>

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
	<script src="../assets/js/popper.js"></script>
	<script src="../assets/js/tippy.js"></script>
</head>

<body class="g-sidenav-show " style="<?php echo "background:$backgroundColor !important;"?>">
	<?php $active = 'new'; include 'components/menu.php'; ?>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
		<!-- Navbar -->
		<?php $titlePage = 'Nuevo Miembro'; include 'components/navbar.php'; ?>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
			
			<div class="">
				<div class="card" style="box-shadow: none;">
					<div class="card-body pt-3 py-3 pb-0">
						<div class="row">
							<div class="col-12">
								<div class="card mb-4" style="box-shadow: none;">
									<div class="card-body px-0 pt-0 pb-0">
										<div class="table-responsive p-0">
											<div class="" style="margin:1em 1em 0 1em;">
												<div class="d-flex align-items-center">
													<i class="fa-solid fa-user-plus px-1"></i>
													<h6 style="    margin: inherit;">Agregar Miembro</h6>
												</div>
												
												<hr class="px-0 py-0 my-2" style="background: #00000099;height: .5px;">
												<form id="form1" name="form1" method="post" action="new_submit.php">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label for="example-search-input" class="form-control-label   text-xs font-weight-bolder "><i class="fa-regular fa-circle-question user-name"></i> Nombre</label>
																
																<input class="form-control" type="text" placeholder="Nombre del nuevo miembro" value=""
																	name="u_name" id="boxx" required>
																
															</div>
														</div>
														<div class="col-md-6">
														<div class="form-group">
															<label for="example-tel-input" class="form-control-label   text-xs font-weight-bolder"><i class="fa-regular fa-circle-question phone"></i> Telefono</label>
															<input class="form-control"   type="tel" pattern="[0-9]{10}" maxlength="10" name="phone" placeholder="Numero a 10 digitos" id="example-tel-input">
														</div>
														</div>
																											
														
														<div class="col-md-6">
															<div class="form-group">
																<label for="example-color-input" class="form-control-label  text-xs font-weight-bolder"><i class="fa-regular fa-circle-question membership"></i> Membresia</label>
																<select  style="width: 100%;
																	border: 1px #e9ecef solid;
																	border-radius: 5px;
																	padding: 5px;"  class="selectpicker " id="planSelector" data-style="select-with-transition" title="Single Select" data-size="7"  name="plan" 
																							onchange="changeExpireDate(this.value,this.options[this.selectedIndex].getAttribute('duration'),this.options[this.selectedIndex].getAttribute('durationtype'))">
																							<option value="">Seleccionar Membresia (Opcional)</option>
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
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="example-email-input" class="form-control-label"><i class="fa-regular fa-circle-question genre"></i> Genero</label>
																<select style="width: 100%;
																	border: 1px #e9ecef solid;
																	border-radius: 5px;
																	padding: 5px;" name="gender" id="boxx" required>
																	<option value="">--Favor Seleccionar--</option>
																	<option value="Hombre">Hombre</option>
																	<option value="Mujer">Mujer</option>
																</select>
															</div>
														</div>
														<div class="col-md-6 member-date">
															<div class="form-group">
																<label for="example-date-input" class="form-control-label   text-xs font-weight-bolder"><i class="fa-regular fa-circle-question join-date"></i> Inicio de Suscripcion</label>
																<input id="start-date" class="form-control" type="date" value='<?php echo str_replace("/","-",date("Y/m/d"));?>'
																	name="jdate" id="boxx">
															</div>
														</div>
														<div class="col-md-6 member-date ">
															<div class="form-group">
																<label for="example-date-input" class="form-control-label   text-xs font-weight-bolder"><i class="fa-regular fa-circle-question expire-date"></i> Fin de Suscripcion</label>
																<input class="form-control" type="date" value=''
																	name="dob" id="expire-date" >
																	
															</div>
														</div>
														
														
													</div>
													
													
													
													
													<div id="plandetls" class="row"></div>
													<div class="col-md-12">
													<div style="width: auto; display: flex;justify-content: center;">
														<input style="margin-right: 1em;background-image:<?php echo $principalColor ?>" class="btn btn-primary" type="submit" name="submit" id="submit" value="Registrar">
														<input class="btn btn-default" type="reset" name="reset" id="reset" value="Borrar">
													</div>							
													</div>
													
												
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<?php include 'components/footer.php';?>
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
	<script async defer src="../assets/js/buttons.js"></script>
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
					
					let formatedDate = `${new Date().getFullYear()}-${new Date().getMonth()+1 > 9 ? new Date().getMonth()+1 : '0' + (new Date().getMonth()+1)}-${new Date().getDate() > 9 ? new Date().getDate() : '0'+new Date().getDate()}`
					document.getElementById("start-date").value = formatedDate;
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
	//ajusta las fechas del selector de fechas al elegir plan y modificar start date
	document.getElementById('start-date').addEventListener('change', function() {
		console.log("si")
		if (planSelector.value && validityPlan) {
			let validity = parseInt(validityPlan.getAttribute("validity")) ;
			let planType = validityPlan.getAttribute("planType");
			let startDate = document.getElementById("start-date").value;
			if (planType == "m") {			
				var expireDate = new Date(startDate.split("-"));
				expireDate.setMonth(expireDate.getMonth() +  validity); 
				
				console.log(expireDate)
				let _expireDate =  expireDate.getFullYear()  + "-"  + ("0" + (expireDate.getMonth() + 1)).slice(-2)  + "-" + (expireDate.getDate() < 10 ? '0' + expireDate.getDate() : expireDate.getDate() );
				document.getElementById("expire-date").value = _expireDate;
			}
			if (planType == "d") {
				var expireDate = new Date(startDate.split("-"));
				expireDate.setDate(expireDate.getDate() + validity); 
				console.log(expireDate);
				_expireDate =  expireDate.getFullYear()  + "-"  + ("0" + (expireDate.getMonth() + 1)).slice(-2)  + "-" + (expireDate.getDate() < 10 ? '0' + expireDate.getDate() : expireDate.getDate() );
				document.getElementById("expire-date").value = _expireDate;
			}
		}
 	 });

	//help tippys
	tippy('.user-name', {
		content: "Ingrese el nombre completo del usuario"
	});
	tippy('.phone', {
		content: "Ingrese el numero celular del cliente"
	});
	tippy('.join-date', {
		content: "Fecha en que comienza la suscripcion"
	});
	tippy('.expire-date', {
		content: "Fecha en que finaliza la suscripcion"
	});
	tippy('.membership', {
		content: "Puedes elegir la membresia con el que se registra el nuevo cliente o puedes dejarlo en blanco para no asignar ninguna"
	});
	tippy('.genre', {
		content: "Elige el genero del cliente"
	});
	
</script>

</html>