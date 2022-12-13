<?php
require '../../include/db_conn.php';
page_protect();

if (isset($_POST['name'])) {
    $memid = $_POST['name'];
?>

<!DOCTYPE html>
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
	<?php $active = 'dashboard'; include 'components/menu.php'; ?>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
		<!-- Navbar -->
		<?php $titlePage = 'Resumen'; include 'components/navbar.php'; ?>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
		
			<div class="row my-4">
				<div class="col-lg-12 col-md-6 mb-md-0 mb-4">
					<div class="card">
						<div class="card-header pb-0">
							<div class="row">
								<?php
	    
		$query  = "SELECT * FROM users u 
				   INNER JOIN address a ON u.userid=a.id
				   INNER JOIN  health_status h ON u.userid=h.uid
				   WHERE userid='$memid'";
		//echo $query;
		$result = mysqli_query($con, $query);
		$sno    = 1;
		
		$name="";
		$gender="";

		if (mysqli_affected_rows($con) == 1) {
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		
				$name    = $row['username'];
				$gender =$row['gender'];
				$dob	 = $row['dob'];         
				$jdate    = $row['joining_date'];
				  $streetname=$row['streetName'];
				  $state=$row['state'];
				  $city=$row['city'];  
				  $zipcode=$row['zipcode'];
				$calorie=$row['calorie'];
				$height=$row['height'];
				$weight=$row['weight'];
				$fat=$row['fat'];
				$remarks=$row['remarks'];				            
			}
		} else{
			 echo "<html><head><script>alert('Cambio Insatisfactorio');</script></head></html>";
			 echo mysqli_error($con);
		}


		?>
								<div class="a1-container a1-small a1-padding-32"
									style="margin-top:2px; margin-bottom:2px;">
									<div class="a1-card-8 a1-light-gray" style="width:600px; margin:0 auto;">
										<div class="a1-container a1-dark-gray a1-center">
											<h6>Editar Detalles de Miembro</h6>
										</div>
										<form id="form1" name="form1" method="post" class="a1-container"
											action="edit_mem_submit.php">
											<table width="100%" border="0" align="center">
												<tr>
													<td height="35">
														<table width="100%" border="0" align="center">
															<div class="form-group">
																<label for="example-text-input" class="form-control-label">ID de Membresia</label>
																<input class="form-control"  id="boxxe" type="text" name="uid"
																							value="<?php echo $memid?>" readonly required />
																
															</div>
															<div class="form-group">
																<label for="example-search-input" class="form-control-label">Nombre</label>
																
																<input class="form-control" type="text" placeholder="Nombre del nuevo miembro" 
																	name="uname" id="boxxe" value="<?php echo $name?>" required>
															</div>
															
															<div class="form-group">
																<label for="example-email-input" class="form-control-label">Genero</label>
																<select style="width: 100%;
																	border: 1px #e9ecef solid;
																	border-radius: 5px;
																	padding: 5px;" name="gender" id="gender" required>
																
																	<option
																			<?php if($gender == 'Hombre'){echo("selected");}?>
																			value="Hombre">Hombre</option>
																		<option
																			<?php if($gender == 'Mujer'){echo("selected");}?>
																			value="Mujer">Mujer</option>
																</select>
															</div>
															



															<br>

														
														</table>
													</td>
												</tr>
											</table>
											<div style="width: auto; display: flex;justify-content: center;">
												<input class="btn btn-primary" type="submit" name="submit" id="submit" value="Guardar">
												<input class="btn btn-default" type="reset" name="reset" id="reset" value="Restaurar">
											</div>
										</form>
									</div>
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
	<div class="fixed-plugin">
		<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
			<i class="fa fa-cog py-2"> </i>
		</a>
		<div class="card shadow-lg ">
			<div class="card-header pb-0 pt-3 ">
				<div class="float-start">
					<h5 class="mt-3 mb-0">Soft UI Configurator</h5>
					<p>See our dashboard options.</p>
				</div>
				<div class="float-end mt-4">
					<button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
						<i class="fa fa-close"></i>
					</button>
				</div>
				<!-- End Toggle Button -->
			</div>
			<hr class="horizontal dark my-1">
			<div class="card-body pt-sm-3 pt-0">
				<!-- Sidebar Backgrounds -->
				<div>
					<h6 class="mb-0">Sidebar Colors</h6>
				</div>
				<a href="javascript:void(0)" class="switch-trigger background-color">
					<div class="badge-colors my-2 text-start">
						<span class="badge filter bg-gradient-primary active" data-color="primary"
							onclick="sidebarColor(this)"></span>
						<span class="badge filter bg-gradient-dark" data-color="dark"
							onclick="sidebarColor(this)"></span>
						<span class="badge filter bg-gradient-info" data-color="info"
							onclick="sidebarColor(this)"></span>
						<span class="badge filter bg-gradient-success" data-color="success"
							onclick="sidebarColor(this)"></span>
						<span class="badge filter bg-gradient-warning" data-color="warning"
							onclick="sidebarColor(this)"></span>
						<span class="badge filter bg-gradient-danger" data-color="danger"
							onclick="sidebarColor(this)"></span>
					</div>
				</a>
				<!-- Sidenav Type -->
				<div class="mt-3">
					<h6 class="mb-0">Sidenav Type</h6>
					<p class="text-sm">Choose between 2 different sidenav types.</p>
				</div>
				<div class="d-flex">
					<button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
						onclick="sidebarType(this)">Transparent</button>
					<button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
						onclick="sidebarType(this)">White</button>
				</div>
				<p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
				<!-- Navbar Fixed -->
				<div class="mt-3">
					<h6 class="mb-0">Navbar Fixed</h6>
				</div>
				<div class="form-check form-switch ps-0">
					<input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
						onclick="navbarFixed(this)">
				</div>
				<hr class="horizontal dark my-sm-4">
				<a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free
					Download</a>
				<a class="btn btn-outline-dark w-100"
					href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View
					documentation</a>
				<div class="w-100 text-center">
					<a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard"
						data-icon="octicon-star" data-size="large" data-show-count="true"
						aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
					<h6 class="mt-3">Thank you for sharing!</h6>
					<a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
						class="btn btn-dark mb-0 me-2" target="_blank">
						<i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
					</a>
					<a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard"
						class="btn btn-dark mb-0 me-2" target="_blank">
						<i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
					</a>
				</div>
			</div>
		</div>
	</div>
	<!--   Core JS Files   -->
	<script src="../assets/js/core/popper.min.js"></script>
	<script src="../assets/js/core/bootstrap.min.js"></script>
	<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
	<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
	<script src="../assets/js/plugins/chartjs.min.js"></script>
	<script>
		var ctx = document.getElementById("chart-bars").getContext("2d");

		new Chart(ctx, {
			type: "bar",
			data: {
				labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Sales",
					tension: 0.4,
					borderWidth: 0,
					borderRadius: 4,
					borderSkipped: false,
					backgroundColor: "#fff",
					data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
					maxBarThickness: 6
				}, ],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						display: false,
					}
				},
				interaction: {
					intersect: false,
					mode: 'index',
				},
				scales: {
					y: {
						grid: {
							drawBorder: false,
							display: false,
							drawOnChartArea: false,
							drawTicks: false,
						},
						ticks: {
							suggestedMin: 0,
							suggestedMax: 500,
							beginAtZero: true,
							padding: 15,
							font: {
								size: 14,
								family: "Open Sans",
								style: 'normal',
								lineHeight: 2
							},
							color: "#fff"
						},
					},
					x: {
						grid: {
							drawBorder: false,
							display: false,
							drawOnChartArea: false,
							drawTicks: false
						},
						ticks: {
							display: false
						},
					},
				},
			},
		});


		var ctx2 = document.getElementById("chart-line").getContext("2d");

		var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

		gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
		gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
		gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

		var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

		gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
		gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
		gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

		new Chart(ctx2, {
			type: "line",
			data: {
				labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
						label: "Mobile apps",
						tension: 0.4,
						borderWidth: 0,
						pointRadius: 0,
						borderColor: "#cb0c9f",
						borderWidth: 3,
						backgroundColor: gradientStroke1,
						fill: true,
						data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
						maxBarThickness: 6

					},
					{
						label: "Websites",
						tension: 0.4,
						borderWidth: 0,
						pointRadius: 0,
						borderColor: "#3A416F",
						borderWidth: 3,
						backgroundColor: gradientStroke2,
						fill: true,
						data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
						maxBarThickness: 6
					},
				],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						display: false,
					}
				},
				interaction: {
					intersect: false,
					mode: 'index',
				},
				scales: {
					y: {
						grid: {
							drawBorder: false,
							display: true,
							drawOnChartArea: true,
							drawTicks: false,
							borderDash: [5, 5]
						},
						ticks: {
							display: true,
							padding: 10,
							color: '#b2b9bf',
							font: {
								size: 11,
								family: "Open Sans",
								style: 'normal',
								lineHeight: 2
							},
						}
					},
					x: {
						grid: {
							drawBorder: false,
							display: false,
							drawOnChartArea: false,
							drawTicks: false,
							borderDash: [5, 5]
						},
						ticks: {
							display: true,
							color: '#b2b9bf',
							padding: 20,
							font: {
								size: 11,
								family: "Open Sans",
								style: 'normal',
								lineHeight: 2
							},
						}
					},
				},
			},
		});
	</script>
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

</html>




<?php
} else {
    
}
?>