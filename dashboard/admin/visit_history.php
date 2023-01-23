<?php
	require '../../include/db_conn.php';

  date_default_timezone_set('America/Mazatlan');
  setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
	page_protect();
	$principalColor = $_SESSION['principalColor'];
	$backgroundColor =  $_SESSION['backgroundColor'];
  $_DIR = dirname(dirname(dirname(__FILE__)));

  require  $_DIR . '/vendor/autoload.php' ;
  $dotenv = Dotenv\Dotenv::createImmutable($_DIR);
  $dotenv->load(); 

  setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
  $query  = "SELECT * FROM bitacora WHERE datetime BETWEEN CURDATE() AND NOW() ORDER BY id DESC";                      //echo $query;
  $result = mysqli_query($con, $query);
  $num_rows = mysqli_num_rows($result);
  
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
    <?php echo $_SESSION['siteTitle']; ?>
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
  <?php $active = 'history'; include 'components/menu.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php $titlePage = 'Pagos'; include 'components/navbar.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

      <div class="">
        <div class="card" style="box-shadow: none;">
          <div class="card-header pb-0">
            <div class="m-auto">
              <h6 class="m-auto">Historial de visitas</h6>
              <p id="totalCount" class="text-sm">Total: <?php echo $num_rows;?></p>
              
            </div>
           
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1" role="tablist">
                  <li class="nav-item menu-switcher"  period="today">
                    <a period="today" class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#profile-tabs-simple" role="tab" aria-controls="profile" aria-selected="true">
                    Hoy
                    </a>
                  </li>
                  <li class="nav-item menu-switcher"  period="yesterday">
                    <a period="yesterday" class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard" aria-selected="false">
                    Ayer
                    </a>
                  </li>
                  <li class="nav-item menu-switcher"  period="week">
                    <a period="week" class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard" aria-selected="false">
                    Esta Semana
                    </a>
                  </li>
                  <li  class="nav-item menu-switcher" period="month">
                    <a period="month" class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard" aria-selected="false">
                    Este mes
                    </a>
                  </li>
                  <li class="nav-item menu-switcher" period="custom">
                    <a period="custom" class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-simple" role="tab" aria-controls="dashboard" aria-selected="false">
                    Personalizado
                    </a>
                  </li>
                </ul>
            </div>
            
          </div>
          <div class="card-body p-3">
            <div class="row">
              <div class="col-12">
                <div class="table-responsive p-0">
                  <table class="table align-items-center mb-0">
                    <thead>
                      <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Hora</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Fecha</th>
                        <th  class="text-uppercase text-secondary text-xs font-weight-bolder d-none">ID</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Nombre</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">ID de Usuario</th>
                        
                       
                        
                        
                       
                      </tr>
                    </thead>
                    <tbody id="membersTable">
                    <?php

                     
                      $count=0;
                      while ($row = mysqli_fetch_assoc($result)) {
                        $count++;
                        $uid   = $row['uid'];
                        $dateTime   = $row['datetime'];
                        echo "<tr json-data=''>";
                        $query2  = "select * from users where userid = $uid limit 1";
                        $result2 = mysqli_query($con, $query2);
                        $user = mysqli_fetch_array($result2);
                        $userName = $user['username'];

                             
                        echo "<td>
                          <div class='d-flex px-3'>
                            <p class='mb-0 text-sm'>".date('H:i', strtotime($dateTime))."</p>
                          </div>
                        </td>";
                        echo "<td>
                          <div class='d-flex px-3'>
                            <p class='mb-0 text-sm'>".strftime('%d %B %Y', strtotime($dateTime))."</p>
                          </div>
                        </td>";
                        echo "<td>
                        <div class='d-flex px-3'>
                          <p class='mb-0 text-sm'>$userName</p>
                        </div>
                      </td>";
                          echo "<td>
                                  <div class='d-flex px-3'>
                                    <p class='mb-0 text-sm '>$uid</p>
                                  </div>
                                </td>";
                         
                          setlocale(LC_TIME, 'es_ES'); 
                         
                          
                      }

                      mysqli_close($con);
                    
                        
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
  var elements = document.querySelectorAll(".menu-switcher");
  elements.forEach(function(element){
    element.addEventListener("click", function(event){
      var period = event.target.getAttribute('period');
      console.log(period);
      getData(period)
    });
  });
    function getData(period) {
      fetch(`./scripts/find_visits.php?period=${period}`, {
					method: 'GET',
					headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				},
				}).then(function (response) {
					console.log(response);
					return response.json();
				}).then(function (data) {
					console.log(data)
					
					if(data.status) {
            let tableContent = "";
            let userData = JSON.parse(data.userData);
            totalCount.innerText= "Total: " + userData.length;
            for (let index = 0; index < userData.length; index++) {
              if(index === 0) {
                tableContent = tableContent + "";
              }
              const element = userData[index];
              //console.log(element)
              var d = new Date(element.datetime);
              var day = d.getDate();
              var month = d.toLocaleString('default', { month: 'long' });
              var year = d.getFullYear();
              var hours = d.getHours();
              var minutes = d.getMinutes();
              var seconds = d.getSeconds();
              var stringDate = day + " de " + month + " de " + year;
              var stringTime = hours + ":" + minutes + ":" + seconds;
              tableContent = tableContent +  `<tr json-data=''><td>
                          <div class="d-flex px-3">
                            <p class="mb-0 text-sm">${stringTime}</p>
                          </div>
                        </td>
                        <td>
                          <div class="d-flex px-3">
                            <p class="mb-0 text-sm">${stringDate}</p>
                          </div>
                        </td>
                        <td>
                                  <div class="d-flex px-3">
                                    <p class="mb-0 text-sm ">${element.uid}</p>
                                  </div>
                                </td>
                                <td>
                                  <div class="d-flex px-3">
                                    <p class="mb-0 text-sm">Prueba</p>
                                  </div>
                                </td></tr>`
         
            
            
              
            }
             
              document.getElementById("membersTable").innerHTML = tableContent;
            /* 
						swal("Visita registrada de "+ name, {
							icon: "success",
						}).then((value) => {window.location.reload()});
					} else {
						swal("No se pudo registrar visita de usuario ", {
							icon: "error",
						});*/
					}
				// aquí manejas la respuesta
				});
    }

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