<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?=URL_BASE?>frontend/principal">Principal</a>
				</li>

				<li>
					<a href="<?=URL_BASE?>usuario/">Lista de Usuario</a>
				</li>
				<li class="active">Registrar Usuario</li>
			</ul><!-- /.breadcrumb -->


		</div>
		<div class="page-header">
				<h1>
					REGISTROR DE NUEVO USUARIO
					
				</h1>
			</div><!-- /.page-header -->

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					
					<form class="form-horizontal" method="POST" action="<?= URL_BASE ?>usuario/save" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for=""> Nombre de Usuario </label>

							<div class="col-sm-9">
								<input type="text" name="nombre" placeholder="Nombre" class="col-xs-10 col-sm-5"  required />
							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for=""> Contraseña </label>

							<div class="col-sm-9">
								<input type="password" name="password" placeholder="Password" class="col-xs-10 col-sm-5" required />

							</div>
						</div>

						<div class="space-4"></div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="">Tipo de Perfil</label>

							<div class="col-sm-3">
								<select class="form-control"  name="tipo" required>
									<option value="">Selecione una opcion</option>
									<option value="usuario">Usuario</option>
									<option value="admin">Administrador</option>														
								</select>
								<div class="space-2"></div>

								<div class="help-block"></div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="">Desea Activar Perfil</label>

							<div class="col-sm-3">
								<select class="form-control" name="estado" required>
									<option value="">Seleccione una opcion</option>
									<option value="1">Activado</option>
									<option value="0">Desactivado</option>									

								</select>

							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="">Foto perfil  tipo: ( .png/.jpg/.jpeg )</label>

							<div class="col-sm-3">
								<input multiple="" type="file" name="img" id="id-input-file-3" />

							</div>
						</div>
				

						

						<div class="space-4"></div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-3 col-md-9">


								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-check bigger-110"></i>
									Registrar
								</button>

								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									Borrar
								</button>
							</div>
						</div>

						<div class="hr hr-24"></div>

					</form>
					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div><!-- /.main-content -->