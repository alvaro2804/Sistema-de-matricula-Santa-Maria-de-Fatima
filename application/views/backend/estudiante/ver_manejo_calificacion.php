<?php echo form_open(base_url() . 'index.php?admin/selector_calificacion');?>
<section class="panel">
	<div class="panel-body">
		<div class="row">

			<div class="col-md-3 mb-sm">
				<div class="form-group">
					<label class="control-label">
						Examen <span class="required">*</span>
					</label>
					<select name="examen_id" class="form-control" data-plugin-selectTwo required title="Valor Requerido" data-width="100%" data-minimum-results-for-search="Infinity">
						<?php
						$examenes = $this->db->get_where( 'examen', array( 'year' => $running_year ) )->result_array();
						foreach ( $examenes as $row ):
							?>
						<option value="<?php echo $row['examen_id'];?>" <?php if($examen_id == $row[ 'examen_id']) echo 'selected';?>><?php echo $row['nombre'];?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div class="col-md-3 mb-sm">
				<div class="form-group">
					<label class="control-label">
						Clase <span class="required">*</span>
					</label>
					<select name="clase_id" class="form-control" data-plugin-selectTwo required title="Valor Requerido" data-width="100%" data-minimum-results-for-search="Infinity" onchange="get_clase_tema(this.value)">
						<option value="">
							Seleccionar Clase
						</option>
						<?php
						$clases = $this->db->get( 'clase' )->result_array();
						foreach ( $clases as $row ):
							?>
						<option value="<?php echo $row['clase_id'];?>" <?php if($clase_id == $row[ 'clase_id']) echo 'selected';?>><?php echo $row['nombre'];?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>

			<div id="subject_holder">
				<div class="col-md-3 mb-sm">
					<div class="form-group">
						<label class="control-label">
							Sección <span class="required">*</span>
						</label>
						<select name="seccion_id" id="section_id" class="form-control" data-plugin-selectTwo required title="Valor Requerido" data-width="100%" data-minimum-results-for-search="Infinity">
							<?php 
						$secciones = $this->db->get_where('seccion' , array(
							'clase_id' => $clase_id 
						))->result_array();
						foreach($secciones as $row):
							?>
							<option value="<?php echo $row['seccion_id'];?>" <?php if($seccion_id == $row[ 'seccion_id']) echo 'selected';?>><?php echo $row['nombre'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>
				<div class="col-md-3 mb-sm">
					<div class="form-group">
						<label class="control-label">
							Tema <span class="required">*</span>
						</label>
						<select name="tema_id" id="subject_id" class="form-control" data-plugin-selectTwo required title="Valor Requerido" data-width="100%" data-minimum-results-for-search="Infinity">
							<?php 
								$temas = $this->db->get_where('tema' , array(
									'clase_id' => $clase_id , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description
								))->result_array();
								foreach($temas as $row):
							?>
							<option value="<?php echo $row['tema_id'];?>" <?php if($tema_id == $row[ 'tema_id']) echo 'selected';?>><?php echo $row['nombre'];?></option>
							<?php endforeach;?>
						</select>
					</div>
				</div>

			</div>

		</div>

		<center>
			<button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">
            Manejo de Calificaciones
			</button>
		</center>


		<?php echo form_close();?>

		<hr class="dotted short mb-lg ">

		<div class="col-md-6 col-md-offset-3">
			<section class="panel">
				<div class="panel-body" style="background-color: #483747">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-primary">
								<i class="fa fa-area-chart"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title" style="color: #FFF">
									Calificación de 
									<?php echo $this->db->get_where('examen' , array('examen_id' => $examen_id))->row()->nombre;?>
								</h4>
								<hr class="solid short">
								<span>
									Clase
									<?php echo $this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;?> :
									Sección
									<?php echo $this->db->get_where('seccion' , array('seccion_id' => $seccion_id))->row()->nombre;?>
								</span><br>
								<span>
									Tema :
									<?php echo $this->db->get_where('tema' , array('tema_id' => $tema_id))->row()->nombre;?>
								</span>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<div class="row">

			<div class="col-md-12 mb-sm">

				<?php echo form_open(base_url() . 'index.php?admin/actualizar_calificacion/'.$examen_id.'/'.$clase_id.'/'.$seccion_id.'/'.$tema_id);?>
				<div class="table-responsive">
					<table class="table table-bordered table-condensed mb-none">
						<thead>
							<tr>
								<th>#</th>

								<th>
									Nombre
								</th>
								<th>
									Calificación Obtenida
								</th>
								<th>
									Comentario
								</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$count = 1;
							$calif_estu = $this->db->get_where( 'calificacion', array(
								'clase_id' => $clase_id,
								'seccion_id' => $seccion_id,
								'year' => $running_year,
								'tema_id' => $tema_id,
								'examen_id' => $examen_id
							) )->result_array();
							foreach ( $calif_estu as $row ):
								?>
							<tr>
								<td>
									<?php echo $count++;?>
								</td>
								<td>
									<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre;?>
								</td>
								<td>
									<input type="text" class="form-control" name="calificacion_obtenida_<?php echo $row['calificacion_id'];?>" value="<?php echo $row['calificacion_obtenida'];?>">
								</td>
								<td>
									<input type="text" class="form-control" name="comentario_<?php echo $row['calificacion_id'];?>" value="<?php echo $row['comentario'];?>">
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>

			</div>
		</div>

	</div>
	<footer class="panel-footer">
		<center>
			<button type="submit" class="btn btn-success" id="submit_button">
				<i class="fa fa-check"></i> Guardar Cambios
			</button>
		
		</center>
		</div>
		<?php echo form_close();?>
</section>


<script type="text/javascript">
	function get_clase_tema( clase_id ) {

		$.ajax( {
			url: '<?php echo base_url();?>index.php?admin/calificacion_get_tema/' + clase_id,
			success: function ( response ) {
				jQuery( '#subject_holder' ).html( response );
			}
		} );

	}
</script>