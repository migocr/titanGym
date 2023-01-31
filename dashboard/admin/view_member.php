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

if (isset($_GET['id'])) {
    $memid = $_GET['id'];
	$ceros = 4 - strlen($memid);

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
	<?php include 'components/spiner.php'; ?>	
	<?php $active = 'members'; include 'components/menu.php'; ?>
	<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ps ">
		<!-- Navbar -->
		<?php $titlePage = 'Miembro'; include 'components/navbar.php'; ?>
		<!-- End Navbar -->
		<div class="container-fluid py-4">
		
			<div class="row ">
				<div class="col-lg-12 col-md-6 mb-md-0 mb-4">
					<div class="card">
						<div class="card-header pb-0">
							
							<div style="display: flex; justify-content: space-between;">
								<h6>Informacion de Usuario</h6>
														
								<form action='edit_member.php' method='post'>
									<button type='submit' style='border: 0; background: none;'>
										<span>Editar <i class="fa-solid fa-user-pen"></i> </span>
									</button>
									
									<input type='hidden' name='name' value='<?php echo str_repeat("0", $ceros).$memid;?>'/>
								</form>
							</div>
							<div class="row">
								<?php
	    
									$query  = "SELECT * FROM users WHERE userid='$memid'";
									//echo $query;
									$result = mysqli_query($con, $query);
									$sno    = 1;
									
									$name="";
									$gender="";

									if (mysqli_affected_rows($con) == 1) {
										while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
											$uid    = $row['userid'];
											
											$name    = $row['username'];
											$gender =$row['gender'];
											$dob	 = $row['dob'];         
											$jdate    = $row['joining_date'];
											$phone    = $row['phone'];
											
											$query1  = "SELECT enrolls_to.pid, enrolls_to.amount, enrolls_to.et_id, enrolls_to.paid_date, enrolls_to.startDate, enrolls_to.expire, plan.planName FROM enrolls_to INNER JOIN plan ON enrolls_to.pid = plan.pid WHERE enrolls_to.uid = '$uid' AND enrolls_to.pid = plan.pid ORDER BY enrolls_to.et_id DESC ";
											$result1 = mysqli_query($con, $query1);
											if (mysqli_num_rows($result) > 0) {
												$dataPayments = array();
												$enablePaymentTab = false;
												while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
													
													$payment= $row1;
													//echo $row1["uid"];
													//echo json_encode($dataPayments) ;
													array_push($dataPayments, $payment);
													$enablePaymentTab = true;

													
												}
												
												
											}
										}
									} else{
										echo "<html><head><script>alert('Cambio Insatisfactorio');</script></head></html>";
										echo mysqli_error($con);
									}


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
														<div class="col-md-2">
															<div class="form-group">
																<label for="example-text-input" class="form-control-label">ID de Usuario</label>
																<input class="form-control"  id="boxxe" type="text" name="uid" value="<?php echo str_repeat("0", $ceros).$memid;?>" readonly required />
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="example-search-input" class="form-control-label">Nombre</label>
																<input class="form-control" type="text" placeholder="Nombre del nuevo miembro" 
																name="uname" id="boxxe" value="<?php echo $name?>" readonly>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label for="example-email-input" class="form-control-label">Genero</label>
																<input type="text" class="form-control" value="<?php echo $gender?>" readonly>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label for="example-tel-input" class="form-control-label">Telefono</label>
																<input class="form-control" type="tel" name="phone" placeholder="Numero a 10 digitos" value='<?php echo $phone ?>' id="example-tel-input" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label for="example-tel-input" class="form-control-label">Fecha de registro</label>
																<input class="form-control" type="tel" name="phone" placeholder="Numero a 10 digitos" value='<?php echo $jdate ?>' id="example-tel-input" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
															</div>
														</div>
													</div>														
													
													
																	
													
													
												</form>
												
												<div style="display: flex; justify-content: space-between;">
													<h6>Historial de Pagos</h6>
																			
													<form action='make_payments.php' method='post' style="cursor:pointer;">
														<button type='submit' style='border: 0; background: none;'>
															<span>Pagar <i class="fa-solid fa-money-check-dollar"></i> </span>
														</button>
														
														<input type='hidden' name='userID'  value='<?php echo $memid?>'/>
													</form>
												</div>
												
												<div class="card" style="">
													<div class="table-responsive <?php echo $enablePaymentTab ? '' : 'd-none'; ?>">
														<table class="table align-items-center mb-0">
														<thead>
															<tr>
															<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">ID</th>
															<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Fecha de Pago</th>
															<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Comienza</th>
															<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Finaliza</th>
															<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Membresia</th>
															<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Pago</th>
															<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Status</th>
	
														</tr>
														</thead>
														<tbody>
															<?php 
															//echo json_encode($dataPayments);
																foreach($dataPayments as $dataPayment) {
																	//echo $dataPayment;
																	
																	$_pid =  $dataPayment['pid'];
																	$paymentId =  $dataPayment['et_id'];
																	$payDate =  $dataPayment['paid_date'];
																	$planStart =  $dataPayment['startDate'];
																	$planEnd =  $dataPayment['expire'];
																	$planName =  $dataPayment['planName'];
																	$amount =  $dataPayment['amount'];
																	
																	$today = date('Y/m/d');
																	$timestamp1 = strtotime($planEnd);
																	$timestamp2 = strtotime($today);
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
																	echo "<tr>
																			<td>
																				<p class='text-center text-xs font-weight-bold mb-0'>$paymentId </p>
																			</td>
																			
																			<td>
																				<p class='text-center text-xs font-weight-bold mb-0'>$payDate </p>
																			</td>
																			<td>
																				<p class='text-center text-xs font-weight-bold mb-0'>$planStart </p>
																			</td>
																			<td>
																				<p class='text-center text-xs font-weight-bold mb-0'>$planEnd </p>
																			</td>
																			<td>
																				<p class='text-center text-xs font-weight-bold mb-0'>$planName </p>
																			</td>
																			<td>
																				<p class='text-center text-xs font-weight-bold mb-0'>$amount </p>
																			</td>
																			<td class='text-center'>
																				<span class='badge badge-sm w-100 $statusClass'>$statusString</span>
																			</td>
																		</tr>
																	";
																}
															?>
															
														</tbody>
														</table>
													</div>
													<div class="<?php echo $enablePaymentTab ? 'd-none' : ''; ?>">
														<p>No hay pagos registrados de este cliente aun</p>
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




<?php
} else {
    
}
?>