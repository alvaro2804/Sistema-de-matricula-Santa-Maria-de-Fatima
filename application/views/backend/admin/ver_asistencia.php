<?php echo form_open(base_url() . 'index.php?admin/seleccionador_asistencia/'); ?>

<section class="panel">
	<div class="panel-body">
		<div class="row">

			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">
						Clase
					</label>
					<select name="clase_id" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" class="form-control mb-sm" onchange="select_seccion(this.value)">
						<option value="">
							Seleccionar Clase
						</option>
						<?php
							$clases = $this->db->get('clase')->result_array();
							foreach ( $clases as $row ):
						?>
						<option value="<?php echo $row['clase_id']; ?>" <?php if ($clase_id == $row['clase_id']) echo 'selected'; ?>><?php echo $row['nombre']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>

			<div id="section_holder">
				<div class="col-md-4">

					<div class="form-group">
						<label class="control-label">
							Sección
						</label>
						<select data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" name="seccion_id" id="section_id" class="form-control mb-sm">
							<?php
								$secciones = $this->db->get_where( 'seccion', array('clase_id' => $clase_id) )->result_array();
								foreach ( $secciones as $row ):
							?>
							<option value="<?php echo $row['seccion_id']; ?>" <?php if ($seccion_id == $row[ 'seccion_id']) echo 'selected'; ?>><?php echo $row['nombre']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label class="control-label">
						Fecha
					</label>
					<input type="text" class="form-control mb-sm" data-plugin-datepicker name="timestamp" data-plugin-options='{"format": "dd-mm-yyyy"}' value="<?php echo date("d-m-Y", $timestamp); ?>"/>
				</div>
			</div>

			<input type="hidden" name="year" value="<?php echo $running_year; ?>">


			<center>
				<button type="submit" class="mb-xs mt-xs mr-xs btn btn btn-primary">
					Manejo de Asistencia
				</button>
			</center>
		</div>


		<?php echo form_close(); ?>

		<hr class="dotted short mb-lg">

		<div class="col-md-6 col-md-offset-3">
			<section class="panel">
				<div class="panel-body bg-attend">
					<div class="widget-summary">
						<div class="widget-summary-col widget-summary-col-icon">
							<div class="summary-icon bg-primary">
								<i class="fa fa-area-chart"></i>
							</div>
						</div>
						<div class="widget-summary-col">
							<div class="summary">
								<h4 class="title">
									Asistencia de la Clase :
									<?php echo $this->db->get_where('clase', array('clase_id' => $clase_id))->row()->nombre; ?>
								</h4>
								<hr class="solid short">
								<span>
									Sección
									<?php echo $this->db->get_where('seccion', array('seccion_id' => $seccion_id))->row()->nombre; ?>
								</span><br>
								<span>
									<?php echo date("d M Y", $timestamp); ?>
								</span>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<style>
			thead {
				background-color: #362a32 !important;
			}
		</style>

		<div class="col-md-12">
			<?php echo form_open(base_url() . 'index.php?admin/actualizar_asistencia/' . $clase_id . '/' . $seccion_id . '/' . $timestamp); ?>
			<div id="attendance_update">
				<div class="table-responsive">

				<table class="table table-bordered ">
					<thead>
						<tr>
							<th>#</th>
							<th>
								Roll
							</th>
							<th>
								Nombre
							</th>
							<th>
								Estado
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 1;
						$asistencia_de_estudiantes = $this->db->get_where( 'asistencia', array('clase_id' => $clase_id, 'seccion_id' => $seccion_id, 'year' => $running_year, 'timestamp' => $timestamp) )->result_array();
						foreach ( $asistencia_de_estudiantes as $row ):
						?>
						<tr>
						    <td><?php echo $count++; ?></td>
							<td>
								<?php echo $this->db->get_where('inscribirse', array('estudiante_id' => $row['estudiante_id']))->row()->roll; ?>
							</td>
							<td>
								<?php echo $this->db->get_where('estudiante', array('estudiante_id' => $row['estudiante_id']))->row()->nombre; ?>
							</td>
							<td>
								<select class="form-control " data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" name="status_<?php echo $row['asistencia_id']; ?>" style="width: 100%">
									<option value="0" <?php if ($row[ 'status']==0 ) echo 'selected'; ?>>Indefinido</option>
									<option value="1" <?php if ($row[ 'status']==1 ) echo 'selected'; ?>>Presente</option>
									<option value="2" <?php if ($row[ 'status']==2 ) echo 'selected'; ?>>Ausente</option>
								</select>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="panel-footer">
		<center>
			<button type="submit" class="btn btn-success" id="submit_button">
                <i class="fa fa-check"></i> Guardar Cambios
            </button>
		
		</center>
	</div>
	<?php echo form_close(); ?>
</section>
	
<script type="text/javascript">
    function select_seccion(clase_id) {

        $.ajax({
            url: '<?php echo base_url(); ?>index.php?admin/get_seccion/' + clase_id,
            success:function (response)
            {
                jQuery('#section_holder').html(response);
            }
        });
    }
</script>