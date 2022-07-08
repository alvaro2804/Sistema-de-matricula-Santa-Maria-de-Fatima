<section class="panel">
	<header class="panel-heading">
		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_plan_estudio_add/');" class="btn btn-sm btn-primary">
    	<i class="fa fa-plus-circle"></i>
			Plan de Estudio Escolar
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
							<a href="<?php echo base_url();?>index.php?admin/plan_estudio/<?php echo $row['clase_id'];?>">
						      <i class="entypo-dot"></i>
						      Clase <?php echo $row['nombre'];?>
					        </a>
						
						</li>
						<?php endforeach;?>
					</ul>

					<div class="tab-content">

						<div class="tab-pane active">
							<div class="table-responsive">
								<table class="table table-bordered table-striped table-condensed mb-none">
									<thead>
										<tr>
											<th class="hidden-xs">#</th>
											<th>
												Título
											</th>
											<th class="hidden-xs hidden-sm">
												Descripcion
											</th>
											<th>
												Tema
											</th>
											<th>
												Usuario
											</th>
											<th>
												Fecha
											</th>
											<th>
												Archivo
											</th>
											<th></th>
										</tr>
									</thead>
									<tbody>

										<?php
										$count = 1;
										$syllabus = $this->db->get_where( 'plan_estudio', array(
											'clase_id' => $clase_id, 'year' => $running_year
										) )->result_array();
										foreach ( $syllabus as $row ):
											?>
										<tr>
											<td class="hidden-xs">
												<?php echo $count++;?>
											</td>
											<td>
												<?php echo $row['titulo'];?>
											</td>
											<td class="hidden-xs hidden-sm">
												<?php echo $row['descripcion'];?>
											</td>
											<td>
												<?php 
										           echo $this->db->get_where('tema' , array(
											           'tema_id' => $row['tema_id']
										           ))->row()->nombre;
									           ?>
											</td>
											<td>
												<?php 
										            echo $this->db->get_where($row['usuario_tipo'] , array(
											            $row['usuario_tipo'].'_id' => $row['usuario_id']
										            ))->row()->name;
									            ?>
												<?php 
										            echo $this->db->get_where($row['usuario_tipo'] , array(
											            $row['usuario_tipo'].'_id' => $row['usuario_id']
										            ))->row()->nombre;
									            ?>
											</td>
											<td>
												<?php echo date("d/m/Y" , $row['timestamp']);?>
											</td>
											<td>
												<?php echo substr($row['file_name'], 0, 20);?>
												<?php if(strlen($row['file_name']) > 20) echo '...';?>
											</td>
											<td align="center" width="100">
											
												<!-- SYLLABUS DESCARGAR -->
												<a class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Descargar" href="<?php echo base_url();?>index.php?admin/descargar_plan_estudio/<?php echo $row['plan_estudio_cod'];?>">
										            <i class="fa fa-download"></i>
									            </a>
									            
												<!--ELIMINAR -->
												<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/plan_estudio_eliminar/<?php echo $row['plan_estudio_cod'].'/'.$row['clase_id'] ;?>');">
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
	</div>
</section>