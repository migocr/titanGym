<?php
require '../../include/db_conn.php';
require '../../include/get_color.php';
page_protect();
$principalColor = getColor($con);
$_DIR = 'C:\xampp\htdocs\gym_l';

require  $_DIR . '\vendor\autoload.php' ;
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

<body class="g-sidenav-show  bg-gray-100">
  <?php $active = 'members'; include 'components/menu.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php $titlePage = 'Miembros'; include 'components/navbar.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

			
    
      <div class="row">
        <div class="card" style="box-shadow: none;">
          
            
              <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                  <h6>Lista de miembros</h6> 
                  <p>
                  Total : <?php
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
                  </p>
                </div>
                <div class="input-group">
                  <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                  <input id="buscador" type="text" class="form-control" placeholder="Buscar miembro..." onfocus="focused(this)" onfocusout="defocused(this)">
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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ultimo Pago</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Suscripcion</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Caduca</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Editar</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pagar</th>
                          </tr>
                        </thead>
                        <tbody id="membersTable">
                          <?php
                              $query  = "select * from users ORDER BY joining_date";
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
                                        <h6 class='mb-0 text-sm'>". $uid ." </h6>
                                      </td>";
                                      echo "<td> 
                                      <div class='d-flex px-2'>
                                        <h6 class='mb-0 text-sm'>". $row['username'] ." </h6>
                                      </td>";
                                      // convertimos las fechas a formato Unix
                                      $expireDate =  str_replace('-', '/', $row['dob']);
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

                                      $query2  = "select * from enrolls_to where uid = $uid order by paid_date desc limit 1";
                                      $result2 = mysqli_query($con, $query2);
                                      $lastPayment = mysqli_fetch_array($result2);
                                      $lastPaymentStr = $lastPayment ? str_replace('-', '/', date("d-m-Y", strtotime($lastPayment['paid_date']))) : "NA";
                                      
                                    
                                    
                                              
                                      echo "<td><p class='text-sm font-weight-bold mb-0'> $lastPaymentStr</p></td>";
                                      echo "<td class='text-center'><span class='badge badge-sm ${statusClass}'>$statusString</span></td>";

                                      echo "<td class='text-center'><p class='text-sm font-weight-bold mb-0'>" . str_replace('-', '/', date("d-m-Y", strtotime($row['dob']))) . "</p></td>";

                                            

                                              
                                              
                                              $sno++;
                                              echo "<td class='text-center'><form action='edit_member.php' method='post'>
                                                    
                                                    <button type='submit' style='border: 0; background: none;'>
                                                      <i class='fa-solid fa-pen-to-square'></i>
                                                    </button>
                                                    
                                                    <input type='hidden' name='name' value='" . $uid . "'/>
                                                    </form></td>";
                                          echo "<td class='text-center'><form action='make_payments.php' method='post'>
                                                    
                                                    <button type='submit' style='border: 0; background: none;'>
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
      
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
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
<script>
  var originalUserData;
  const userData = document.querySelectorAll("#membersTable tr");
  if (!originalUserData) {
    originalUserData = userData;
  }
  
  const search = document.querySelector("#buscador");
  search.addEventListener("keyup", function(event) {
    var temporalUserData = originalUserData;
    searchInTable(temporalUserData)
  });

  function searchInTable(temporalUserData) {
    console.log(temporalUserData)
      for (let index = 0; index < temporalUserData.length; index++) {
      let user = temporalUserData[index];
      let rawData = user.getAttribute("json-data");
      let jsonData = JSON.parse(rawData);
      //console.log(jsonData)
      let searchInput = document.getElementById("buscador").value;
      //console.log(searchInput)
      if(jsonData[0].username.toLowerCase().includes(searchInput.toLowerCase()) || jsonData[0].userid.includes(searchInput)) {
         user.style.display = "table-row";
      } else {
        user.style.display = "none";
      }
            
    }
  }

	
	function ConfirmDelete(name){
	
    var r = confirm("Are you sure! You want to Delete this User?");
    if (r == true) {
       return true;
    } else {
        return false;
    }
  }

</script>


