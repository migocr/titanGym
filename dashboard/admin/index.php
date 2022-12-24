﻿<?php
	require '../../include/db_conn.php';
	
	page_protect();
?>
<?php

$_DIR = 'C:\xampp\htdocs\gym_l';

require  $_DIR . '\vendor\autoload.php' ;
$dotenv = Dotenv\Dotenv::createImmutable($_DIR);
$dotenv->load(); ?>


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

<body class="g-sidenav-show  bg-gray-100">
	<?php $active = 'dashboard'; include 'components/menu.php'; ?>
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
											date_default_timezone_set('America/Bogota');
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
										class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
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
											date_default_timezone_set('America/Bogota');
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
										class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
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
										class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
										<i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
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
											<span class="text-success text-sm font-weight-bolder">+5%</span>
										</h5>
									</div>
								</div>
								<div class="col-4 text-end">
									<div
										class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
										<i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-lg-7 mb-lg-0 mb-4">
					<div class="card">
						<div class="card-body p-3">
							<div class="row">
							<div class="col-12">
								<div class="card mb-4">
									<div class="card-header pb-0">
									<h6>Miembros proximos a caducar</h6>
									</div>
									<div class="card-body px-0 pt-0 pb-2">
									<div class="table-responsive p-0">
										<table class="table align-items-center justify-content-center mb-0">
										<thead>
											<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dias Restantes</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder text-center opacity-7 ps-2">Caduca</th>
											<th></th>
											</tr>
										</thead>
										<?php
											$today = date("Y-m-d");
											$nextWeek = date('Y-m-d', strtotime(' +4117 days'));
											//usuarios que van a caducar HOY y dentro de next week, definir tiempo
											$query = "select * from users where cast(dob as DATE) BETWEEN CAST('${today}' AS DATE) AND CAST('${nextWeek}' AS DATE)";
												$result = mysqli_query($con, $query);
												$sno    = 1;
												if (mysqli_affected_rows($con) != 0) {
													while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {													
														$uid   = $row['userid'];
														$rowGender = $row['gender'];											
														echo "<td> 
																<div class='d-flex px-2'>
																<div>
																	<img src='data:image/png;base64,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' class='avatar avatar-sm rounded-circle me-2' >
																</div>
																<div class='my-auto'>
																	<h6 class='mb-0 text-sm'>". $row['username'] ." </h6>
																</div>
																</div>
																</td>";
														$expireDate = strtotime($row['dob']);
														$today = strtotime(date("Y-m-d"));
														$timeDiff = abs($expireDate - $today);
														$numberDays = $timeDiff/86400;
														$numberDays = intval($numberDays);
														echo "<td>" . $numberDays ."</td>";
														echo "<td><span class='badge badge-sm bg-gradient-success'>Activo</span></td>";									
														echo "<td><p class='text-xs font-weight-bold mb-0'>" . $row['dob'] . "</p></td>";
														$sno++;
														
														echo "<td><form action='make_payments.php' method='post'><input type='hidden' name='userID' value='" . $uid . "'/>
														<input type='hidden' name='planID' value='" .  "'/><input type='submit' class='btn btn-default' value='Agregar Pago ' class='btn btn-info'/></form></td></tr>";														$msgid = 0;
													}
												}
										?>	
										
										
										</table>
									</div>
									</div>
								</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5">
					<div class="card h-100 p-3">
						<div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
							style="background-image: url('../assets/img/ivancik.jpg');">
							<span class="mask bg-gradient-dark"></span>
							<div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
								<h5 class="text-white font-weight-bolder mb-4 pt-2">Work with the rockets</h5>
								<p class="text-white">Wealth creation is an evolutionarily recent positive-sum game. It
									is all about who take the opportunity first.</p>
								<a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto"
									href="javascript:;">
									Read More
									<i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col-lg-5 mb-lg-0 mb-4">
					<div class="card z-index-2">
						<div class="card-body p-3">
							<div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
								<div class="chart">
									<canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
								</div>
							</div>
							<h6 class="ms-2 mt-4 mb-0"> Active Users </h6>
							<p class="text-sm ms-2"> (<span class="font-weight-bolder">+23%</span>) than last week </p>
							<div class="container border-radius-lg">
								<div class="row">
									<div class="col-3 py-3 ps-0">
										<div class="d-flex mb-2">
											<div
												class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
												<svg width="10px" height="10px" viewBox="0 0 40 44" version="1.1"
													xmlns="http://www.w3.org/2000/svg"
													xmlns:xlink="http://www.w3.org/1999/xlink">
													<title>document</title>
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<g transform="translate(-1870.000000, -591.000000)"
															fill="#FFFFFF" fill-rule="nonzero">
															<g transform="translate(1716.000000, 291.000000)">
																<g transform="translate(154.000000, 300.000000)">
																	<path class="color-background"
																		d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
																		opacity="0.603585379"></path>
																	<path class="color-background"
																		d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
																	</path>
																</g>
															</g>
														</g>
													</g>
												</svg>
											</div>
											<p class="text-xs mt-1 mb-0 font-weight-bold">Users</p>
										</div>
										<h4 class="font-weight-bolder">36K</h4>
										<div class="progress w-75">
											<div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60"
												aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="col-3 py-3 ps-0">
										<div class="d-flex mb-2">
											<div
												class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-info text-center me-2 d-flex align-items-center justify-content-center">
												<svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1"
													xmlns="http://www.w3.org/2000/svg"
													xmlns:xlink="http://www.w3.org/1999/xlink">
													<title>spaceship</title>
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<g transform="translate(-1720.000000, -592.000000)"
															fill="#FFFFFF" fill-rule="nonzero">
															<g transform="translate(1716.000000, 291.000000)">
																<g transform="translate(4.000000, 301.000000)">
																	<path class="color-background"
																		d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z">
																	</path>
																	<path class="color-background"
																		d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z">
																	</path>
																	<path class="color-background"
																		d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"
																		opacity="0.598539807"></path>
																	<path class="color-background"
																		d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"
																		opacity="0.598539807"></path>
																</g>
															</g>
														</g>
													</g>
												</svg>
											</div>
											<p class="text-xs mt-1 mb-0 font-weight-bold">Clicks</p>
										</div>
										<h4 class="font-weight-bolder">2m</h4>
										<div class="progress w-75">
											<div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="90"
												aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="col-3 py-3 ps-0">
										<div class="d-flex mb-2">
											<div
												class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center">
												<svg width="10px" height="10px" viewBox="0 0 43 36" version="1.1"
													xmlns="http://www.w3.org/2000/svg"
													xmlns:xlink="http://www.w3.org/1999/xlink">
													<title>credit-card</title>
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<g transform="translate(-2169.000000, -745.000000)"
															fill="#FFFFFF" fill-rule="nonzero">
															<g transform="translate(1716.000000, 291.000000)">
																<g transform="translate(453.000000, 454.000000)">
																	<path class="color-background"
																		d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
																		opacity="0.593633743"></path>
																	<path class="color-background"
																		d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
																	</path>
																</g>
															</g>
														</g>
													</g>
												</svg>
											</div>
											<p class="text-xs mt-1 mb-0 font-weight-bold">Sales</p>
										</div>
										<h4 class="font-weight-bolder">435$</h4>
										<div class="progress w-75">
											<div class="progress-bar bg-dark w-30" role="progressbar" aria-valuenow="30"
												aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
									<div class="col-3 py-3 ps-0">
										<div class="d-flex mb-2">
											<div
												class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-danger text-center me-2 d-flex align-items-center justify-content-center">
												<svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1"
													xmlns="http://www.w3.org/2000/svg"
													xmlns:xlink="http://www.w3.org/1999/xlink">
													<title>settings</title>
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<g transform="translate(-2020.000000, -442.000000)"
															fill="#FFFFFF" fill-rule="nonzero">
															<g transform="translate(1716.000000, 291.000000)">
																<g transform="translate(304.000000, 151.000000)">
																	<polygon class="color-background"
																		opacity="0.596981957"
																		points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
																	</polygon>
																	<path class="color-background"
																		d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
																		opacity="0.596981957"></path>
																	<path class="color-background"
																		d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
																	</path>
																</g>
															</g>
														</g>
													</g>
												</svg>
											</div>
											<p class="text-xs mt-1 mb-0 font-weight-bold">Items</p>
										</div>
										<h4 class="font-weight-bolder">43</h4>
										<div class="progress w-75">
											<div class="progress-bar bg-dark w-50" role="progressbar" aria-valuenow="50"
												aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="card z-index-2">
						<div class="card-header pb-0">
							<h6>Sales overview</h6>
							<p class="text-sm">
								<i class="fa fa-arrow-up text-success"></i>
								<span class="font-weight-bold">4% more</span> in 2021
							</p>
						</div>
						<div class="card-body p-3">
							<div class="chart">
								<canvas id="chart-line" class="chart-canvas" height="300"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row my-4">
				<div class="col-lg-8 col-md-6 mb-md-0 mb-4">
					<div class="card">
						<div class="card-header pb-0">
							<div class="row">
								<div class="col-lg-6 col-7">
									<h6>Projects</h6>
									<p class="text-sm mb-0">
										<i class="fa fa-check text-info" aria-hidden="true"></i>
										<span class="font-weight-bold ms-1">30 done</span> this month
									</p>
								</div>
								<div class="col-lg-6 col-5 my-auto text-end">
									<div class="dropdown float-lg-end pe-4">
										<a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
											aria-expanded="false">
											<i class="fa fa-ellipsis-v text-secondary"></i>
										</a>
										<ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
											aria-labelledby="dropdownTable">
											<li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a>
											</li>
											<li><a class="dropdown-item border-radius-md" href="javascript:;">Another
													action</a></li>
											<li><a class="dropdown-item border-radius-md" href="javascript:;">Something
													else here</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body px-0 pb-2">
							<div class="table-responsive">
								<table class="table align-items-center mb-0">
									<thead>
										<tr>
											<th
												class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
												Companies</th>
											<th
												class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
												Members</th>
											<th
												class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
												Budget</th>
											<th
												class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
												Completion</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="d-flex px-2 py-1">
													<div>
														<img src="../assets/img/small-logos/logo-xd.svg"
															class="avatar avatar-sm me-3" alt="xd">
													</div>
													<div class="d-flex flex-column justify-content-center">
														<h6 class="mb-0 text-sm">Soft UI XD Version</h6>
													</div>
												</div>
											</td>
											<td>
												<div class="avatar-group mt-2">
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Ryan Tompson">
														<img src="../assets/img/team-1.jpg" alt="team1">
													</a>
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Romina Hadid">
														<img src="../assets/img/team-2.jpg" alt="team2">
													</a>
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Alexander Smith">
														<img src="../assets/img/team-3.jpg" alt="team3">
													</a>
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Jessica Doe">
														<img src="../assets/img/team-4.jpg" alt="team4">
													</a>
												</div>
											</td>
											<td class="align-middle text-center text-sm">
												<span class="text-xs font-weight-bold"> $14,000 </span>
											</td>
											<td class="align-middle">
												<div class="progress-wrapper w-75 mx-auto">
													<div class="progress-info">
														<div class="progress-percentage">
															<span class="text-xs font-weight-bold">60%</span>
														</div>
													</div>
													<div class="progress">
														<div class="progress-bar bg-gradient-info w-60"
															role="progressbar" aria-valuenow="60" aria-valuemin="0"
															aria-valuemax="100"></div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex px-2 py-1">
													<div>
														<img src="../assets/img/small-logos/logo-atlassian.svg"
															class="avatar avatar-sm me-3" alt="atlassian">
													</div>
													<div class="d-flex flex-column justify-content-center">
														<h6 class="mb-0 text-sm">Add Progress Track</h6>
													</div>
												</div>
											</td>
											<td>
												<div class="avatar-group mt-2">
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Romina Hadid">
														<img src="../assets/img/team-2.jpg" alt="team5">
													</a>
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Jessica Doe">
														<img src="../assets/img/team-4.jpg" alt="team6">
													</a>
												</div>
											</td>
											<td class="align-middle text-center text-sm">
												<span class="text-xs font-weight-bold"> $3,000 </span>
											</td>
											<td class="align-middle">
												<div class="progress-wrapper w-75 mx-auto">
													<div class="progress-info">
														<div class="progress-percentage">
															<span class="text-xs font-weight-bold">10%</span>
														</div>
													</div>
													<div class="progress">
														<div class="progress-bar bg-gradient-info w-10"
															role="progressbar" aria-valuenow="10" aria-valuemin="0"
															aria-valuemax="100"></div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex px-2 py-1">
													<div>
														<img src="../assets/img/small-logos/logo-slack.svg"
															class="avatar avatar-sm me-3" alt="team7">
													</div>
													<div class="d-flex flex-column justify-content-center">
														<h6 class="mb-0 text-sm">Fix Platform Errors</h6>
													</div>
												</div>
											</td>
											<td>
												<div class="avatar-group mt-2">
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Romina Hadid">
														<img src="../assets/img/team-3.jpg" alt="team8">
													</a>
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Jessica Doe">
														<img src="../assets/img/team-1.jpg" alt="team9">
													</a>
												</div>
											</td>
											<td class="align-middle text-center text-sm">
												<span class="text-xs font-weight-bold"> Not set </span>
											</td>
											<td class="align-middle">
												<div class="progress-wrapper w-75 mx-auto">
													<div class="progress-info">
														<div class="progress-percentage">
															<span class="text-xs font-weight-bold">100%</span>
														</div>
													</div>
													<div class="progress">
														<div class="progress-bar bg-gradient-success w-100"
															role="progressbar" aria-valuenow="100" aria-valuemin="0"
															aria-valuemax="100"></div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex px-2 py-1">
													<div>
														<img src="../assets/img/small-logos/logo-spotify.svg"
															class="avatar avatar-sm me-3" alt="spotify">
													</div>
													<div class="d-flex flex-column justify-content-center">
														<h6 class="mb-0 text-sm">Launch our Mobile App</h6>
													</div>
												</div>
											</td>
											<td>
												<div class="avatar-group mt-2">
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Ryan Tompson">
														<img src="../assets/img/team-4.jpg" alt="user1">
													</a>
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Romina Hadid">
														<img src="../assets/img/team-3.jpg" alt="user2">
													</a>
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Alexander Smith">
														<img src="../assets/img/team-4.jpg" alt="user3">
													</a>
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Jessica Doe">
														<img src="../assets/img/team-1.jpg" alt="user4">
													</a>
												</div>
											</td>
											<td class="align-middle text-center text-sm">
												<span class="text-xs font-weight-bold"> $20,500 </span>
											</td>
											<td class="align-middle">
												<div class="progress-wrapper w-75 mx-auto">
													<div class="progress-info">
														<div class="progress-percentage">
															<span class="text-xs font-weight-bold">100%</span>
														</div>
													</div>
													<div class="progress">
														<div class="progress-bar bg-gradient-success w-100"
															role="progressbar" aria-valuenow="100" aria-valuemin="0"
															aria-valuemax="100"></div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex px-2 py-1">
													<div>
														<img src="../assets/img/small-logos/logo-jira.svg"
															class="avatar avatar-sm me-3" alt="jira">
													</div>
													<div class="d-flex flex-column justify-content-center">
														<h6 class="mb-0 text-sm">Add the New Pricing Page</h6>
													</div>
												</div>
											</td>
											<td>
												<div class="avatar-group mt-2">
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Ryan Tompson">
														<img src="../assets/img/team-4.jpg" alt="user5">
													</a>
												</div>
											</td>
											<td class="align-middle text-center text-sm">
												<span class="text-xs font-weight-bold"> $500 </span>
											</td>
											<td class="align-middle">
												<div class="progress-wrapper w-75 mx-auto">
													<div class="progress-info">
														<div class="progress-percentage">
															<span class="text-xs font-weight-bold">25%</span>
														</div>
													</div>
													<div class="progress">
														<div class="progress-bar bg-gradient-info w-25"
															role="progressbar" aria-valuenow="25" aria-valuemin="0"
															aria-valuemax="25"></div>
													</div>
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="d-flex px-2 py-1">
													<div>
														<img src="../assets/img/small-logos/logo-invision.svg"
															class="avatar avatar-sm me-3" alt="invision">
													</div>
													<div class="d-flex flex-column justify-content-center">
														<h6 class="mb-0 text-sm">Redesign New Online Shop</h6>
													</div>
												</div>
											</td>
											<td>
												<div class="avatar-group mt-2">
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Ryan Tompson">
														<img src="../assets/img/team-1.jpg" alt="user6">
													</a>
													<a href="javascript:;" class="avatar avatar-xs rounded-circle"
														data-bs-toggle="tooltip" data-bs-placement="bottom"
														title="Jessica Doe">
														<img src="../assets/img/team-4.jpg" alt="user7">
													</a>
												</div>
											</td>
											<td class="align-middle text-center text-sm">
												<span class="text-xs font-weight-bold"> $2,000 </span>
											</td>
											<td class="align-middle">
												<div class="progress-wrapper w-75 mx-auto">
													<div class="progress-info">
														<div class="progress-percentage">
															<span class="text-xs font-weight-bold">40%</span>
														</div>
													</div>
													<div class="progress">
														<div class="progress-bar bg-gradient-info w-40"
															role="progressbar" aria-valuenow="40" aria-valuemin="0"
															aria-valuemax="40"></div>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="card-header pb-0">
							<h6>Orders overview</h6>
							<p class="text-sm">
								<i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
								<span class="font-weight-bold">24%</span> this month
							</p>
						</div>
						<div class="card-body p-3">
							<div class="timeline timeline-one-side">
								<div class="timeline-block mb-3">
									<span class="timeline-step">
										<i class="ni ni-bell-55 text-success text-gradient"></i>
									</span>
									<div class="timeline-content">
										<h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
										<p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
									</div>
								</div>
								<div class="timeline-block mb-3">
									<span class="timeline-step">
										<i class="ni ni-html5 text-danger text-gradient"></i>
									</span>
									<div class="timeline-content">
										<h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
										<p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
									</div>
								</div>
								<div class="timeline-block mb-3">
									<span class="timeline-step">
										<i class="ni ni-cart text-info text-gradient"></i>
									</span>
									<div class="timeline-content">
										<h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April
										</h6>
										<p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
									</div>
								</div>
								<div class="timeline-block mb-3">
									<span class="timeline-step">
										<i class="ni ni-credit-card text-warning text-gradient"></i>
									</span>
									<div class="timeline-content">
										<h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order
											#4395133</h6>
										<p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
									</div>
								</div>
								<div class="timeline-block mb-3">
									<span class="timeline-step">
										<i class="ni ni-key-25 text-primary text-gradient"></i>
									</span>
									<div class="timeline-content">
										<h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for
											development</h6>
										<p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
									</div>
								</div>
								<div class="timeline-block">
									<span class="timeline-step">
										<i class="ni ni-money-coins text-dark text-gradient"></i>
									</span>
									<div class="timeline-content">
										<h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
										<p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
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

<li>Bienvenid@ <?php echo $_SESSION['full_name']; ?> </li>
<ul>
	<li>
		<a href="logout.php">
			Cerrar Sesión <i class="entypo-logout right"></i>
		</a>
	</li>
</ul>
