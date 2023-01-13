<div class="fixed-plugin">
		<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
			<i class="fa fa-cog py-2"> </i>
		</a>
		<div class="card shadow-lg ">
			<div class="card-header pb-0 pt-3 ">
				<div class="float-start">
					<h5 class="mt-3 mb-0">TitaniumGym Configuracion</h5>
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
						
						<span class="badge filter bg-gradient-dark" data-attr="color" data-color="linear-gradient(310deg, #141727 0%, #3A416F 100%)"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-info" data-attr="color" data-color="linear-gradient(310deg, #2152ff 0%, #21d4fd 100%)"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-success" data-attr="color" data-color="linear-gradient(310deg, #17ad37 0%, #7ea151 100%)"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-warning" data-attr="color" data-color="linear-gradient(310deg, #f53939 0%, #fbcf33 100%)"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-danger" data-attr="color" data-color="linear-gradient(310deg, #ea0606 0%, #ff667c 100%)"
							onclick="sidebarColorCustom(this)"></span>

						<span class="badge filter bg-gradient-primary active" style="background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);" data-attr="color" data-color="linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);"
							onclick="sidebarColorCustom(this)"></span>
					
						<span class="badge filter bg-gradient-info" style="background-image:  linear-gradient( 83.2deg,  rgba(150,93,233,1) 10.8%, rgba(99,88,238,1) 94.3% );" data-attr="color" data-color=" linear-gradient( 83.2deg,  rgba(150,93,233,1) 10.8%, rgba(99,88,238,1) 94.3% )"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-success" style="background-image:  linear-gradient( 179.6deg,  rgba(0,19,26,1) -4.9%, rgba(0,77,105,1) 108.4% );" data-attr="color" data-color=" linear-gradient( 179.6deg,  rgba(0,19,26,1) -4.9%, rgba(0,77,105,1) 108.4% )"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-warning" style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,0,0,1) 0%, rgba(0,0,0,1) 90% );;" data-attr="color" data-color="radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,0,0,1) 0%, rgba(0,0,0,1) 90% );"
							onclick="sidebarColorCustom(this)"></span>
						<span class="badge filter bg-gradient-danger" style="background: transparent;" data-attr="color" data-color="transparent"
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
										<input  id="colorPicker" type="color">
									</div>
							</span>
							<span>
								<p onclick="sidebarColorCustom(this)" data-attr="backgroundColor" id="colorPickerSave" style="margin-left: 1em;">Guardar</p>
							</span>
					</div>
				</a>
				<!-- Sidenav Type -->
				<div class="mt-3">
					<h6 class="mb-0">Color del Menu</h6>
					<p class="text-sm">Choose between 2 different sidenav types.</p>
				</div>
				<div class="d-flex">
					<button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent"
						onclick="sidebarType(this)">Defult</button>
					<button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white"
						onclick="sidebarType(this)">Blanco</button>
					<button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-black"
						onclick="sidebarType(this)">Negro</button>
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
	<style>
		.bg-black {
			background-color: black;
		}
	</style>
	<script>
		let dataColor = document.getElementById("colorPicker");
		let dataColorSave = document.getElementById("colorPickerSave");
		
		dataColor.addEventListener("input", function(event){
			dataColorSave.setAttribute("data-color", dataColor.value);
		});
		
		function sidebarColorCustom(e) {
			console.log(e.getAttribute("data-color"));
			let formData = new FormData();
          
          
            formData.append('color', e.getAttribute("data-color"));
			console.log(e.getAttribute("data-attr"));
			formData.append('atributo', e.getAttribute("data-attr"));

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