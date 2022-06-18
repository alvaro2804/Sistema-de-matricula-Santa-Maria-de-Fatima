<section class="panel">
	<header class="panel-heading">
		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/seccion_add/');" class="btn btn-sm btn-primary">
    	<i class="fa fa-plus-circle"></i>
			Añadir Nueva Sección
        </a>
	</header>
	
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="tabs tabs-success">
					<ul class="nav nav-tabs text-right">
			<?php 
				$clases = $this->db->get('clase')->result_array();
				foreach ($clases as $row):
			?>
						<li class="<?php if ($row['clase_id'] == $clase_id) echo 'active';?>">
							<a href="<?php echo base_url();?>index.php?admin/seccion/<?php echo $row['clase_id'];?>">
						<i class="fa fa-star"></i>
						Clase<?php echo $row['nombre'];?>
					</a>
						
						</li>
						<?php endforeach;?>
					</ul>

					<div class="tab-content">

						<div class="tab-pane active">
							<table class="table table-bordered table-striped table-condensed mb-none">
								<thead>
									<tr>
										<th>#</th>
										<th>
											Nombre
										</th>
										<th class="hidden-xs hidden-sm">
											Nombre Nick
										</th>
										<th class="hidden-xs hidden-sm">
											Profesor
										</th>
										<th>
											Opciones
										</th>
									</tr>
								</thead>
								<tbody>

									<?php
									$count = 1;
									$secciones = $this->db->get_where( 'seccion', array(
										'clase_id' => $clase_id
									) )->result_array();
									foreach ( $secciones as $row ):
										?>
									<tr>
										<td>
											<?php echo $count++;?>
										</td>
										<td class="hidden-xs hidden-sm">
											<?php echo $row['nombre'];?>
										</td>
										<td class="hidden-xs hidden-sm">
											<?php echo $row['nick_nombre'];?>
										</td>
										<td>
											<?php if ($row['profesor_id'] != '' || $row['profesor_id'] != 0)
											echo $this->db->get_where('profesor' , array('profesor_id' => $row['profesor_id']))->row()->nombre;
										?>
										</td>
										<td>
										
										
										<!-- EDITAR LINK -->
										<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/seccion_edit/<?php echo $row['seccion_id'];?>');">
										<i class="fa fa-pencil"></i>
										</a>

										<!-- ELIMINAR LINK -->
										<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/secciones/eliminar/<?php echo $row['seccion_id'];?>');">
										<i class="fa fa-trash"></i>
										</a>

										</td>
									</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>