<div class="main-container">
	<div class="main-content">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="login-container">
					<div class="center">
						<h1>
							<i class="ace-icon fa fa-leaf green"></i>
							<span class="red">ADMIN</span>									
						</h1>
						<h4 class="blue" id="id-company-text">&copy; Derechos reservado</h4>
					</div>

					<div class="space-6"></div>

					<div class="position-relative">
						<div id="login-box" class="login-box visible widget-box no-border">
							<div class="widget-body">
								<div class="widget-main">
									<?php //if(!isset($_SESSION['identity'])): ?>
									<h4 class="header blue lighter bigger">
										<i class="ace-icon fa fa-coffee green"></i>
										Por favor ingrese su datos de accesos
										
									</h4>

									<div class="space-6"></div>

									<form  action="<?= URL_BASE ?>usuario/login" method="POST">
										<fieldset>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="text" class="form-control" name="nombre" placeholder="Nombre de Usuario" />
													<i class="ace-icon fa fa-user"></i>
												</span>
											</label>

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="password" class="form-control" name="password" placeholder="Password" />
													<i class="ace-icon fa fa-lock"></i>
												</span>
											</label>

											<div class="space"></div>

											<div class="clearfix">

												<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
													<i class="ace-icon fa fa-key"></i>
													<span class="bigger-110">ENTRAR</span>
												</button>
											</div>

											<div class="space-4"></div>
										</fieldset>
									</form>																	
									<?php //endif; ?>
									<div class="social-or-login center">
										<span class="bigger-110">ENTRAR AL SISTEMA</span>
									</div>

									<div class="space-6"></div>

								</div><!-- /.widget-main -->

							</div><!-- /.widget-body -->
						</div><!-- /.login-box -->

					</div><!-- /.position-relative -->

				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.main-content -->
</div>