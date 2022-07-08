<section class="panel">
<?php echo form_open(base_url() . 'index.php?profesor/calificacion_reporte',array('id' => 'form'));?>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-6 mb-sm">
					<div class="form-group">
						<label class="control-label">Clase <span class="required">*</span></label>
						<select name="clase_id" class="form-control" required title="Valor Requerido" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
							<option value="">Seleccione Clase</option>
							<?php 
							$clases = $this->db->get('clase')->result_array();
							foreach($clases as $row):
							?>
								<option value="<?php echo $row['clase_id'];?>"<?php if ($clase_id == $row['clase_id']) echo 'selected';?>><?php echo $row['nombre'];?></option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>
				<div class="col-md-6 mb-lg">
					<div class="form-group">
					<label class="control-label">Examen <span class="required">*</span></label>
						<select name="examen_id" class="form-control" required title="Valor Requerido" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
							<option value="">Seleccione Examen</option>
							<?php 
							$examenes= $this->db->get_where('examen' , array('year' => $running_year))->result_array();
							foreach($examenes as $row):
							?>
								<option value="<?php echo $row['examen_id'];?>"<?php if ($examen_id == $row['examen_id']) echo 'selected';?>><?php echo $row['nombre'];?>
								</option>
							<?php
							endforeach;
							?>
						</select>
					</div>
				</div>
				<input type="hidden" name="operacion" value="seleccion">
			</div>
		</div>

		<center>
			<button type="submit" class="btn btn-primary">Mostrar Calificaciones</button>
		</center>
		
	<?php echo form_close();?>

<?php if ($clase_id != '' && $examen_id != ''):?>

	<hr class="dotted short mb-sm mt-sm">
	
		<div class="col-md-6 col-md-offset-3">
			<section class="panel">
				<div class="panel-body" style="background-color: #483747">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-primary">
								<i class="fa fa fa-clone"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title" style="color: #FFF">
									Hoja de Calificaciones
								</h4>
								<hr class="solid short">
								<span>
								<?php
									$examen_nombre  = $this->db->get_where('examen' , array('examen_id' => $examen_id))->row()->nombre; 
									$clase_nombre = $this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre; 
									echo 'Clase' . ' ' . $clase_nombre;?> : <?php echo $examen_nombre;
								?>
								</span>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>


<div class="col-md-12 mb-sm">
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-condensed mb-none">
			<thead>
				<tr style="font-weight:bold">
				<td style="text-align: center;">
					Los Estudiantes <i class="fa fa-hand-o-down"></i> | Cursos <i class="fa fa-hand-o-right"></i>
				</td>
				<?php 
					$temas = $this->db->get_where('tema' , array('clase_id' => $clase_id , 'year' => $running_year))->result_array();
					foreach($temas as $row):
				?>
					<td style="text-align: center;"><?php echo $row['nombre'];?></td>
				<?php endforeach;?>
				</tr>
			</thead>
			<tbody>
			<?php
				
				$estudiantes = $this->db->get_where('inscribirse' , array('clase_id' => $clase_id , 'year' => $running_year))->result_array();
				foreach($estudiantes as $row):
			?>
				<tr>
					<td style="text-align: center;">
						<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre;?>
					</td>
				<?php

					foreach($temas as $row2):
				?>
					<td style="text-align: center;">
						<?php 
							$consulta_cali_obt = 	$this->db->get_where('calificacion' , array(
													'clase_id' => $clase_id , 
														'examen_id' => $examen_id , 
															'tema_id' => $row2['tema_id'] , 
																'estudiante_id' => $row['estudiante_id'],
																	'year' => $running_year
												));
							if ( $consulta_cali_obt->num_rows() > 0) {
								$calificacion_obtenida = $consulta_cali_obt->row()->calificacion_obtenida;
								echo $calificacion_obtenida;
								if ($calificacion_obtenida >= 0 && $calificacion_obtenida != '') {
									$grado = $this->crud_model->get_grado($consulta_cali_obt);
									
								}
								
							}			

						?>
					</td>
				<?php endforeach;?>
				
				
				</tr>

			<?php endforeach;?>

			</tbody>
		</table>

	</div>
</div>

</div>

	<footer class="panel-footer">
	<center>
		<a href="<?php echo base_url();?>index.php?profesor/ver_imprimir_calificacion/<?php echo $clase_id;?>/<?php echo $examen_id;?>" 
			class="btn btn-primary" target="_blank">
			<i class="glyphicon glyphicon-print"></i>Imprimir Hoja de Calificación
		</a>
	</center>
	</footer>
		
</section>
<?php endif;?>