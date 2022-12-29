<?php
require '../../include/db_conn.php';
require '../../include/get_color.php';
page_protect();
$principalColor = getColor($con);

$_DIR = 'C:\xampp\htdocs\gym_l';
require  $_DIR . '\vendor\autoload.php' ;
$dotenv = Dotenv\Dotenv::createImmutable($_DIR);
$dotenv->load(); 

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
	<?php $active = 'members'; include 'components/menu.php'; ?>
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
	<?php include 'components/fixed_plugin.php';?>
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