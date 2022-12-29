<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
	id="sidenav-main">
	<div class="sidenav-header">
		<i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
			aria-hidden="true" id="iconSidenav"></i>
		<a class="navbar-brand m-0" href=" ./ ">
			<img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
			<span class="ms-1 font-weight-bold"><?php echo $_ENV["PAGE_NAME"] ?></span>
		</a>
	</div>
	<hr class="horizontal dark mt-0">
	<div style="    height: calc(100vh - 200px);" class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link  <?php echo ($active == 'dashboard') ? "active"  : ""; ?>" href="./index.php">
					<div style=<?php echo "'background-image:$principalColor;'"?>
						class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="fa-solid fa-chart-line"></i>
					</div>
					<span class="nav-link-text ms-1">Resumen</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link  <?php echo ($active == 'new') ? "active"  : ""; ?>" href="./new_entry.php">
					<div style=<?php echo "'background-image:$principalColor;'"?>
						class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="fa-solid fa-user-plus"></i>
					</div>
					<span class="nav-link-text ms-1">Nuevo Registro</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link  <?php echo ($active == 'payment') ? "active"  : ""; ?>" href="./payments.php">
					<div style=<?php echo "'background-image:$principalColor;'"?>
						class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
						<svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
							xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<title>credit-card</title>
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
									<g transform="translate(1716.000000, 291.000000)">
										<g transform="translate(453.000000, 454.000000)">
											<path style="fill:#ffffff;" class="color-background opacity-6"
												d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z">
											</path>
											<path style="fill:#ffffff;" class="color-background"
												d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
											</path>
										</g>
									</g>
								</g>
							</g>
						</svg>
					</div>
					<span class="nav-link-text ms-1">Pago</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link  <?php echo ($active == 'members') ? "active"  : ""; ?>" href="./table_view.php">
					<div style=<?php echo "'background-image:$principalColor;'"?>
						class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="fa-solid fa-users"></i>
					</div>
					<span class="nav-link-text ms-1">Miembros</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link  <?php echo ($active == 'memberships') ? "active"  : ""; ?>" href="./view_plan.php">
					<div style=<?php echo "'background-image:$principalColor;'"?>
						class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
						<svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <title>document</title> <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero"> <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)"> <g id="document" transform="translate(154.000000, 300.000000)"> <path class="" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" id="Path" opacity="0.603585379"></path> <path class="" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z" id="Shape"></path> </g> </g> </g> </g> </svg>

					</div>
					<span class="nav-link-text ms-1">Membresias</span>
				</a>
			</li>
			<li class="nav-item mt-3">
				<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Cuenta</h6>
			</li>
			<li class="nav-item">
				<a class="nav-link  " href="more-userprofile.php">
					<div style=<?php echo "'background-image:$principalColor;'"?>
						class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
						<svg width="16px" height="16px" viewBox="0 0 40 40" version="1.1"
							xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
							<title>settings</title>
							<g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<g id="Rounded-Icons" transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF"
									fill-rule="nonzero">
									<g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
										<g id="settings" transform="translate(304.000000, 151.000000)">
											<polygon class="" id="Path" opacity="0.596981957"
												points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
											</polygon>
											<path class=""
												d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"
												id="Path" opacity="0.596981957"></path>
											<path class=""
												d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"
												id="Path"></path>
										</g>
									</g>
								</g>
							</g>
						</svg>
					</div>
					<span class="nav-link-text ms-1">Cuenta</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link  " href="logout.php">
					<div style=<?php echo "'background-image:$principalColor;'"?>
						class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
						<i class="fa-solid fa-power-off"></i>
					</div>
					
					<span class="nav-link-text ms-1">Salir</span>
				</a>
			</li>
		</ul>
	</div>
	<div class="sidenav-footer mx-3 ">
		<button style=<?php echo "'background-image:$principalColor;'"?> data-bs-toggle="modal"
			data-bs-target="#modalRegisterVisit" class="btn bg-gradient-primary mt-3 w-100">Registrar Visita</button>
	</div>

</aside>
<?php include 'modals/register_user_visit.php'; ?>
<style>
	.navbar-vertical.navbar-expand-xs .navbar-nav .nav-link:hover {
		background: white;
		border-radius: 5px;
		box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
	}
</style>