<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>				
				<li class="active">Lista Consejos</li>
			</ul><!-- /.breadcrumb -->


		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<h3 class="header smaller lighter blue">Lista de consejos</h3>
					<a href="#modal-form" role="button" class="blue" data-toggle="modal">
						<button class="btn btn-info" type="button">
							<i class="ace-icon fa fa-check bigger-110"></i>
							Registrar
						</button>
					</a>
					<div class="clearfix">
						<div class="pull-right tableTools-container"></div>
					</div>
					<!-- PAGE CONTENT BEGINS -->
					<div class="row">
						<div class="col-xs-8">
							<table id="simple-table" class="table  table-bordered table-hover">
								<thead>
									<tr>

										<th class="detail-col">Detalles</th>
										<th>Nombre</th>

										<th>Acciones</th>
									</tr>
								</thead>

								<tbody>
									<?php while ($row = $listaCons->fetch_object()): ?>
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
												<a href="<?= URL_BASE ?>consejos/detallesconsejo&id=<?= $row->id_consejo_diocesis ?>"><?= $row->nombre ?></a>
											</td>


											<td>
												<div class="hidden-sm hidden-xs btn-group">												
													<a href="<?= URL_BASE ?>consejos/detallesconsejo&id=<?= $row->id_consejo_diocesis ?>">
														<button class="btn btn-xs btn-info">
															<i class="ace-icon fa fa-search-plus bigger-120"></i>
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
																<a href="<?= URL_BASE ?>consejos/detalles&id=<?= $row->id_consejo_diocesis ?>" class="tooltip-info" data-rel="tooltip" title="View">
																	<span class="blue">
																		<i class="ace-icon fa fa-search-plus bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="<?= URL_BASE ?>consejos/editarconsejo&id=<?= $row->id_consejo_diocesis ?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																	<span class="green">
																		<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																	</span>
																</a>
															</li>
															
														</ul>
													</div>
												</div>
											</td>
										</tr>

										<tr class="detail-row">
											<td colspan="8">
												<div class="table-detail">
													<div class="row">
														<div class="col-xs-12 col-sm-3">
															<div class="text-center">																

																<br />
																<div class="width-150 label label-info label-xlg arrowed-in arrowed-in-right">
																	<div class="inline position-relative">
																		<a class="user-title-label" href="<?= URL_BASE ?>consejos/detalles&id=<?= $row->id_consejo_diocesis ?>">


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

																	<div class="profile-info-name"> Nombre </div>

																	<div class="profile-info-value">
																		<a class="user-title-label" href="<?= URL_BASE ?>consejos/detalles&id=<?= $row->id_consejo_diocesis ?>">
																			<span><?= $row->nombre ?></span>
																		</a>
																	</div>
																</div>


																<div class="profile-info-row">
																	<div class="profile-info-name"> </div>

																	<div class="profile-info-value">																	
																		<span>LISTA DE INTEGRANTES</span>
																	</div>
																</div>
																<?php
																$id = $row->id_consejo_diocesis;																
																$integran = ConsejosController::MostrarIntegranteConsejo($id);														
																
																while ($row1 = $integran -> fetch_object()) :
																	
																
																?>
																<div class="profile-info-row">
																	<div class="profile-info-name"> </div>

																	<div class="profile-info-value">
																		<a class="user-title-label" href="<?= URL_BASE ?>sacerdote/sacerdote&id=<?= $row1->idt2 ?>">
																			<span><?=$row1->nombres?>  <?=$row1->apellidos ?></span>
																		</a>
																	</div>

																</div>
																<?php endwhile;?>
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
					<!-- PAGE CONTENT ENDS -->
				</div>
			</div>
		</div>
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
				<form action="<?=URL_BASE?>consejos/guardar" enctype="multipart/form-data" method="POST">					
				
					<div class="form-group">
						<label for="nombre">Nombre Concejo:</label>
						<input type="text" class="form-control" name="nombre" id="nombre" required>
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