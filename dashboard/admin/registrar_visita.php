<?php
require '../../include/db_conn.php';

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
	<title>
		<?php echo $_SESSION['siteTitle']; ?>
	</title>
	<!--     Fonts and icons     -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet"/>

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
	<?php $active = ''; include 'components/menu.php'; ?>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ">
		<!-- Navbar -->
		<?php $titlePage = 'Resumen'; include 'components/navbar.php'; ?>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
		
			<div class="row ">
				<div class="col-lg-12 col-md-6 mb-md-0 mb-4">
					<div class="card">
						<div class="card-header pb-0">
							
							<div class="row">
								<div class="card card-plain">
									<div class="card-header pb-0 text-left">
										<h3 class="font-weight-bolder ">Registrar Ingreso</h3>
										<p class="mb-0">Ingrese el Id del cliente</p>
									</div>
									<div class="card-body pb-3">
										<form role="form text-left">
									
										<div class="input-group mb-3">
											<input id="search" type="text" class="form-control" placeholder="ID" aria-label="Name" aria-describedby="name-addon">
										</div>
										<div class="card" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
									<div class="table-responsive">
										<table style="display:" class="table align-items-center mb-0">
										<thead>
											
										</thead>
											<tbody >
												

												
												
											</tbody>
										</table>
										</div>
										</div>
										<div class="col-md-12 d-flex">
											<div class="text-center col-md-6 px-4 ">
												<button id="searchUser" style="background: <?php echo $principalColor?>; color: white;" type="button" class="btn btn-lg btn-rounded w-100 mt-4 mb-0">Buscar Usuario</button>
											</div>
											<div class="text-center col-md-6 px-4 ">
												<button id="register" style="background: <?php echo $principalColor?>; color: white;" type="button" class="btn btn-lg btn-rounded w-100 mt-4 mb-0">Registrar Visita</button>
											</div>
										</div>
										
										</form>
									</div>
								
									<div class="card-footer text-center pt-0 px-sm-4 px-1">
										<p class="mb-4 mx-auto">
										¿Olvidaste tu ID?
										<a href="javascrpt:;"  style="color: <?php echo $principalColor?>; " class="font-weight-bold">Buscar</a>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="card" style="background: transparent; box-shadow: none;">
									<div class="card-body">
										<div class="row">
											<div class="col-12">
												
												<form id="form1" name="form1" method="post" class="a1-container"
													action="edit_mem_submit.php">
													<div class="row">
														
												</form>
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
	<script src="../assets/js/plugins/chartjs.min.js"></script>
		
	<script>
		document.getElementById('searchUser').addEventListener('click', function(){getUsers()});
		document.getElementById('register').addEventListener('click', function(){registerVisit()});

		function getUsers(){
			let search = document.getElementById("search").value;
			console.log(search);
			if (search==""){
				alert("campo vacio");
        		return;
        	}
			
        	
			var url = "./scripts/find_user.php?search="+search;

			var ajax = new XMLHttpRequest();
			ajax.open("GET", url, true);
			ajax.send(null);
			ajax.onreadystatechange = function () {
				if (ajax.readyState == 4 && (ajax.status == 200)) {
					console.log("ready")            
					var data = JSON.parse(ajax.responseText);
					console.log(data);
					console.log(JSON.parse(data.userData));
					printUsers(JSON.parse(data.userData))
				} else {
					console.log("not ready yet")            
				}
			}
		}

		function registerVisit() {

		}

		function printUsers(users) {
			const tBody = document.querySelector("tbody");
			tBody.innerHTML = ""
			for (let index = 0; index < users.length; index++) {
				console.log("entra");
				let user = users[index];
				var template = `
				<tr>
					<td>
						<input type="radio" id="subscribeNews" value="${user.userid}" name="register" radio>
					</td>
					<td>
						<p id="uid" class="m-auto text-secondary text-xs font-weight-bold">${user.userid}</p>
					</td>
					<td>
						<p is="name" class=" m-auto  text-secondary text-xs font-weight-bold">${user.username}</p>
					</td>
					<td>
						<p id="status" class="m-auto text-secondary text-xs font-weight-bold">Activo</p>
					</td>
					<td>
						<p id="expire" class="m-auto text-secondary text-xs font-weight-bold">${user.dob}</p>
					</td>
				</tr>`;
				tBody.innerHTML += template;

				// Seleccionar todas las etiquetas tr
				let filas = document.querySelectorAll("tr");

				// Agregar un evento 'click' a cada fila
				filas.forEach(fila => {
				fila.addEventListener("click", () => {
					// Seleccionar el botón radio correspondiente a la fila
					let radio = fila.querySelector("input[type='radio']");
					// Seleccionar el botón
					radio.checked = true;
				});
				});

				
			}
			
		}

		
	</script>
	<!-- Github buttons -->
	<script async defer src="../assets/js/buttons.js"></script>
	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

</html>




<?php

?>