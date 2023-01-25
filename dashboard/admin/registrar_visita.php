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
	<link href="../assets/css/font-awesome.css" rel="stylesheet"/>
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

<body class="g-sidenav-show " style="<?php echo "background:$backgroundColor !important;"?>">
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
									<div class="card-header pb-0 text-center">
										<h3 class="font-weight-bolder ">Registrar Ingreso</h3>
										<p class="mb-0">Ingrese el id o nombre del cliente</p>
									</div>
									<div class="card-body pb-3">
										<div role="form text-left">
											
												<div class="col-md-12 d-flex" style="align-items: center;">
													<input style="max-width:85%;" id="search" type="text" class="form-control " placeholder="ID" aria-label="Name" aria-describedby="name-addon">
													<button id="searchUser" style=" margin: auto; background: <?php echo $principalColor?>; color: white;" type="button" class="btn btn-rounded"><i id="search" class="fas fa-search" aria-hidden="true"></i> Buscar</button>


												</div>
												
											
										
										
										<div class="card mt-3" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;">
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
											
											<div class="text-center col-md-8 px-4 m-auto " >
												<button id="register" style="background: <?php echo $principalColor?>; color: white;" type="button" class="btn btn-lg btn-rounded w-100 mt-4 mb-0 disabled">Registrar Visita</button>
											</div>
										</div>
										
									</div>
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
		const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

		document.getElementById('searchUser').addEventListener('click', function(){getUsers()});

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
					printUsers(JSON.parse(data.userData), search);
				} else {
					console.log("not ready yet")            
				}
			}
		}

		function registerVisit() {
			console.log("entra")
			// Obtener el elemento input type radio checkeado
			let checkedInput = document.querySelector("input[type='radio']:checked");

			// Obtener la fila que contiene el elemento input type radio checkeado
			let checkedRow = checkedInput.closest("tr");

			// Obtener los valores de los elementos de la fila
			let uid = checkedRow.querySelector("#uid-"+checkedInput.value).innerHTML;
			let name = checkedRow.querySelector("#name-"+checkedInput.value).innerHTML;
			let status = checkedRow.querySelector("#status-"+checkedInput.value).innerHTML;
			let dob = checkedRow.querySelector("#expire-"+checkedInput.value).innerHTML;

			console.log(uid);
			console.log(name);
			console.log(status);
			if(status.toLowerCase() == "activo") {
				var myhtml = document.createElement("div");
				myhtml.innerHTML = "Registrar visita de <b>"+ name +"</b>. ";
				swal({
					title: "¿Estas seguro?",
					content:myhtml,
					icon: "warning",
					buttons: {
						cancel: {
							text: "Cancelar",
							value: false,
							visible: true,
							className: "",
							closeModal: true,
						},
						confirm: {
							text: "Registrar Visita",
							value: true,
							visible: true,
							className: "",
							closeModal: true
						}
					},
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						submitVisit(uid);						
					} else {
						
					}
				});
			} else {
				var myhtml = document.createElement("div");
				let fecha = new Date(dob);
				let dia =  fecha.getDate();
				let mes = meses[fecha.getMonth()];

				myhtml.innerHTML = `El usuario que trata de ingresas <strong>expiro el dia: ${dia} de ${mes} </strong>, para poder registrar su visita primero requiere realizar un nuevo pago`;
				swal({
					title: 'Alerta!',
					content: myhtml,
					icon: 'warning',
					buttons: {
						cancel: "Cancelar",
						confirm: "Agregar Pago"
					}
					}).then((value) => {
					if (value) {
						
						window.location.href = window.location.href.replace("registrar_visita.php", "make_payments.php?userID="+uid)
					} else {
						// Cancelar
					}
					});
			}
			
		}

		function submitVisit(uid) {
			try {
				fetch('./scripts/register_visit.php', {
					method: 'POST',
					headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				},
				body: `userid=${uid}`
				}).then(function (response) {
					console.log(response);
					return response.json();
				}).then(function (data) {
					console.log(data)
					
					if(data.status) {
						swal("Visita registrada de "+ name, {
							icon: "success",
						}).then((value) => {window.location.reload()});
					} else {
						swal("No se pudo registrar visita de usuario ", {
							icon: "error",
						});
					}
				// aquí manejas la respuesta
				});
			} catch (error) {
				swal("No se pudo registrar visita de usuario ", {
							icon: "error",
						});
						console.log(error)
			}

		}

		function printUsers(users, search) {
			const tBody = document.querySelector("tbody");
			console.log("print", users)
			if (users.length < 1 || !users  || users.length == 0 ) {
				var template = `<p class="m-auto p-3">No encontramos resultados para su busqueda: <strong>${search}</strong>, pruebe ingresando el nombre o el id a 4 digitos del cliente</p>`;
				tBody.innerHTML = template;
				document.getElementById('register').classList.add("disabled");
				return;
			}
			
			tBody.innerHTML = "";
			for (let index = 0; index < users.length; index++) {
				
				let user = users[index];
				console.log(user);
				if (Date.parse(user.dob) <= Date.now()) {
					stateString = "Expirado";
					classBadget = 'bg-gradient-danger';
					classInput = "disabled;"
				} else {
				
					stateString = "Activo";
					classBadget = 'bg-gradient-success';
				}
				var template = `
				<tr>
					<td>
						<input type="radio" id="check-${user.userid}" value="${user.userid}" name="register" radio>
					</td>
					<td>
						<p id="uid-${user.userid}" class="m-auto text-secondary text-xs font-weight-bold">${user.userid}</p>
					</td>
					<td>
						<p id="name-${user.userid}" class=" m-auto  text-secondary text-xs font-weight-bold">${user.username}</p>
					</td>
					<td>
						<span style="max-width:100px;" id="status-${user.userid}" class="w-100 m-auto  text-xs font-weight-bold badge badge-sm ${classBadget}">${stateString}</span>
					</td>
					<td>
						<p id="expire-${user.userid}" class="m-auto text-secondary text-xs font-weight-bold">${user.dob}</p>
					</td>
				</tr>`;
				tBody.innerHTML += template;

				// Seleccionar todas las etiquetas tr
				let filas = document.querySelectorAll("tr");

				// Agregar un evento 'click' a cada fila
				filas.forEach(fila => {
				fila.addEventListener("click", () => {
					document.getElementById('register').classList.remove("disabled");
					// Seleccionar el botón radio correspondiente a la fila
					let radio = fila.querySelector("input[type='radio']");
					// Seleccionar el botón
					radio.checked = true;
				});
				});
				// Agregar un evento 'click' a cada registrar usuario
				document.getElementById('register').addEventListener('click', function(){registerVisit()});
				
			}
			
		}

		document.getElementById("search").addEventListener("keyup", function(event){
			
		if(event.keyCode === 13){
			event.preventDefault();

			getUsers();
		}
	});

		
	</script>
	<!-- Github buttons -->
	<script async defer src="../assets/js/buttons.js"></script>
	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

</html>




<?php

?>