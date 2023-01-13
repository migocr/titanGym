
<?php
require '../../include/db_conn.php';
page_protect();
$principalColor = $_SESSION['principalColor'];
$backgroundColor =  $_SESSION['backgroundColor'];
?>
<?php
$_DIR = dirname(dirname(dirname(__FILE__)));
require  $_DIR . '\vendor\autoload.php' ;
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
    Soft UI Dashboard by Creative Tim
  </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

<body class="g-sidenav-show  bg-gray-100" style="<?php echo "background:$backgroundColor !important;"?>">
  <?php $active = 'memberships'; include 'components/menu.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php $titlePage = 'Membresias'; include 'components/navbar.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Lista de membresias</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
					<thead>
						<tr class='text-center'>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID de Membresia</th>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre de Membresia</th>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detalles de Membresia</th>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Duracion</th>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Costo</th>
							<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opciones</th>
						</tr>
					</thead>		
					<tbody>
						<?php
							$query  = "select * from plan where active='yes' ORDER BY amount DESC";
							//echo $query;
							$result = mysqli_query($con, $query);
							$sno    = 1;

							if (mysqli_affected_rows($con) != 0) {
								while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
									$msgid = $row['pid'];
                  $planTimeType;
                  if($row['validity'] > 1) {
                    $planTimeType = $row['planType'] == "d" ? "dias" : "meses";
                  } else {
                    $planTimeType = $row['planType'] == "d" ? "dia" : "mes";
                  }
									                       
									echo "<tr ><td><div class='my-auto'><h6 class='mb-0 text-sm text-center'>" . $sno . "</h6></div></td>";
									echo "<td><p class='text-sm font-weight-bold mb-0 text-center'>" . $row['pid'] . "</p></td>";
									echo "<td><p class='text-sm font-weight-bold mb-0 text-center'>" . $row['planName'] . "</p></td>";
									echo "<td><p class='text-sm font-weight-bold mb-0 text-center'>" . $row['description'] . "</p></td>";
									echo "<td><p class='text-sm font-weight-bold mb-0 text-center'>" . $row['validity'] . " " . $planTimeType . "</p></td>";
									echo "<td><p class='text-sm font-weight-bold mb-0 text-center'>$" . $row['amount'] . "</p></td>";

									$sno++;

									echo '<td class="d-flex justify-content-evenly"><a href=edit_plan.php?id="'.$row['pid'].'"><i class="fa-solid fa-pen-to-square"></i></a><form action="del_plan.php" method="post" onSubmit="return ConfirmDelete();"><input type="hidden" name="name" value="' . $msgid .'"/><button class="px-0 py-0" style="background: transparent; border: none;" type="submit"><i class="fa-solid fa-trash"></i></button></form></td></tr>';
									
									$msgid = 0;
								}
										
							}
						?>																
					</tbody>
				</table>
              </div>
			   <a href="new_plan.php">
			  	<button style="background-image: <?php echo $principalColor ?>;" type="button" class="btn btn-primary center text-center d-block m-auto">Agregar Membresia</button>
				</a>
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
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

</html>



				
