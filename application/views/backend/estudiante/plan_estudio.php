<section class="panel">

	<div class="panel-body">

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
								<table class="table table-bordered table-striped table-condensed mb-none">
									<thead>
										<tr>
											<th>#</th>
											<th>
												Título
											</th>
											<th>
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
										$clase_id = $this->db->get_where('inscribirse' , array(
											'estudiante_id' => $estudiante_id , 'year' => $running_year
										))->row()->clase_id;
										$syllabus = $this->db->get_where( 'plan_estudio', array(
											'clase_id' => $clase_id, 'year' => $running_year
										) )->result_array();
										foreach ( $syllabus as $row ):
											?>
										<tr>
											<td>
												<?php echo $count++;?>
											</td>
											<td>
												<?php echo $row['titulo'];?>
											</td>
											<td>
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
											</td>
											<td>
												<?php echo date("d/m/Y" , $row['timestamp']);?>
											</td>
											<td>
												<?php echo substr($row['file_name'], 0, 20);?>
												<?php if(strlen($row['file_name']) > 20) echo '...';?>
											</td>
											<td align="center">
											
												<!-- SYLLABUS DESCARGAR -->
												<a class="btn btn-primary btn-xs"  href="<?php echo base_url();?>index.php?estudiante/descargar_plan_estudio/<?php echo $row['plan_estudio_cod'];?>">
										            <i class="fa fa-download"></i>Descargar
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

</section>