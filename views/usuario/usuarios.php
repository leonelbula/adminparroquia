<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>

				<li>
					<a href="#">lista de Usuarios</a>
				</li>

			</ul><!-- /.breadcrumb -->


		</div>
		<div class="page-header">
			<h1>	<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
				<a href="<?= URL_BASE ?>usuario/registro">
					<button class="btn btn-info" type="submit">
						<i class="ace-icon fa fa-check bigger-110"></i>
						Registrar
					</button>
				</a>
				<?php endif; ?>
			</h1>
		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="row">
			<div class="col-xs-12">
				<table id="simple-table" class="table  table-bordered table-hover">
					<thead>
						<tr>

							<th class="detail-col">Detalles</th>
							<th>Usuario</th>
							<th>Tipo</th>
							<th class="hidden-480">Estado</th>



							<th>Acciones</th>
						</tr>
					</thead>

					<tbody>
						<?php while ($row = $listaUsuario->fetch_object()): ?>
							<tr>


								<td class="center">
									<div class="action-buttons">
										<a href="#" class="green bigger-140 show-details-btn" title="Ver Detalles">
											<i class="ace-icon fa fa-angle-double-down"></i>
											<span class="sr-only">Detalles</span>
										</a>
									</div>
								</td>

								<td>
									<a href="<?=URL_BASE ?>usuario/perfil&id=<?=$row->id?>"><?= $row->nombre ?></a>
								</td>
								<td><?= $row->tipo ?></td>
								<td class="hidden-480">
									<?php
									if ($row->estado == 1) {
										echo'Activado';
									} else {
										echo 'Desactivado';
									}
									?>
								</td>																	

								<td>
										<?php if($_SESSION['identity']->tipo == 'admin' || $_SESSION['identity']->tipo == 'maestro' ): ?>
									<div class="hidden-sm hidden-xs btn-group">												
										<a href="<?=URL_BASE?>usuario/editar&id=<?=$row->id?>">
												<button class="btn btn-xs btn-info">
													<i class="ace-icon fa fa-pencil bigger-120"></i>
												</button>
										</a>
										<a href="<?=URL_BASE?>usuario/eliminar&id=<?=$row->id?>">
												<button class="btn btn-xs btn-danger">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
												</button>
										</a>
									</div>
									
									<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												
												<li>
													<a href="<?=URL_BASE?>usuario/editar&id=<?=$row->id?>" class="tooltip-success" data-rel="tooltip" title="Editar">
														<span class="green">
															<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="<?=URL_BASE?>usuario/eliminar&id=<?=$row->id?>" class="tooltip-error" data-rel="tooltip" title="Eliminar">
														<span class="red">
															<i class="ace-icon fa fa-trash-o bigger-120"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
									<?php endif;?>
								</td>
							</tr>

							<tr class="detail-row">
								<td colspan="8">
									<div class="table-detail">
										<div class="row">
											<div class="col-xs-12 col-sm-2">
												<div class="text-center">
													<img height="150" class="thumbnail inline no-margin-bottom" alt="Domain Owner's Avatar" src="<?= URL_BASE.'imagenes/perfil/'.$row->img ?>" />
													<br />
													<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
														<div class="inline position-relative">
															<a class="user-title-label" href="#">
																<i class="ace-icon fa fa-circle light-green"></i>
																&nbsp;
																<span class="white"><?= $row->nombre ?></span>
															</a>
														</div>
													</div>
												</div>
											</div>

											<div class="col-xs-12 col-sm-7">
												<div class="space visible-xs"></div>

												<div class="profile-user-info profile-user-info-striped">
													<div class="profile-info-row">
														<div class="profile-info-name"> Usuario </div>

														<div class="profile-info-value">
															<span><?= $row->nombre ?></span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Tipo </div>

														<div class="profile-info-value">																	
															<span><?= $row->tipo ?></span>
														</div>
													</div>

													<div class="profile-info-row">
														<div class="profile-info-name"> Estado </div>

														<div class="profile-info-value">
															<span>
																<?php
																if ($row->estado == 1) {
																	echo'Activado';
																} else {
																	echo 'Desactivado';
																}
																?></span>
														</div>
													</div>



												</div>
											</div>


										</div>
									</div>
								</td>
							</tr>
						<?php endwhile; ?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
	</div>
</div>
