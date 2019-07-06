<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>

				<li>
					<a href="#">Permisos</a>
				</li>
				<li class="active">Usuarios</li>
			</ul><!-- /.breadcrumb -->

			
		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-xs-12 col-sm-5">
							<div class="control-group">
								<label class="control-label bolder blue">Lista DE Modulos</label>
								<form class="form-horizontal" method="POST" action="<?= URL_BASE ?>usuario/savepermisos" enctype="multipart/form-data">
								<?php while ($row = $listaPermisos -> fetch_object()) :	 ?>
									
								<div class="checkbox">
									<label>
										<input type="hidden" name="id_<?= str_replace(' ', '',$row->nombre)?>" value="<?=$row->id_permiso?>" />
										<input name="<?=str_replace(' ', '',$row->nombre)?>" type="checkbox" class="ace" />
										<span class="lbl"> <?=$row->nombre?></span>
									</label>
								</div>
								<?php endwhile; ?>
									<div class="form-group">
										<div class="col-sm-6"><br>
											<select class="form-control"  name="usuario" required>
												<option value="">Selecione un Usuario</option>
									<?php 
										$usarios = UsuarioController::Mostrarusuario();
										while ($row = $usarios -> fetch_object()) :	 ?>
											<option value="<?=$row->id?>"><?=$row->nombre?></option>
															
									<?php endwhile; ?>
								</select>
								
								</div>
									</div>
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
								</form>
								
							</div>
						</div>
					
					</div><!-- /.row -->
					<!-- PAGE CONTENT ENDS -->
				</div>
			</div>
		</div>
	</div>
</div>