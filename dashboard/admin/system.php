<?php
	require '../../include/db_conn.php';
	date_default_timezone_set('America/Mazatlan');
	page_protect();
	$principalColor = $_SESSION['principalColor'];
	$backgroundColor =  $_SESSION['backgroundColor'];

	$siteTitle = $_SESSION['siteTitle'];
	$colorFont = $_SESSION['colorFont'];
	$logo = $_SESSION['logo'];

	$_DIR = dirname(dirname(dirname(__FILE__)));
	require  $_DIR . '/vendor/autoload.php' ;
	$dotenv = Dotenv\Dotenv::createImmutable($_DIR);
	$dotenv->load();

?>
<!DOCTYPE html>
<html lang="es">

<!--
=========================================================
* Soft UI Dashboard - v1.0.6
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<link href="../assets/css/font-awesome.css" rel="stylesheet"/>
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
	<?php include 'components/spiner.php'; ?>	
	<?php $active = 'system'; $principalColor = $principalColor; include 'components/menu.php'; ?>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
		<!-- Navbar -->
		<?php $titlePage = 'Resumen'; include 'components/navbar.php'; ?>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
		
			<div class="">
				<div class="col-lg-12 col-md-6 mb-md-0 mb-4">
					<div class="card">
						<div class="card-header pb-0">
							<div class="">
								<h6>Configuracion de Sistema</h6>
							</div>
							<div class="row">
								<?php
	    
									//$query  = "SELECT config FROM system_settings WHERE nombre='color'";
									//$query1  = "SELECT config FROM system_settings WHERE nombre='backgroundColor';";
								    //$query2  = "SELECT config FROM system_settings WHERE nombre='siteTitle';";
									//$query3  = "SELECT config FROM system_settings WHERE nombre='colorFuente';";
									//$query4  = "SELECT config FROM system_settings WHERE nombre='logo'; ;";
									//echo $query;
//query-----------------------------------------------------------------------------------------------------
									/*$result = mysqli_query($con, $query);
							
									if (mysqli_affected_rows($con) == 1) {
										while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
											$configC    = $row['config'];					
										}
									} else{
										echo "<html><head><script>alert('Cambio Insatisfactorio');</script></head></html>";
										echo mysqli_error($con);
									}*/
//query1-----------------------------------------------------------------------------------------------------
									/*$result1 = mysqli_query($con, $query1);
									if (mysqli_affected_rows($con) == 1) {
										while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
											$configBC    = $row['config'];	
										}
									} else{
										echo "<html><head><script>alert('Cambio Insatisfactorio');</script></head></html>";
										echo mysqli_error($con);
									}*/
//query2-----------------------------------------------------------------------------------------------------
									/*$result2 = mysqli_query($con, $query2);
									if (mysqli_affected_rows($con) == 1) {
										while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
											$configNS    = $row['config'];	
										}
									} else{
										echo "<html><head><script>alert('Cambio Insatisfactorio');</script></head></html>";
										echo mysqli_error($con);
									}*/
//query3-----------------------------------------------------------------------------------------------------
									/*$result3 = mysqli_query($con, $query3);
									if (mysqli_affected_rows($con) == 1) {
										while ($row = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
											$configNC    = $row['config'];	
										}
									} else{
										echo "<html><head><script>alert('Cambio Insatisfactorio');</script></head></html>";
										echo mysqli_error($con);
									}*/
//query4-----------------------------------------------------------------------------------------------------
									/*$result4 = mysqli_query($con, $query4);
									if (mysqli_affected_rows($con) == 1) {
										while ($row = mysqli_fetch_array($result4, MYSQLI_ASSOC)) {
											$configCF    = $row['config'];	
										}
									} else{
										echo "<html><head><script>alert('Cambio Insatisfactorio');</script></head></html>";
										echo mysqli_error($con);
									}	
									*/						
								?>
								

							</div>
						</div>
						<div class="card" style="background: transparent; box-shadow: none;">
									<div class="card-body">
										<div class="row">
											<div class="col-12">
												<form id="form1" name="form1" method="post" class="a1-container"
													action="edit_mem_submit.php">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label for="example-text-input" class="form-control-label">Color Iconos</label>
																<input class="form-control"  id="boxxe" type="text" name="uid" value="<?php echo $backgroundColor?>" readonly required />
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="example-text-input" class="form-control-label">Color background</label>
																<input class="form-control"  id="boxxe" type="text" name="uid" value="<?php echo $principalColor?>" readonly required />
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="example-text-input" class="form-control-label">Nombre del sitio</label>
																<input class="form-control"  id="boxxe" type="text" name="uid" value="<?php echo $siteTitle?>" readonly required />
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="example-text-input" class="form-control-label">Color de fuente</label>
																<input class="form-control"  id="boxxe" type="text" name="uid" value="<?php echo $colorFont?>" readonly required />
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label for="example-text-input" class="form-control-label">Logo</label>
																<input class="form-control"  id="boxxe" type="text" name="uid" value="<?php echo $logo?>" readonly required />
															</div>
														</div>											
												</form>
											</div>
											<div style="width: auto; display: flex;justify-content: center;">
												<input class="btn btn-primary" type="submit" name="submit" id="submit" value="Guardar">
												<input class="btn btn-default" type="reset" name="reset" id="reset" value="Restaurar">
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
	<script async defer src="../assets/js/buttons.js"></script>
	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

</html>




