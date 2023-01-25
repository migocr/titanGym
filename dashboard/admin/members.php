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
  <link rel="stylesheet" href="../assets/css/all-min.css"  />

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

<body class="g-sidenav-show " style="<?php echo "background:$backgroundColor !important;"?>">
  <?php $active = 'member-list'; include 'components/menu.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php $titlePage = 'Miembros'; include 'components/navbar.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">

			
    
      <div class="">
        <div class="card" style="box-shadow: none;">
          
            
              <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                  
                  <div class="">
                    <div class="d-flex align-items-center">
                      <i style="padding-right: 5px;" class="fa-solid fa-list pr-2"></i>
                      <h6 class="p-0 m-0">Lista de Miembros</h6> 
                    </div>
                    
                    <p class="text-xs">
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
                  <a href="./nuevo_miembro.php">
                    <buttons style="background: <?php echo $principalColor ?>;" class="btn bg-gradient-primary"><i class="fa-solid fa-user-plus"></i> Agregar Miembro</button>
                  </a>
                  
                </div>
                
                <div class="input-group">
                  <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                  <input id="buscador" type="text" class="form-control" placeholder="Buscar miembro..." onfocus="focused(this)" onfocusout="defocused(this)">
                </div>
                
                
                
              </div>
              <hr class="px-0 py-0 mb-1 mt-3" style="background: #00000099;">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-12">
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead>
                          <tr>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder">ID</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder px-3">Nombre</th>
                            <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">Ultimo Pago</th>
                            <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder">Suscripcion</th>
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
                              $query  = "select * from users ORDER BY userid DESC";
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
                                      // convertimos las fechas a formato Unix
                                      $expireDate = $row['dob'] ?  str_replace('-', '/', $row['dob']) : false;
                                      $today = date('Y/m/d');
                                      //$my_date = date('d/m/Y', strtotime($date));

                                      $now = strtotime($today);

                                      $timestamp1 = $expireDate ? strtotime($expireDate) : strtotime($today);
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
                                      setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                                      if( $lastPayment){
                                        $_lastPaymentStr =  $lastPayment ? date("Y-m-d",strtotime($lastPayment['paid_date'])) : '';
                                        $lastPaymentStr= strftime('%d %b %Y', strtotime($_lastPaymentStr));
                                      } else {
                                        $lastPaymentStr = "No hay pagos registrados";
                                      }
                                     
                                      
                                      $_userExpire = $row['dob'] && $expireDate ? date("Y-m-d",strtotime($row['dob'])) : '';
                                      
                                      $userExpire= $expireDate ? strftime('%d %b %Y',  strtotime($row['dob'])) : "No hay registro";
                                      
                                      
                                    
                                    
                                              
                                      echo "<td><p class='text-sm  mb-0'> $lastPaymentStr</p></td>";
                                      echo "<td class='text-center'><span style='max-width:85px;' class='w-100 badge badge-sm ${statusClass}'>$statusString</span></td>";

                                      echo "<td class='text-center'><p class='text-sm  mb-0'>" . $userExpire . "</p></td>";

                                            

                                              
                                              
                                              $sno++;
                                              echo "<td class='text-center d-flex' style='justify-content: space-evenly;'><form action='edit_member.php' method='post'>
                                                    
                                                    <button type='submit' style='border: 0; background: none;transform: scale(1.3); filter: opacity(0.7);'>
                                                      <i class='fa-solid fa-pen-to-square'></i>
                                                    </button>
                                                    
                                                    <input type='hidden' name='name' value='" . $uid . "'/>
                                                    </form>";
                                                    echo "
                                                    <button style='border: 0; background: none;  transform: scale(1.2);'>
                                                    <a href='view_member.php?id=$uid' style=''><i class='fa-solid fa-arrow-up-right-from-square'></i></a>

                                                    </button>
                                                    
                                                    
                                                  ";
                                          echo "<form action='make_payments.php' method='post'>
                                                    
                                                    <button type='submit' style='border: 0; background: none; transform: scale(1.2); filter: opacity(0.7);'>
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


