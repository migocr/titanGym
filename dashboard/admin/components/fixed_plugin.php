<div class="fixed-plugin">
		<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
			<i class="fa fa-cog py-2"> </i>
		</a>
		<div class="card shadow-lg ">
			<div class="card-header pb-0 pt-3 ">
				<div class="float-start">
					<h5 class="mt-3 mb-0"> <php ?> </php> Configuracion</h5>
					<p>Personalizar aspecto</p>
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
					<h6 class="mb-0">Color de iconos</h6>
				</div>
				<a href="javascript:void(0)" class="switch-trigger background-color">
					<div class="badge-colors my-2 text-start">
						
						<span class="badge filter bg-gradient-dark  <?php echo $principalColor == "linear-gradient(310deg, #141727 0%, #3A416F 100%);" ? 'active' : ''; ?>" data-attr="color" data-color="linear-gradient(310deg, #141727 0%, #3A416F 100%)"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-info  <?php echo $principalColor == "linear-gradient(310deg, #2152ff 0%, #21d4fd 100%);" ? 'active' : ''; ?>" data-attr="color" data-color="linear-gradient(310deg, #2152ff 0%, #21d4fd 100%)"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-success  <?php echo $principalColor == "linear-gradient(310deg, #17ad37 0%, #7ea151 100%);" ? 'active' : ''; ?>" data-attr="color" data-color="linear-gradient(310deg, #17ad37 0%, #7ea151 100%)"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-warning  <?php echo $principalColor == "linear-gradient(310deg, #f53939 0%, #fbcf33 100%)" ? 'active' : ''; ?>" data-attr="color" data-color="linear-gradient(310deg, #f53939 0%, #fbcf33 100%)"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-danger  <?php echo $principalColor == "linear-gradient(310deg, #ea0606 0%, #ff667c 100%);" ? 'active' : ''; ?>" data-attr="color" data-color="linear-gradient(310deg, #ea0606 0%, #ff667c 100%)"
							onclick="sidebarColorCustom(this)"></span>

						<span class="badge filter bg-gradient-primary <?php echo $principalColor == "linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);" ? 'active' : ''; ?>" style="background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);" data-attr="color" data-color="linear-gradient(160deg, #0093E9 0%, #80D0C7 100%)"
							onclick="sidebarColorCustom(this)"></span>
					
						<span class="badge filter bg-gradient-info <?php echo $principalColor == "linear-gradient( 83.2deg,  rgba(150,93,233,1) 10.8%, rgba(99,88,238,1) 94.3% );" ? 'active' : ''; ?>" style="background-image:  linear-gradient( 83.2deg,  rgba(150,93,233,1) 10.8%, rgba(99,88,238,1) 94.3% );" data-attr="color" data-color="linear-gradient( 83.2deg,  rgba(150,93,233,1) 10.8%, rgba(99,88,238,1) 94.3% )"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-success <?php echo $principalColor == "linear-gradient( 179.6deg,  rgba(0,19,26,1) -4.9%, rgba(0,77,105,1) 108.4% );" ? 'active' : ''; ?>" style="background-image:  linear-gradient( 179.6deg,  rgba(0,19,26,1) -4.9%, rgba(0,77,105,1) 108.4% );" data-attr="color" data-color="linear-gradient( 179.6deg,  rgba(0,19,26,1) -4.9%, rgba(0,77,105,1) 108.4% )"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-warning <?php echo $principalColor == "radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,0,0,1) 0%, rgba(0,0,0,1) 90% );" ? 'active' : ''; ?>" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,0,0,1) 0%, rgba(0,0,0,1) 90% );;" data-attr="color" data-color="radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,0,0,1) 0%, rgba(0,0,0,1) 90% )"
							onclick="sidebarColorCustom(this)"></span>
							<span class="badge filter bg-gradient-warning <?php echo $principalColor == "radial-gradient(circle, rgba(119,108,106,1) 0%, rgba(141,128,125,1) 100%)" ? 'active' : ''; ?>" style="background-image: radial-gradient(circle, rgba(119,108,106,1) 0%, rgba(141,128,125,1) 100%);" data-attr="color" data-color="radial-gradient(circle, rgba(119,108,106,1) 0%, rgba(141,128,125,1) 100%)"
							onclick="sidebarColorCustom(this)"></span>
							<span class="badge filter bg-gradient-warning <?php echo $principalColor == "radial-gradient(circle, rgba(202,156,47,1) 0%, rgba(134,108,47,1) 100%)" ? 'active' : ''; ?>" style="background-image: radial-gradient(circle, rgba(202,156,47,1) 0%, rgba(134,108,47,1) 100%)!important;" data-attr="color" data-color="radial-gradient(circle, rgba(202,156,47,1) 0%, rgba(134,108,47,1) 100%)"
							onclick="sidebarColorCustom(this)"></span>
							<span class="badge filter bg-gradient-warning <?php echo $principalColor == "linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);" ? 'active' : ''; ?>" style="background-color: #FBAB7E; background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);!important;" data-attr="color" data-color="linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%)"
							onclick="sidebarColorCustom(this)"></span>
							<span class="badge filter bg-gradient-warning <?php echo $principalColor == "linear-gradient(90deg, #FF9A8B 0%, #FF6A88 55%, #FF99AC 100%);" ? 'active' : ''; ?>" style="background-image: linear-gradient(90deg, #FF9A8B 0%, #FF6A88 55%, #FF99AC 100%);!important;" data-attr="color" data-color="linear-gradient(90deg, #FF9A8B 0%, #FF6A88 55%, #FF99AC 100%)"
							onclick="sidebarColorCustom(this)"></span>
							<span class="badge filter bg-gradient-warning <?php echo $principalColor == "linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);" ? 'active' : ''; ?>" style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);!important;" data-attr="color" data-color="linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);"
							onclick="sidebarColorCustom(this)"></span>
						
					</div>
				</a>
				<div>
					<h6 class="mb-0">Color de Fondo</h6>
				</div>
				<a href="javascript:void(0)" class="switch-trigger background-color">
					<div class="badge-colors my-2 text-start d-flex">
					
							<span>
								<style>
									.color-input-wrapper {
									height: 1.5em;
									width: 1.5em;
									overflow: hidden;
									border-radius: 50%;
									display: inline-flex;
									align-items: center;
									position: relative;
									border: solid 1px;
									}
									.color-input-wrapper  input[type=color] {
										position: absolute;
										height: 4em;
										width: 4em;
										top: 50%;
										left: 50%;
										transform: translate(-50%, -50%);
										overflow: hidden;
										border: none;
										margin: 0;
										padding: 0;
									}
									</style>
									<div  class="color-input-wrapper" >
										<input value="<?php echo $backgroundColor; ?>"  id="colorPicker" type="color">
									</div>
							</span>
							<span style="cursor: pointer;">
								<p onclick="sidebarColorCustom(this)" data-attr="backgroundColor" id="colorPickerSave" style="margin-left: 1em;">Guardar</p>
							</span>
					</div>
				</a>
				

				<!-- Sidenav Type -->
				<div class="mt-3">
					<h6 class="mb-0">Color del Menu</h6>
				</div>
				<div class="d-flex">
						<a href="javascript:void(0)" class="switch-trigger background-color">
							<div class="badge-colors my-2 text-start d-flex">
							
									<span>
											<div  class="color-input-wrapper" >
												<input value="<?php echo $_SESSION['asideColor']; ?>"  id="colorPickerMenu" type="color">
											</div>
									</span>
									
							</div>
						</a>
						
					
				</div>
				<div>
					<span style="cursor: pointer;">
						<p data-color="<?php echo $_SESSION['asideColor']; ?>" onclick="sidebarColorCustom(this)" data-attr="asideColor" id="asideColor" style="margin-left: 1em;">Guardar</p>
					</span>
				</div>
				
				<p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
				<!-- Navbar Fixed -->
				<div class="mt-3">
					<h6 class="mb-0">Navegacion Fija</h6>
				</div>
				<div class="form-check form-switch ps-0">
					<input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
						onclick="navbarFixed(this)">
				</div>
				<hr class="horizontal dark my-sm-4">
				
				
			</div>
		</div>
	</div>
	<style>
		.bg-black {
			background-color: black;
		}
	</style>
	<script>
		let dataColor = document.getElementById("colorPicker");
		let dataColorSave = document.getElementById("colorPickerSave");
		let dataColorMenu = document.getElementById("colorPickerMenu");
		let asideMenu = document.getElementById("sidenav-main");
		
		dataColor.addEventListener("input", function(event){
			dataColorSave.setAttribute("data-color", dataColor.value);
			document.body.style.backgroundColor = dataColor.value;
		});
		dataColorMenu.addEventListener("input", function(event){
			asideColor.setAttribute("data-color", dataColorMenu.value);
			asideMenu.style.backgroundColor = dataColorMenu.value;
		});
		/*
		document.getElementById('volume').addEventListener('change', function() {
			let currentValue = this.value;
			//console.log( colorPickerMenu.value + currentValue);
			//asideMenu.style.backgroundColor = colorPickerMenu.value + currentValue;
			console.log(currentValue)
			// Aquí escribes el código que se ejecutará cuando el usuario cambie el valor del input.

			let hex = colorPickerMenu.value.replace("#",""); 
			let r = parseInt(hex.substring(0,2), 16); //r será 75 
			let g = parseInt(hex.substring(2,4), 16); //g será 38 
			let b = parseInt(hex.substring(4,6), 16); //b será 38

			//Agregue el valor alfa al final
			let a = parseInt(currentValue); 

			//Concatene los valores en una cadena de texto
			let rgb = `rgba(${r}, ${g}, ${b}, ${a/100})`; 
			asideMenu.style.backgroundColor = rgb;

		});*/
		
		function sidebarColorCustom(e, dataColor, dataAttr) {
			console.log(e.getAttribute("data-color"));
			let formData = new FormData();
		
          
            formData.append('color', dataColor ? dataColor : e.getAttribute("data-color"));
			
			formData.append('atributo', dataAttr ? dataAttr : e.getAttribute("data-attr"));

            const url = "./scripts/change_color.php";
            const XHR = new XMLHttpRequest();
             // Define what happens on successful data submission
            XHR.addEventListener('load', (event) => {
              /*swal({
                icon: "success",
                text: "Color Guardado",
                value: true,
                visible: true,
                className: "",
                closeModal: true,
              });*/
			  
			  location.reload();
			  console.log(event);
			  console.log(XHR.response);
              
            });

            // Define what happens in case of an error
            XHR.addEventListener('error', (event) => {
              //swal("Error" ,  "Ocurrio un error al intentar guardar el pago" ,  "error");
			  console.log(event);
            });

            // Set up our request
            XHR.open('POST', url);

            // Send our FormData object; HTTP headers are set automatically
            XHR.send(formData);
		}
	</script>