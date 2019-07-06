<?php
if (!isset($_SESSION['identity'])) {
	header('Location:' . URL_BASE);
}
?>

<div id="navbar" class="navbar navbar-default          ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="<?= URL_BASE ?>frontend/principal" class="navbar-brand">
				<small>
					<i class="fa fa-leaf"></i>
					ADMIN - SC
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">



				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="<?= URL_BASE.'imagenes/perfil/'.$_SESSION['identity']->img ?>" alt="Jason's Photo" />
						<span class="user-info">
							<small> Bienvenido, </small>
							<?= $_SESSION['identity']->nombre; ?>
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
												
						<li class="divider"></li>

						<li>
							<a href="<?= URL_BASE ?>/usuario/salir">
								<i class="ace-icon fa fa-power-off"></i>
								Cerrar sesión
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>
<div class="main-container ace-save-state" id="main-container">
	<script type="text/javascript">
		try {
			ace.settings.loadState('main-container')
		} catch (e) {
		}
	</script>

	<div id="sidebar" class="sidebar  responsive ace-save-state">
		<script type="text/javascript">
			try {
				ace.settings.loadState('sidebar')
			} catch (e) {
			}
		</script>

		<div class="sidebar-shortcuts" id="sidebar-shortcuts">
			<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
				

				

				
			
			</div>

			<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
				<span class="btn btn-success"></span>

				<span class="btn btn-info"></span>

				<span class="btn btn-warning"></span>

				<span class="btn btn-danger"></span>
			</div>
		</div><!-- /.sidebar-shortcuts -->

		<ul class="nav nav-list">
			<li class="active">
				<a href="<?= URL_BASE ?>frontend/principal">
					<i class="menu-icon fa fa-tachometer"></i>
					<span class="menu-text"> Principal </span>
				</a>

				<b class="arrow"></b>
			</li>
			<?php
			$id = $_SESSION['identity']->id;

			$datos = UsuarioController::PermisosPorUsuario($id);

			while ($row = $datos->fetch_object()) {
				$permisos = $row->id_permiso;
				$idper = json_decode($permisos, TRUE);

				foreach ($idper as $key => $value) {
					$id = $value['id'];
					$verMod = UsuarioController::VerModulos($id); 
					while ($row1 = $verMod->fetch_object()) {					
						
							if ($row1->nombre == 'vicaria') {?>
							<li class="">
								<a href="<?= URL_BASE ?>vicarias/" >
									<i class="menu-icon fa fa-picture-o"></i>
									<span class="menu-text"> Vicarias </span>

								</a>												
							</li>
							<?php } ?>
							<?php	if ($row1->nombre == 'oficios Parroquiales') {?>
							<li class="">
								<a href="<?= URL_BASE ?>oficiosparroquiales/">
										<i class="menu-icon fa fa-tag"></i>
											<span class="menu-text"> Oficios Parroquiales</span>
								</a>												
							</li>
							
							<?php }?>
							<?php	if ($row1->nombre == 'consejo Diocesis') {?>
							<li class="">
								<a href="<?= URL_BASE ?>consejos/">
									<i class="menu-icon fa fa-list-alt"></i>
										<span class="menu-text"> Concejos Diocesis </span>
								</a>

									<b class="arrow"></b>
							</li>
							
							<?php }?>
							<?php	if ($row1->nombre == 'comisiones pastorales') {?>
							<li class="">
								<a href="<?= URL_BASE ?>comisiones/">
									<i class="menu-icon fa fa-list-alt"></i>
										<span class="menu-text"> Comis. Pastorales </span>
								</a>

									<b class="arrow"></b>
							</li>
							
							<?php }?>
							<?php	if ($row1->nombre == 'parroquias') {?>
								<li class="">
									<a href="<?= URL_BASE ?>parroquia/" class="dropdown-toggle">
										<i class="menu-icon fa fa-desktop"></i>
										<span class="menu-text">
											PARROQUIAS
										</span>

										<b class="arrow fa fa-angle-down"></b>
									</a>

									<b class="arrow"></b>

									<ul class="submenu">
										<li class="">
											<a href="<?= URL_BASE ?>parroquia/">
												<i class="menu-icon fa fa-caret-right"></i>
												Lista de Parroquias
											</a>
											<b class="arrow"></b>
										</li>

										<li class="">
											<a href="<?= URL_BASE ?>centrosparroquiales/">
												<i class="menu-icon fa fa-caret-right"></i>
												Centros Parroquiales
											</a>
											<b class="arrow"></b>
										</li>
									</ul>
								</li>
							
							<?php }?>
							<?php	if ($row1->nombre == 'sacerotes') {?>
							<li class="">
								<a href="<?= URL_BASE ?>sacerdotes/" class="dropdown-toggle">
									<i class="menu-icon fa fa-list"></i>
									<span class="menu-text"> SACERDOTES </span>
									<b class="arrow fa fa-angle-down"></b>
								</a>
								<b class="arrow"></b>
								<ul class="submenu">
									<li class="">
										<a href="<?= URL_BASE ?>sacerdote/listasacerdote">
											<i class="menu-icon fa fa-caret-right"></i>
											lista de sacerdotes
										</a>
										<b class="arrow"></b>
									</li>
									<li class="">
										<a href="<?= URL_BASE ?>seminarista/listaseminarista">
											<i class="menu-icon fa fa-caret-right"></i>
											lista de Seminarista
										</a>
										<b class="arrow"></b>
									</li>
								</ul>
							</li>
							
							<?php }?>
							<?php	if ($row1->nombre == 'relaciones') {?>
							<li class="">
									<a href="" class="dropdown-toggle">
										<i class="menu-icon fa fa-pencil-square-o"></i>
										<span class="menu-text"> Relaciones </span>
										<b class="arrow fa fa-angle-down"></b>
									</a>
										<b class="arrow"></b>
									<ul class="submenu">
										<li class="">
											<a href="<?= URL_BASE ?>relaciones/listasinternas">
												<i class="menu-icon fa fa-caret-right"></i>
											Relaciones Internas
											</a>
											<b class="arrow"></b>
										</li>
										<li class="">
											<a href="<?= URL_BASE ?>relaciones/listasexternas">
												<i class="menu-icon fa fa-caret-right"></i>
												Relaciones Externas
											</a>
											<b class="arrow"></b>
										</li>
										<li class="">											
											<a href="" class="dropdown-toggle">
												<i class="menu-icon fa fa-pencil-square-o"></i>
												 <span class="menu-text"> Relaciones Distintas </span>
												<b class="arrow fa fa-angle-down"></b>
											</a>
											<b class="arrow"></b>
											<ul class="submenu">
												<li>
													<a href="<?= URL_BASE ?>relaciones/listasdistintas">
														<i class="menu-icon fa fa-caret-right"></i>
													Institulos Seculares
													</a>
												</li>
												<li>
													<a href="<?= URL_BASE ?>relaciones/listasdlaicales">
														<i class="menu-icon fa fa-caret-right"></i>
													Asociaciones Laicales
													</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>
							
							<?php }?>
							<?php	if ($row1->nombre == 'configuraciones') {?>
								<li class="">
									<a class="dropdown-toggle">
										<i class="menu-icon fa fa-file-o"></i>
										<span class="menu-text">
											Configuraciones
										</span>
										<b class="arrow fa fa-angle-down"></b>
									</a>

									<b class="arrow"></b>
									<ul class="submenu">
											<?php if ($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro'): ?>
											<li class="">
												<a href="<?= URL_BASE ?>usuario/">
													<i class="menu-icon fa fa-caret-right"></i>
													lista de  Usuario
												</a>
												<b class="arrow"></b>
											</li>
											<?php endif; ?>
										<li class="">
											<a href="<?= URL_BASE ?>usuario/perfil&id=<?=$_SESSION['identity']->id?>">
												<i class="menu-icon fa fa-caret-right"></i>
												Perfil
											</a>
											<b class="arrow"></b>
										</li>
										<?php if ($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro'): ?>
										<li class="">
											<a href="<?= URL_BASE ?>usuario/permisos">
												<i class="menu-icon fa fa-caret-right"></i>
												Permisos
											</a>
											<b class="arrow"></b>
										</li>
											<?php endif; ?>
									</ul>
								</li>
							
							<?php }?>
						<?php
						
					}
				}
			}
			?>				
		</ul>

		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
		</div>
	</div>
