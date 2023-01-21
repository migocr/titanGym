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
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="../assets/css/all-min.css"  />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="../assets/js/kit-font-awesome.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="../assets/js/moment.js"></script>

  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100" style="<?php echo "background:$backgroundColor !important;"?>">
  <?php $active = 'payment'; include 'components/menu.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php $titlePage = 'Pagos'; include 'components/navbar.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

      <div class="row">
        <div class="card" style="box-shadow: none;">
          <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
              <h6>Lista de miembros</h6>
              <p>
                Total : 4</p>
            </div>
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input id="buscador" type="text" class="form-control" placeholder="Buscar pago por nombre o id..."
                onfocus="focused(this)" onfocusout="defocused(this)">
            </div>
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-12">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha de pago</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Inicio de Suscripcion</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fin de suscripcion</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Plan
                        </th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          Status</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                          Detalles</th>
                       
                      </tr>
                    </thead>
                    <tbody id="membersTable">
                    <?php


                      $query  = "select * from enrolls_to ORDER BY et_id DESC";
                      //echo $query;
                      $result = mysqli_query($con, $query);
                      $sno    = 1;

                      if (mysqli_affected_rows($con) != 0) {
                          while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                              $uid   = $row['uid'];
                              $planid=$row['pid'];
                              $etId = $row['et_id'];
                              setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                              $_paidDate = date("Y-m-d", strtotime($row['paid_date']));
                              $paidDate= strftime('%d %b %Y', strtotime($_paidDate));
                              $_expireDateString = date("Y-m-d", strtotime($row['expire']));
                              $_startDateString = date("Y-m-d",strtotime($row['startDate']));
                              $expireDateString= strftime('%d %b %Y', strtotime($_expireDateString));
                              $startDateString =  strftime('%d %b %Y', strtotime($_startDateString));                            
                             
                              echo "<tr json-data=''>";
                              $query2  = "select * from users where userid = $uid limit 1";
                              $result2 = mysqli_query($con, $query2);
                              $user = mysqli_fetch_array($result2);
                              $userName = $user['username'];

                              $query3  = "select * from plan where pid = '$planid' limit 1";
                              $result3 = mysqli_query($con, $query3);
                              $planData = mysqli_fetch_array($result3);
                              $planName = $planData['planName'];

                              // convertimos las fechas a formato Unix
                              $expireDate =  $row['expire'];
                              $today = date('Y/m/d');
                              //$my_date = date('d/m/Y', strtotime($date));
                                  
                              $now = strtotime($today);

                              $timestamp1 = strtotime($expireDate);
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

                              echo "<td>
                                  <div class='d-flex px-2'>
                                    <h6 class='mb-0 text-sm'>$etId</h6>
                                  </div>
                                </td>";
                              echo "<td>
                                  <div class='d-flex px-2'>
                                    <h6 class='mb-0 text-sm'>$userName</h6>
                                  </div>
                                </td>";
                                echo "<td>
                                  <div class='d-flex px-2'>
                                    <h6 class='mb-0 text-sm'>$paidDate</h6>
                                  </div>
                                </td>";
                                echo "<td>
                                  <div class='d-flex px-2'>
                                    <h6 class='mb-0 text-sm'>$startDateString</h6>
                                  </div>
                                </td>";
                                echo "<td>
                                  <div class='d-flex px-2'>
                                    <h6 class='mb-0 text-sm'>$expireDateString</h6>
                                  </div>
                                </td>";
                                echo "<td>
                                  <div class='d-flex px-2'>
                                    <h6 class='mb-0 text-sm'>$planName</h6>
                                  </div>
                                </td>";
                                echo "<td class='text-center'>
                                <span class='w-100 badge badge-sm $statusClass'>$statusString</span>
                                 
                                </td>";
                                echo "<td class='text-center'>
                                <span style='max-width: 90px;' class='w-100 badge badge-sm'><i style='color:black;' class='fa-solid fa-arrow-up-right-from-square'></i></span>
                                 
                                </td>";
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
  <script async defer src="../assets/js/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

</html>