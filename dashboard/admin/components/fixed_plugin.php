<?php $fixedNav = $_SESSION['fixedNav']; ?>
<div class="fixed-plugin">
	<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
		<i class="fa fa-cog py-2"> </i>
	</a>
	<div class="card shadow-lg ">
		<div class="card-header pb-0 pt-3 ">
			<div class="float-start">
				<h5 class="mt-3 mb-0">
					<php ?> </php><i class="fa-solid fa-gear"></i> Configuracion
				</h5>
				<p><i class="fa-regular fa-circle-question custom-colors"></i> Personalizar aspecto</p>
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
				<h6 class="mb-0"><i class="fa-solid fa-brush"></i> Color de iconos</h6>
			</div>
			<a href="javascript:void(0)" class="switch-trigger background-color">
				<div class="badge-colors my-2 text-start">

					<span
						class="badge filter bg-gradient-dark  <?php echo $principalColor == "linear-gradient(310deg, #141727 0%, #3A416F 100%)" ? 'active' : ''; ?>"
						data-attr="color" data-color="linear-gradient(310deg, #141727 0%, #3A416F 100%)"
						onclick="changeIconColors(this)"></span>
					<span
						class="badge filter bg-gradient-info  <?php echo $principalColor == "linear-gradient(310deg, #2152ff 0%, #21d4fd 100%)" ? 'active' : ''; ?>"
						data-attr="color" data-color="linear-gradient(310deg, #2152ff 0%, #21d4fd 100%)"
						onclick="changeIconColors(this)"></span>
					<span
						class="badge filter bg-gradient-success  <?php echo $principalColor == "linear-gradient(310deg, #17ad37 0%, #7ea151 100%)" ? 'active' : ''; ?>"
						data-attr="color" data-color="linear-gradient(310deg, #17ad37 0%, #7ea151 100%)"
						onclick="changeIconColors(this)"></span>
					<span
						class="badge filter bg-gradient-warning  <?php echo $principalColor == "linear-gradient(310deg, #f53939 0%, #fbcf33 100%)" ? 'active' : ''; ?>"
						data-attr="color" data-color="linear-gradient(310deg, #f53939 0%, #fbcf33 100%)"
						onclick="changeIconColors(this)"></span>
					<span
						class="badge filter bg-gradient-danger  <?php echo $principalColor == "linear-gradient(310deg, #ea0606 0%, #ff667c 100%)" ? 'active' : ''; ?>"
						data-attr="color" data-color="linear-gradient(310deg, #ea0606 0%, #ff667c 100%)"
						onclick="changeIconColors(this)"></span>

					<span
						class="badge filter bg-gradient-primary <?php echo $principalColor == "linear-gradient(160deg, #0093E9 0%, #80D0C7 100%)" ? 'active' : ''; ?>"
						style="background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);" data-attr="color"
						data-color="linear-gradient(160deg, #0093E9 0%, #80D0C7 100%)"
						onclick="changeIconColors(this)"></span>

					<span
						class="badge filter bg-gradient-info <?php echo $principalColor == "linear-gradient( 83.2deg,  rgba(150,93,233,1) 10.8%, rgba(99,88,238,1) 94.3% )" ? 'active' : ''; ?>"
						style="background-image:  linear-gradient( 83.2deg,  rgba(150,93,233,1) 10.8%, rgba(99,88,238,1) 94.3% );"
						data-attr="color"
						data-color="linear-gradient( 83.2deg,  rgba(150,93,233,1) 10.8%, rgba(99,88,238,1) 94.3% )"
						onclick="changeIconColors(this)"></span>
					<span
						class="badge filter bg-gradient-success <?php echo $principalColor == "linear-gradient( 179.6deg,  rgba(0,19,26,1) -4.9%, rgba(0,77,105,1) 108.4% )" ? 'active' : ''; ?>"
						style="background-image:  linear-gradient( 179.6deg,  rgba(0,19,26,1) -4.9%, rgba(0,77,105,1) 108.4% );"
						data-attr="color"
						data-color="linear-gradient( 179.6deg,  rgba(0,19,26,1) -4.9%, rgba(0,77,105,1) 108.4% )"
						onclick="changeIconColors(this)"></span>
					<span
						class="badge filter bg-gradient-warning <?php echo $principalColor == "radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,0,0,1) 0%, rgba(0,0,0,1) 90% )" ? 'active' : ''; ?>"
						style="background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,0,0,1) 0%, rgba(0,0,0,1) 90% );;"
						data-attr="color"
						data-color="radial-gradient( circle farthest-corner at 10% 20%,  rgba(0,0,0,1) 0%, rgba(0,0,0,1) 90% )"
						onclick="changeIconColors(this)"></span>
					<span
						class="badge filter bg-gradient-warning <?php echo $principalColor == "radial-gradient(circle, rgba(119,108,106,1) 0%, rgba(141,128,125,1) 100%)" ? 'active' : ''; ?>"
						style="background-image: radial-gradient(circle, rgba(119,108,106,1) 0%, rgba(141,128,125,1) 100%);"
						data-attr="color"
						data-color="radial-gradient(circle, rgba(119,108,106,1) 0%, rgba(141,128,125,1) 100%)"
						onclick="changeIconColors(this)"></span>
					<span
						class="badge filter bg-gradient-warning <?php echo $principalColor == "radial-gradient(circle, rgba(202,156,47,1) 0%, rgba(134,108,47,1) 100%)" ? 'active' : ''; ?>"
						style="background-image: radial-gradient(circle, rgba(202,156,47,1) 0%, rgba(134,108,47,1) 100%)!important;"
						data-attr="color"
						data-color="radial-gradient(circle, rgba(202,156,47,1) 0%, rgba(134,108,47,1) 100%)"
						onclick="changeIconColors(this)"></span>
					<span
						class="badge filter bg-gradient-warning <?php echo $principalColor == "linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%)" ? 'active' : ''; ?>"
						style="background-color: #FBAB7E; background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);!important;"
						data-attr="color" data-color="linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%)"
						onclick="changeIconColors(this)"></span>
					<span
						class="badge filter bg-gradient-warning <?php echo $principalColor == "linear-gradient(90deg, #FF9A8B 0%, #FF6A88 55%, #FF99AC 100%)" ? 'active' : ''; ?>"
						style="background-image: linear-gradient(90deg, #FF9A8B 0%, #FF6A88 55%, #FF99AC 100%);!important;"
						data-attr="color" data-color="linear-gradient(90deg, #FF9A8B 0%, #FF6A88 55%, #FF99AC 100%)"
						onclick="changeIconColors(this)"></span>
					<span
						class="badge filter bg-gradient-warning <?php echo $principalColor == "linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%)" ? 'active' : ''; ?>"
						style="background-image: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);!important;"
						data-attr="color" data-color="linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%)"
						onclick="changeIconColors(this)"></span>

				</div>
			</a>
			<div class="d-flex">
				<div class="col-md-6">
					<div class="">
						<h6 class="mb-0"></i> Color de Fondo</h6>
					</div>
					
					<div class="d-flex " style="margin-left:10px;">
						<a href="javascript:void(0)" class="switch-trigger background-color">
							<div class="badge-colors my-2 text-start d-flex">
								<span>
									<div class="color-input-wrapper">
										<input value="<?php echo $backgroundColor; ?>" id="colorPicker" type="color">
									</div>
								</span>

							</div>
						</a>
					</div>
				</div>
				<div class="col-md-6">
				<!-- Sidenav Type -->
					<div class="mt-0 ">
						<h6 class="mb-0"></i> Color del Menu</h6>
					</div>
					<div class="d-flex " style="margin-left:10px;">
						<a href="javascript:void(0)" class="switch-trigger background-color">
							<div class="badge-colors my-2 text-start d-flex">
								<span>
									<div class="color-input-wrapper">
										<input value="<?php echo $_SESSION['asideColor']; ?>" id="colorPickerMenu" type="color">
									</div>
								</span>
							</div>
						</a>
					</div>
				</div>

			</div>
			
			


			
			<div>

			</div>
			<div class="form-group">
				<h6 for="exampleFormControlInput1"><i class="fa-regular fa-circle-question site-name"></i> Nombre del Sitio</h6>
				<input type="text" class="form-control" id="titleName" placeholder="" value="<?php echo $_SESSION['siteTitle'];?>">
			</div>
		
			<!-- Navbar Fixed -->
			<div class="mt-3">
				<h6 class="mb-0"><i class="fa-regular fa-circle-question fixed-nav-help"></i> Navegacion Fija</h6>
			</div>
			
			<div class="form-check form-switch">
				<input class="form-check-input" type="checkbox" id="navbarFixedChange" onclick="navbarFixed(this)" <?php echo $fixedNav && $fixedNav == 'true' ? 'checked=true' : '';?> >
			</div>

			<hr class="horizontal dark my-sm-4">
			<button id="saveFixedSettings" style="background:  <?php echo $principalColor; ?>;" onclick="setColorConfig()"
				class="btn btn-primary principal-color w-100 disabled" type="button"><i class="fa-solid fa-floppy-disk"></i>
				Guardar</button>
				


		</div>

	</div>
</div>
<style>
	.bg-black {
		background-color: black;
	}

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

	.color-input-wrapper input[type=color] {
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

<script>

	let dataColor = document.getElementById("colorPicker"); //background
	let dataColorSave = document.getElementById("colorPickerSave");
	let dataColorMenu = document.getElementById("colorPickerMenu"); //menu
	let asideMenu = document.getElementById("sidenav-main");


	dataColor.addEventListener("input", function (event) {
		console.log("cambiando color");
		event.target.setAttribute("changed", true);
		document.body.style.backgroundColor = dataColor.value;
		activeSaveBtn();

	});
	dataColorMenu.addEventListener("input", function (event) {
		console.log("cambiando color");
		event.target.setAttribute("changed", true);
		asideMenu.style.backgroundColor = dataColorMenu.value;
		activeSaveBtn();

	});
	document.getElementById("navbarFixedChange").addEventListener("change", function(event) {
		event.target.setAttribute("changed", true);
		activeSaveBtn();
	});
	document.getElementById("titleName").addEventListener("keyup", function(e){
		e.target.setAttribute("changed", true);
		activeSaveBtn();
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

	function changeIconColors(e) {
		console.log(e.getAttribute("data-color"));
		let formData = new FormData();
		//limpaimos color activo y seteamos el nuevo
		document.querySelectorAll('.bg-gradient-primary').forEach(div => div.style.setProperty('background', e.getAttribute("data-color")));
		document.querySelectorAll('.principal-color').forEach(div => div.style.setProperty('background', e.getAttribute("data-color")));
		iconsColor = e.getAttribute("data-color");
		const badgeColors = document.querySelector('.badge-colors');

		// Obtener todos los span en el div
		const allSpans = badgeColors.querySelectorAll('span');

		// Iterar los span
		allSpans.forEach(span => {
			// Verificar si el span contiene la clase active
			if (span.classList.contains('active')) {
				// Remover la clase active
				span.classList.remove('active');

			}

		});
		event.target.classList.add('active');
		event.target.setAttribute("changed", true);
		activeSaveBtn();
	}

	async function setColorConfig() {
		menuColor = dataColorMenu.value;
		backgroundColor = dataColor.value;
		iconColors = document.querySelector('.badge-colors > span.active');
		iconColorsValue = iconColors ? iconColors.getAttribute("data-color") : false;
		navbarFixed = document.getElementById("navbarFixedChange");
		titleName = document.getElementById("titleName");

		let savingData = false;
		if (dataColorMenu.getAttribute("changed") && dataColorMenu.getAttribute("changed") == "true") {
			console.log("color menu cambio");
			savingData = await saveInDD("asideColor", menuColor);
			console.log(savingData)

		}
		if (dataColor.getAttribute("changed") && dataColor.getAttribute("changed") == "true") {
			console.log("color back  cambio");
			savingData = await saveInDD("backgroundColor", backgroundColor);
			console.log(savingData)

		}
		if (iconColors.getAttribute("changed") && iconColors.getAttribute("changed") == "true" && iconColorsValue) {
			console.log("color icons cambio");
			savingData = await saveInDD("color", iconColorsValue);
			console.log(savingData)

		}
		if (navbarFixed.getAttribute("changed") && navbarFixed.getAttribute("changed") == "true") {
			state = navbarFixed.getAttribute("checked") ? true : false;
			savingData = await saveInDD("fixedNav", state ? state : false);
		}
		if(titleName.getAttribute("changed") && titleName.getAttribute("changed") == "true") {
			savingData = await saveInDD("siteTitle", titleName.value);
		}
		if (savingData) {
			swal("Listo", 'Ajustes de colores guardados', 'success').then(function () {
			}).then(function(){
				window.location.reload();
			});
		}


	}

	async function saveInDD(attribute, value) {
		var formData = new FormData();
		formData.append('atributo', attribute);
		formData.append('value', value);
		const url = "./scripts/change_color.php";

		try {
			const response = await fetch(url, {
				method: 'POST',
				body: formData
			});
			return await response.json();
		} catch (err) {
			swal("Error", "Ocurrio un error al intentar guardar", "error");
			console.log(err);
			return false;
		}

	}

	

	function activeSaveBtn(){
		document.getElementById("saveFixedSettings").classList.contains("disabled") ? document.getElementById("saveFixedSettings").classList.remove("disabled") : null;
	}



	tippy('.custom-colors', {
		content: "Esta seccion te permite cambiar los colores de la interfaz del sistema",
	});
	tippy('.site-name', {
		content: "Edita el nombre del gimnasio",
	});
	tippy('.fixed-nav-help', {
		content: "Activa o desactiva la barra superior de navegacion",
	});
</script>