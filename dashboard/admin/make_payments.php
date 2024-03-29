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
if (isset($_POST['userID'])) {
    $uid  = $_POST['userID'];
} else {
  $uid  = $_GET['userID'];
}
  
$query1 = "select * from users WHERE userid='$uid'";
      
$result1 = mysqli_query($con, $query1);
      
if (mysqli_affected_rows($con) == 1) {
  while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
             
  $name = $row1['username'];
           
  $query = "SELECT * FROM enrolls_to WHERE uid = '$uid'";
  $result = mysqli_query($con, $query);
  
  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $lastExpireDate = 0;
    while($row = mysqli_fetch_assoc($result)) {
    //echo "expire: " . $row["expire"]. "<br>";
      $expireDate = strtotime($row["expire"]);
      if($lastExpireDate == 0 || $expireDate > $lastExpireDate) {
        $lastExpireDate = $expireDate;
      }
                      
    }
  $expDate = date('Y-m-d', $lastExpireDate);
                  //echo $expDate;
  } else {
    //echo "0 results";
    $expDate = date('Y-m-d');
  }
}
}
    
    
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
  <script src="../assets/js/sweetalert.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/all-min.css"  />

  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="../assets/js/kit-font-awesome.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
  <!-- Core -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>

  <!-- Theme JS -->
  <script src="../assets/js/soft-ui-dashboard.min.js"></script>
</head>

<body class="g-sidenav-show " style="<?php echo "background:$backgroundColor !important;"?>">
	<?php include 'components/spiner.php'; ?>	
	<?php $active = 'payment'; include 'components/menu.php'; ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php $titlePage = 'Pagos'; include 'components/navbar.php'; ?>
    <!-- End Navbar -->
    <div class="container-fluid py-4">      
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0" style="border-radius:10px;!important">
              <h6><i class="fa-solid fa-hand-holding-dollar"></i> Registrar pago</h6>
              <div class="card-body px-0 pt-0 pb-2">
              <div class="">
                <form id="form1" name="form1">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                              <label for="example-text-input" class="form-control-label">ID de Miembro</label>
                              <input  class="form-control" type="text" name="m_id" id="idMembresia" value="<?php echo $uid; ?>" readonly/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nombre</label>
                            <input class="form-control" type="text" name="u_name" id="nameCustomer" value="<?php echo $name; ?>" placeholder="Member Name" maxlength="30" readonly/>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="example-color-input" class="form-control-label">Plan</label>	
                        <select style="width: 100%; border: 1px #e9ecef solid; border-radius: 5px;
                                  padding: 5px;" class="selectpicker" data-style="select-with-transition" 
                                  name="plan" id="planSelector" 
                                  onchange="changeExpireDate(this.value,this.options[this.selectedIndex].getAttribute('duration'),this.options[this.selectedIndex].getAttribute('durationtype'))" required>
                          <option value="">-- Favor Seleccionar --</option>
                            <?php
                    
                              $query = "select * from plan where active='yes'";
                                  
                                  //echo $query;
                              $result = mysqli_query($con, $query);
                                  
                              if (mysqli_affected_rows($con) != 0) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                  echo "<option value=" . $row['pid'] . " duration=".$row['validity']. " durationtype=".$row['planType']. ">" . $row['planName'] . "</option>";				
                                }
                              }
                                  
                            ?>
                              </select>
                        </div>
                      </div>
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-date-input" class="form-control-label">Fecha Inicio</label>
                        <input id="start-date" class="form-control" type="date" value='<?php 
                        //echo $expDate; 
                        date_default_timezone_set('America/Mazatlan'); 
                        $hoy = date('Y-m-d');
                        
                        if ($expDate <= $hoy) {
                            echo $hoy;
                        } else {
                            echo $expDate;
                        }
                        ?>'
                        name="startdate" required>
                        
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-date-input" class="form-control-label">Fecha Fin</label>
                        <input id="expire-date" class="form-control" type="date" value=''
                          name="dob" id="expire-date" required>
                          
                      </div>
                    </div>
                  </div>
                  
                 
                 
                  
                </form>
                <div id="plandetls" class="row"></div>
                <div style="display: flex;justify-content: center;">
                  <button  style="margin-right: 10px; background: <?php echo $principalColor; ?>;" class="btn btn-primary btn-sm" onclick="savePayment()" name="submit" id="submit" >Guardar</button>
                  <input class="btn btn-secondary btn-sm" type="reset" name="reset" id="reset" value="Borrar"></td>
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
  <script src="../assets/js/moment.js"></script>

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
<script>
  function changeExpireDate(str, duration, durationType) {
      console.log(str);
      if (str == "") {
          document.getElementById("plandetls").innerHTML = "";
          return;
      } else {
          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          }
          xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("plandetls").innerHTML = this.responseText;

              }
          };

          xmlhttp.open("GET", "plandetail.php?q=" + str, true);
          xmlhttp.send();
      }

      var expireDateInput = document.getElementById("expire-date");
      console.log(expireDateInput.value)
      var expireQty = parseInt(duration); //cantidad de dias o meses
      var inputStartDate = document.getElementById("start-date").value; //input fecha inicial
      console.log("inputStartDate ", inputStartDate);
      console.log(expireQty);
      //let date = new Date(inputStartDate);
      var parts = inputStartDate.split('-');
      // Please pay attention to the month (parts[1]); JavaScript counts months from 0:
      // January - 0, February - 1, etc.
      var date = new Date(parts[0], parts[1] - 1, parts[2]);
      if (durationType == "m") { // si es un plan con meses
          var expireDate = date.setMonth(date.getMonth() + expireQty);

      }
      if (durationType == "d") { // si es un plan con dias
          var expireDate = date.setDate(date.getDate() + expireQty);
      }
      console.log("expire date: ", expireDate)
      let formatedDate = `${new Date(expireDate).getFullYear()}-${new Date(expireDate).getMonth()+1 > 9 ? new Date(expireDate).getMonth()+1 : '0' + (new Date(expireDate).getMonth()+1)}-${new Date(expireDate).getDate() > 9 ? new Date(expireDate).getDate() : '0'+new Date(expireDate).getDate()}`
      expireDateInput.value = formatedDate;
      expireDateInput.setAttribute("value", formatedDate);

  }
</script>
<script>
  document.getElementById('start-date').addEventListener('change', function() {
    console.log("si")
    if (planSelector.value && validityPlan) {
      let validity = parseInt(validityPlan.getAttribute("validity")) ;
      let planType = validityPlan.getAttribute("planType");
      let startDate = document.getElementById("start-date").value;
      if (planType == "m") {
        // Creamos una fecha
       
        var expireDate = new Date(startDate.split("-"));
        // Sumamos la cantidad de meses que deseamos
        //expireDate.setMonth(expireDate.getMonth() + validity);
        // Obtenemos la fecha resultante
       // var newDate = expireDate.getDate() + '/' + (expireDate.getMonth() + 1) + '/' + expireDate.getFullYear();
        console.log(expireDate)
        let _expireDate =  expireDate.getFullYear()  + "-"  + ("0" + (expireDate.getMonth() + 1 + validity)).slice(-2)  + "-" + (expireDate.getDate() < 10 ? '0' + expireDate.getDate() : expireDate.getDate() );
        document.getElementById("expire-date").value = _expireDate;
      }
    }
  });
    async function savePayment() {
        document.querySelector('.full-screen-spinner').style.display = 'flex';
        let formData = new FormData();
        let id = document.getElementById("idMembresia").value;
        let plan = document.getElementById("planSelector").value;
        let startDate = document.getElementById("start-date").value;
        if (!plan || plan == "" || plan == undefined) {
            swal("Selecciona un Plan", "Por favor selecciona un plan antes de guardar", "warning");
            return;
        }

        let dob = document.getElementById("expire-date").value;
        console.log(id, "-", plan, "-", dob)
        formData.append('m_id', id);
        formData.append('plan', plan);
        formData.append('dob', dob);
        formData.append('startdate', startDate);


        const url = "./submit_payments.php";
        const XHR = new XMLHttpRequest();
        // Define what happens on successful data submission
        await XHR.addEventListener('load', (event) => {
            console.log(event);
            console.log(XHR.responseText);
            var response = JSON.parse(JSON.parse(XHR.responseText));
            //  JSON.parse(response, true);
            console.log(response)
            if (response.status) {
                swal({
                    icon: "success",
                    text: "Pago Guardado",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true,
                }).then(function() {
                    window.location = './view_member.php?id=' + id;
                });
            } else {
                swal({
                    icon: "error",
                    text: "Error al guardar",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true,
                })
            }


        });

        // Define what happens in case of an error
        XHR.addEventListener('error', (event) => {
            swal("Error", "Ocurrio un error al intentar guardar el pago", "error");
        });

        // Set up our request
        await XHR.open('POST', url);

        // Send our FormData object; HTTP headers are set automatically
        await XHR.send(formData);
    }
</script>
</body>

</html>


 		


