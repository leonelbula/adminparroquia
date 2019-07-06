<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>
				
				<li class="active">lista de Seminarista</li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">


			<div class="row">
				<div class="col-xs-12">														

					<div class="row">
						<div class="col-xs-12">
							<h3 class="header smaller lighter blue">Lista de Sacerdote</h3>
							<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
							<a href="#modal-form" role="button" class="blue" data-toggle="modal">
							<button class="btn btn-info" type="button">
								<i class="ace-icon fa fa-check bigger-110"></i>
								Registrar
							</button>
							</a>
							<?php endif; ?>
							<div class="clearfix">
								<div class="pull-right tableTools-container"></div>
							</div>

							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="center">
												<label class="pos-rel">
													N°
													<span class="lbl"></span>
												</label>
											</th>
											<th>NOMBRE</th>
											<th>APELLIDO</th>
									
											<th></th>
										</tr>
									</thead>

									<tbody>
										<?php 
											$i=1;
											
											while ($row = $lista->fetch_object()):
												
										?>
										<tr>
											<td class="center">
												<label class="pos-rel">
													<?= $i++; ?>
													<span class="lbl"></span>
												</label>
											</td>
											<td><a href="<?=URL_BASE?>seminarista/seminarista&id=<?= $row->id_seminarista?>"><?= $row->nombres?></a></td>
											<td>
												<a><?= $row->apellidos?></a>
											</td>
													
											<td>
												<div class="hidden-sm hidden-xs action-buttons">
													<a class="blue" href="<?=URL_BASE?>seminarista/seminarista&id=<?= $row->id_seminarista?>">
														<i class="ace-icon fa fa-search-plus bigger-130"></i>
													</a>
													<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
													<a class="green" href="<?=URL_BASE?>seminarista/editar&id=<?= $row->id_seminarista?>">
														<i class="ace-icon fa fa-pencil bigger-130"></i>
													</a>

													<a class="red" href="<?=URL_BASE?>seminarista/eliminar&id=<?= $row->id_seminarista?>">
														<i class="ace-icon fa fa-trash-o bigger-130"></i>
													</a>
													<?php endif; ?>
												</div>

												<div class="hidden-md hidden-lg">
													<div class="inline pos-rel">
														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
															<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
														</button>

														<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
															<li>
																<a href="<?=URL_BASE?>seminarista/seminarista&id=<?= $row->id_seminarista?>" class="tooltip-info" data-rel="tooltip" title="Ver">
																	<span class="blue">
																		<i class="ace-icon fa fa-search-plus bigger-120"></i>
																	</span>
																</a>
															</li>
															<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
															<li>
																<a href="<?=URL_BASE?>seminarista/editar&id=<?= $row->id_seminarista?>" class="tooltip-success" data-rel="tooltip" title="Editar">
																	<span class="green">
																		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="<?=URL_BASE?>seminarista/eliminar&id=<?= $row->id_seminarista?>" class="tooltip-error" data-rel="tooltip" title="Eliminar">
																	<span class="red">
																		<i class="ace-icon fa fa-trash-o bigger-120"></i>
																	</span>
																</a>
															</li>
															<?php endif; ?>
														</ul>
													</div>
												</div>
											</td>
										</tr>

									<?php endwhile;?>
									</tbody>
								</table>
							</div>
						</div>
					</div>



					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>
</div>

<div id="modal-form" class="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="blue bigger">Nuevo Registro</h4>
			</div>

			<div class="modal-body">
				<form action="<?=URL_BASE?>seminarista/guardar" enctype="multipart/form-data" method="POST">
									
					<div class="form-group">
						<label for="nombre">Nombres:</label>
						<input type="text" class="form-control" name="nombre" id="nombre" required>
					</div>
					<div class="form-group">
						<label for="nombre">Apellidos:</label>
						<input type="text" class="form-control" name="apellido" id="apellido" required>
					</div>
					<div class="form-group">
						<label for="fechanacimiento">fecha Nacimiento:</label>
						<input type="date" class="form-control" name="fechanacimiento" id="fechanacimiento" required>
					</div>
					<div class="form-group">
						<label for="lugarnacimiento">Lugar de Nacimiento:</label>
						<input type="text" class="form-control"name="lugarnacimiento" id="municipio" required>
					</div>
					<div class="form-group">
						<label for="telefono">Telefono:</label>
						<input type="number" class="form-control" name="telefono" id="telefono">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" name="email" id="email">
					</div>					
					<div class="form-group">
						<label for="foto">Foto:</label>
						<input type="file" class="form-control" name="foto" id="foto">
					</div>					
					
					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>

			<div class="modal-footer">
				<button class="btn btn-sm" data-dismiss="modal">
					<i class="ace-icon fa fa-times"></i>
					Cancelar
				</button>
				
			</div>
		</div>
	</div>
</div>



