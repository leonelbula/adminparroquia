<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?= URL_BASE ?>frontend/principal">Principal</a>
				</li>

				<li>
					<a href="<?= URL_BASE ?>vicarias/">lista Vicarias</a>
				</li>
				<li class="active">Detalles</li>
			</ul><!-- /.breadcrumb -->

			
		</div>

		<div class="page-content">			
			<div class="row">
				<div class="col-xs-12">
					<a href="<?= URL_BASE ?>vicarias/">

						<button class="btn">
							<i class="ace-icon fa fa-undo bigger-110"></i>
							Volver
						</button>

					</a>
					<!-- PAGE CONTENT BEGINS -->
					<div class="col-sm-6">
						<div class="widget-box">
							<div class="widget-header">
								<h4 class="widget-title lighter smaller">
									
									Parroquias
								</h4>
							</div>

							<div class="widget-body">
								<div class="widget-main no-padding">
									<div class="dialogs">
										<?php while ($row = $detallesVicaria ->fetch_object()): ?>
										<div class="itemdiv dialogdiv">
											<div class="user">
												<img alt="" src="<?=URL_BASE?>imagenes/parroquia/<?=$row->foto?>" width="10%" />
											</div>

											<div class="body">
												<div class="time">
													
												</div>

												<div class="name">
													<a href="<?=URL_BASE?>parroquia/detalles&id=<?= $row->id_parroquia?>"><?= $row->nombre?></a>
												</div>
												<div class="text"><span class="green">Direccion: </span> <?= $row->direccion?>   <span class="green">Municipio: </span> <?= $row->municipio?></div>

												<div class="tools">
													<a href="<?=URL_BASE?>parroquia/detalles&id=<?= $row->id_parroquia?>" class="btn btn-minier btn-info">
														<i class="icon-only ace-icon fa fa-share"></i>
													</a>
												</div>
											</div>
										</div>
								<?php endwhile; ?>
							
										
										
									</div>

									
								</div><!-- /.widget-main -->
							</div><!-- /.widget-body -->
						</div><!-- /.widget-box -->
					</div><!-- /.col -->
					<!-- PAGE CONTENT ENDS -->
				</div>
			</div>
		</div>
	</div>
</div>