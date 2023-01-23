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
											date_default_timezone_set('America/Mazatlan');
											$date  = date('Y-m');
											$query = "select * from enrolls_to WHERE  paid_date LIKE '$date%'";

											//echo $query;
											$result  = mysqli_query($con, $query);
											$revenue = 0;
											
											if (mysqli_affected_rows($con) != 0) {
												while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
													$revenue = $row['amount'] + $revenue;
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
															$revenuePassMonth = $row['amount'] + $revenuePassMonth;
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
											date_default_timezone_set('America/Mazatlan');
											$date  = date('Y');
											$query = "select * from enrolls_to WHERE  paid_date LIKE '$date%'";

											//echo $query;
											$result  = mysqli_query($con, $query);
											$revenue = 0;
											if (mysqli_affected_rows($con) != 0) {
												while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
													$revenue =$revenuePassMonth = $row['amount'] + $revenuePassMonth; + $revenue;
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
							
							<div class="card" style="box-shadow: none;">
								<div class="card-header pb-0">
									<div class="d-flex justify-content-between">
									<h6>Miembros Proximos a Expirar</h6> 
																		
									</div>
									
									
									
									
								</div>
								
								<div class="card-body p-3">
									<div class="row">
									<div class="col-12">
										<div class="table-responsive p-0">
										<table class="table align-items-center mb-0">
											<thead>
											<tr>
												<th class="text-uppercase text-secondary text-xs font-weight-bolder">ID</th>
												<th class="text-uppercase text-secondary text-xs font-weight-bolder px-2">Nombre</th>
												<th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2 text-center">Dias Restantes</th>
												<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Status</th>
												<th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Caduca</th>

												<th class="text-center  d-flex" style="justify-content: space-around;">
													<p class="text-uppercase text-secondary text-xs font-weight-bolder my-auto">Editar</p> 
													<p class="text-uppercase text-secondary text-xs font-weight-bolder my-auto">Ver</p> 
													<p class="text-uppercase text-secondary text-xs font-weight-bolder my-auto">pagar</p>
													
												</th>

											</tr>
											</thead>
											<tbody id="membersTable">
											
											<?php
												$query = "select * FROM users WHERE cast(dob as DATE) >= CURDATE() ORDER BY cast(dob as DATE) ASC";
												//echo $query;
												$result = mysqli_query($con, $query);
												$sno    = 1;
												
												if (mysqli_affected_rows($con) != 0) {
													while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
														$emparray = array();
														$emparray[] = $row;
														$jsondata = json_encode($emparray);
														echo "<tr json-data='$jsondata'>";
														$uid   = $row['userid'];
														$rowGender = $row['gender'];
														echo "<td> 
														<div class='d-flex px-2'>
															<p class='mb-0 text-sm'>". $uid ." </p>
														</td>";
														echo "<td> 
														<div class='d-flex px-2'>
															<p class='mb-0 text-sm'>". $row['username'] ." </p>
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
														echo "<td ><p class='text-center my-auto'>" . $numberDays ."</p></td>";
														echo "<td class='text-center'><span class=' w-100 badge badge-sm  $statusClass'>$statusString</span></td>";									
														echo "<td><p class='text-center text-sm font-semi-bold mb-0 '>" . $row['dob'] . "</p></td>";
														
																
																$sno++;
																echo "<td class='text-center d-flex' style='justify-content: space-evenly; padding: .2em!important;'><form action='edit_member.php' method='post'>
																		
																		<button class='edit-member' type='submit' style='border: 0; background: none; transform: scale(1.3); filter: opacity(0.7);'>
																		<i class='fa-solid fa-pen-to-square'></i>
																		</button>
																		
																		<input type='hidden' name='name' value='" . $uid . "'/>
																		</form>";
																		echo "
																		
																		<button type='submit' style='border: 0; background: none; transform: scale(1.2)'>
																			<a href='view_member.php?id=$uid'><i class='fa-solid fa-arrow-up-right-from-square'></i></a>
																		</button>
																		
																		
																	";
															echo "<form action='make_payments.php' method='post'>
																		
																		<button type='submit' style='border: 0; background: none;transform: scale(1.2)'>
																		<i class='fa-sharp fa-solid fa-credit-card'></i>
																		</button>
																		
																		<input type='hidden' name='userID' value='" . $uid . "'/>
																		<input type='hidden' name='planID' value='RMNOGS'>
																		</form></td>";
																		
																$msgid = 0;
																echo "</tr>";
															}
														
													
												}
												?>	
											</tbody>

									
										</table>
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
	<script src="../assets/js/plugins/chartjs.min.js"></script>
	<style>
		#membersTable td{
			padding:0!important
		}
		#membersTable th {
			
		}
	</style>
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
		tippy('.edit-member', {
			content: "Editar informacion del usuario",
		});
		
														
												
	</script>
	<!-- Github buttons -->
	<script async defer src="../assets/js/buttons.js"></script>
	<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
	<script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

</html>