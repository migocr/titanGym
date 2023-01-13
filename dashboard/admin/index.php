<?php
	require '../../include/db_conn.php';
	date_default_timezone_set('America/Mexico_City');
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

<body class="g-sidenav-show" style="<?php echo "background:$backgroundColor !important;"?>     background-attachment: fixed;">
	<?php $active = 'dashboard'; $principalColor = $principalColor; include 'components/menu.php'; ?>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
		<!-- Navbar -->
		<?php $titlePage = 'Resumen'; include 'components/navbar.php'; ?>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
			<div class="row">
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="card">
						<div class="card-body p-3">
							<div class="row">
								<div class="col-8">
									<div class="numbers">
										<p class="text-sm mb-0 text-capitalize font-weight-bold">Ingresos del mes</p>
										<h5 class="font-weight-bolder mb-0">
											<?php
											date_default_timezone_set('America/Mexico_City');
											$date  = date('Y-m');
											$query = "select * from enrolls_to WHERE  paid_date LIKE '$date%'";

											//echo $query;
											$result  = mysqli_query($con, $query);
											$revenue = 0;
											if (mysqli_affected_rows($con) != 0) {
												while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
													$query1="select * from plan where pid='".$row['pid']."'";
													$result1=mysqli_query($con,$query1);
													if($result1){
														$value=mysqli_fetch_row($result1);
													$revenue = $value[4] + $revenue;
													}
												}
											}
											echo "$".$revenue;
											?>
											<span class="text-success text-sm font-weight-bolder">
												<?php
													function pctDiff($x1, $x2) {
														if (($x2 == 0 && $x1 == 0)) {
															return 0;
														}
														if(!$x1) {
															return 100;
														}
														$diff = ($x2 - $x1) / $x1;
														return round($diff * 100, 2);
													}
													$nowDate = date("Y-m-d");
													$newdate = date("Y-m", strtotime ( '-1 month' , strtotime ( $nowDate ) )) ;
													$query = "select * from enrolls_to WHERE  paid_date LIKE '$newdate%'";
													$result  = mysqli_query($con, $query);
													$revenuePassMonth = 0;
													if (mysqli_affected_rows($con) != 0) {
														while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
															$query1="select * from plan where pid='".$row['pid']."'";
															$result1=mysqli_query($con,$query1);
															if($result1){
																$value=mysqli_fetch_row($result1);
																$revenuePassMonth = $value[4] + $revenuePassMonth;
															}
														}
													}
													if($revenuePassMonth < $revenue) {
														echo "+";
													}
													$diff = pctDiff($revenuePassMonth, $revenue);
													echo $diff . '%';												
												?>
											</span>
										</h5>
									</div>
								</div>
								<div class="col-4 text-end">
									<div
										class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md" style=
										<?php echo "'background-image:$principalColor;'"?>
										>
										<i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="card">
						<div class="card-body p-3">
							<div class="row">
								<div class="col-8">
								<div class="numbers">
										<p class="text-sm mb-0 text-capitalize font-weight-bold">Ingresos Anuales</p>
										<h5 class="font-weight-bolder mb-0">
											<?php
											date_default_timezone_set('America/Mexico_City');
											$date  = date('Y');
											$query = "select * from enrolls_to WHERE  paid_date LIKE '$date%'";

											//echo $query;
											$result  = mysqli_query($con, $query);
											$revenue = 0;
											if (mysqli_affected_rows($con) != 0) {
												while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
													$query1="select * from plan where pid='".$row['pid']."'";
													$result1=mysqli_query($con,$query1);
													if($result1){
														$value=mysqli_fetch_row($result1);
													$revenue = $value[4] + $revenue;
													}
												}
											}
											echo "$".$revenue;
											?>
											<span class="text-success text-sm font-weight-bolder"><?php echo date("Y");?></span>
										</h5>
									</div>
								</div>
								<div class="col-4 text-end">
									<div
										class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md" style=<?php echo "'background-image:$principalColor;'"?>>
										<i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
					<div class="card">
						<div class="card-body p-3">
							<div class="row">
								<div class="col-8">
									<div class="numbers">
										<p class="text-sm mb-0 text-capitalize font-weight-bold">Miembros activos</p>
										<h5 class="font-weight-bolder mb-0">
											<?php
												$today = date("Y-m-d");
												
												$query = "select COUNT(*) from users where cast(dob as DATE) > cast('$today' as DATE)";

												$result = mysqli_query($con, $query);
												$i      = 1;
												if (mysqli_affected_rows($con) != 0) {
													while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
														echo $row['COUNT(*)'];
													}
												}
												$i = 1;
												
											?>
										</h5>
									</div>
								</div>
								<div class="col-4 text-end">
									<div
										class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md" style=<?php echo "'background-image:$principalColor;'"?>>
										<i class="fa-solid fa-user-check opacity-10"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="card">
						<div class="card-body p-3">
							<div class="row">
								<div class="col-8">
									<div class="numbers">
										<p class="text-sm mb-0 text-capitalize font-weight-bold">Miembros Totales</p>
										<h5 class="font-weight-bolder mb-0">
											<?php
											$query = "select COUNT(*) from users";

											$result = mysqli_query($con, $query);
											$i      = 1;
											if (mysqli_affected_rows($con) != 0) {
												while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
													echo $row['COUNT(*)'];
												}
											}
											$i = 1;
											?>
											
										</h5>
									</div>
								</div>
								<div class="col-4 text-end">
									<div
										class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md" style=<?php echo "'background-image:$principalColor;'"?>>
										<i class="fa-solid fa-users-rays opacity-10"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-lg-12 mb-lg-0 mb-4">
					<div class="card">
						<div class="card-body p-3">
							<div class="row">
							<div class="col-12">
								<div class="card mb-4" style="box-shadow: none;">
									<div class="card-header pb-0 pt-1">
									<h6>Miembros proximos a caducar</h6>
									<div class="table-responsive p-0">
										<table class=" table align-items-center justify-content-center mb-0">
										<thead>
											<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">ID</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 p-2">Nombre</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Dias Restantes</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">Status</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Caduca</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Agregar Pago</th>
											</tr>
										</thead>
										<?php
											$today = date("Y-m-d");
											$nextWeek = date('Y-m-d', strtotime(' +7 days'));
											
											//usuarios que van a caducar HOY y dentro de next week, definir tiempo
											$query = "select * FROM users WHERE cast(dob as DATE) >= CURDATE() ORDER BY cast(dob as DATE) ASC";
												$result = mysqli_query($con, $query);
												$sno    = 1;
												if (mysqli_affected_rows($con) != 0) {
													while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {													
														$uid   = $row['userid'];
														$rowGender = $row['gender'];	
														echo "<td> 
																
																	<h6 class='mb-0 text-sm'>".$uid ." </h6>
															
																</td>";										
														echo "<td style='width: 1em'> 
																<h6 class='mb-0 text-sm'>". $row['username'] . " </h6>
																</td>";
														$expireDate = strtotime($row['dob']);
														$today = strtotime(date("Y-m-d"));
														$timeDiff = abs($expireDate - $today);
														$numberDays = $timeDiff/86400;
														$numberDays = intval($numberDays);
														
														$timestamp1 = strtotime(str_replace('-', '/', $row['dob']));
														$timestamp2 = strtotime(date('Y/m/d'));
														//echo $today;
														if (date('Ymd', $timestamp1) <= date('Ymd', $timestamp2)) {
															//echo $today . 'es menor que' . $expireDate;
															$memberStatus = false;
															$statusString = "Expirado";
															$statusClass = "bg-gradient-danger";
														} else {
															//echo  $today . 'es mayor o igual que'. $expireDate;
															$memberStatus = true;
															$statusString = "Activo";
															$statusClass = "bg-gradient-success";
														}
														echo "<td ><p class='text-center'>" . $numberDays ."</p></td>";
														echo "<td class='text-center'><span class='badge badge-sm bg-gradient-success $statusClass'>$statusString</span></td>";									
														echo "<td><p class='text-center text-sm font-weight-bold mb-0 '>" . $row['dob'] . "</p></td>";
														$sno++;
														
														echo "<td class='text-center' style='width:1em;'><form action='make_payments.php' method='post'><input type='hidden' name='userID' value='" . $uid . "'/>
														<input type='hidden' name='planID' value='" .  "'/>
														<div class='btn btn-default'><input type='submit' class='btn' value='Agregar Pago' style='
															padding: 0 5px 0 0;;
															margin: 0;
															background: transparent;
															box-shadow: none;
														'><i class='fa-sharp fa-solid fa-credit-card'></i>
														</div>
														</form></td></tr>";														$msgid = 0;
													}
												}
											?>	
										
										
											</table>
										</div>
									</div>
									<div class="card-body px-0 pt-0 pb-2">
									
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