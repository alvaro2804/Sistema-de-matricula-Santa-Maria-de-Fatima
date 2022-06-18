<?php echo form_open(base_url() . 'index.php?admin/asistencia_reporte_seleccionador/' , array('id' => 'form')); ?>
<section class="panel">
	<div class="panel-body">
		<div class="row">

			<?php
			$query = $this->db->get( 'clase' );
			if ( $query->num_rows() > 0 ):
				$clase = $query->result_array();
			?>

			<div class="col-md-4 mb-sm">
				<div class="form-group">
					<label class="control-label">
						Clase <span class="required">*</span>
					</label>
					<select class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required name="clase_id" onchange="select_seccion(this.value)">
						<option value="">Seleccionar Clase</option>
						<?php foreach ($clase as $row): ?>
						<option value="<?php echo $row['clase_id']; ?>" <?php if ($clase_id == $row[ 'clase_id']) echo 'selected'; ?> ><?php echo $row['nombre']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<?php endif; ?>

			<?php
			$query = $this->db->get_where( 'seccion', array( 'clase_id' => $clase_id ) );
			if ( $query->num_rows() > 0 ):
				$secciones = $query->result_array();
			?>
			<div id="section_holder">
				<div class="col-md-4 mb-sm">
					<div class="form-group">
						<label class="control-label">
							Sección
						</label>
						<select class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required name="seccion_id">
							<?php foreach ($secciones as $row): ?>
							<option value="<?php echo $row['seccion_id']; ?>" <?php if ($seccion_id == $row[ 'seccion_id']) echo 'selected'; ?>><?php echo $row['nombre']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="col-md-4 mb-sm">
				<div class="form-group">
					<label class="control-label">
						Fecha(Mes)
					</label>
					<select name="month" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required id="month-">
						<?php
						for ( $i = 1; $i <= 12; $i++ ):
							if ( $i == 1 )
								$m = 'Enero';
							else if ( $i == 2 )
							$m = 'Febrero';
						else if ( $i == 3 )
							$m = 'Marzo';
						else if ( $i == 4 )
							$m = 'Abril';
						else if ( $i == 5 )
							$m = 'Mayo';
						else if ( $i == 6 )
							$m = 'Junio';
						else if ( $i == 7 )
							$m = 'Julio';
						else if ( $i == 8 )
							$m = 'Agosto';
						else if ( $i == 9 )
							$m = 'Septiembre';
						else if ( $i == 10 )
							$m = 'Octubre';
						else if ( $i == 11 )
							$m = 'Noviembre';
						else if ( $i == 12 )
							$m = 'Diciembre';
						?>
						<option value="<?php echo $i; ?>" <?php if ($month == $i) echo 'selected'; ?>><?php echo $m; ?></option>
						<?php
						endfor;
						?>
					</select>
				</div>
			</div>

			<input type="hidden" name="year" value="<?php echo $running_year;?>">
			</div>
			
		<center>
			<button type="submit" class="mb-xs mt-xs mr-xs btn btn btn-primary">
				Mostrar Reporte
			</button>
		</center>
		<?php echo form_close(); ?>

		

		<?php if ($clase_id != '' && $seccion_id != '' && $month != ''): ?>

		<hr class="dotted short mb-lg">

		<div class="row">

			<div class="col-md-6 col-md-offset-3">
				<section class="panel">
					<div class="panel-body bg-attend">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-primary">
									<i class="fa fa-signal"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<?php
									$seccion_nombre = $this->db->get_where( 'seccion', array( 'seccion_id' => $seccion_id ) )->row()->nombre;
									$clase_nombre = $this->db->get_where( 'clase', array( 'clase_id' => $clase_id ) )->row()->nombre;
									if ( $month == 1 )
										$m = 'Enero';
									else if ( $month == 2 )
										$m = 'Febrero';
									else if ( $month == 3 )
										$m = 'Marzo';
									else if ( $month == 4 )
										$m = 'Abril';
									else if ( $month == 5 )
										$m = 'Mayo';
									else if ( $month == 6 )
										$m = 'Junio';
									else if ( $month == 7 )
										$m = 'Julio';
									else if ( $month == 8 )
										$m = 'Agosto';
									else if ( $month == 9 )
										$m = 'Septiembre';
									else if ( $month == 10 )
										$m = 'Octubre';
									else if ( $month == 11 )
										$m = 'Noviembre';
									else if ( $month == 12 )
										$m = 'Diciembre';
									?>

									<h4 class="title"> 
										Hoja de Asistencia
									</h4>
										<hr class="solid short">
										<span>
											<?php echo 'Clase' . ' ' . $clase_nombre; ?> :
											Sección
											<?php echo $seccion_nombre; ?>
										</span><br>
										<span>
											<?php echo $m;?>
										</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>

		<div class="col-md-12">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-condensed  mb-none" id="my_table">
					<thead>
						<tr>
							<td style="text-align: center;">
								Los Estudiantes <i class="fa fa-hand-o-down"></i> |
								Fecha <i class="fa fa-hand-o-right"></i>
							</td>
							<?php
							$year = explode( '-', $running_year );
							$days = cal_days_in_month( CAL_GREGORIAN, $month, $year[ 0 ] );

							for ( $i = 1; $i <= $days; $i++ ) {
								?>
							<td style="text-align: center;">
								<?php echo $i; ?>
							</td>
							<?php } ?>

						</tr>
					</thead>

					<tbody>
						<?php
						$data = array();

						$estudiantes = $this->db->get_where( 'inscribirse', array( 'clase_id' => $clase_id, 'year' => $running_year, 'seccion_id' => $seccion_id ) )->result_array();

						foreach ( $estudiantes as $row ):
							?>
						<tr>
							<td style="text-align: center;">
								<?php echo $this->db->get_where('estudiante', array('estudiante_id' => $row['estudiante_id']))->row()->nombre; ?>
							</td>
							<?php
							$status = 0;
							for ( $i = 1; $i <= $days; $i++ ) {
								$timestamp = strtotime( $i . '-' . $month . '-' . $year[ 0 ] );
								$this->db->group_by( 'timestamp' );
								$asistencia = $this->db->get_where( 'asistencia', array( 'seccion_id' => $seccion_id, 'clase_id' => $clase_id, 'year' => $running_year, 'timestamp' => $timestamp, 'estudiante_id' => $row[ 'estudiante_id' ] ) )->result_array();


								foreach ( $asistencia as $row1 ):
									$month_dummy = date( 'd', $row1[ 'timestamp' ] );

								if ( $i == $month_dummy )
									$status = $row1[ 'status' ];

								endforeach;
								?>
							<td style="text-align: center;">
								<?php if ($status == 1) { ?>
								<i class="fa fa-circle" style="color: #00a651;"></i>
								<?php  } if($status == 2)  { ?>
								<i class="fa fa-circle" style="color: #ee4749;"></i>
								<?php  } $status =0;?>

							</td>

							<?php } ?>
							<?php endforeach; ?>

						</tr>

					</tbody>
				</table>

			</div>
		</div>

		<?php endif; ?>
	</div>

	<div class="panel-footer">
		<center>
			<a href="<?php echo base_url(); ?>index.php?admin/ver_asistencia_reporte_imprimir/<?php echo $clase_id; ?>/<?php echo $seccion_id; ?>/<?php echo $month; ?>" class="btn btn-sm btn-primary " target="_blank">
				<i class="glyphicon glyphicon-print"></i>Imprimir Hoja de Asistencia
			</a>
		</center>
	</div>
	
</section>

<script type="text/javascript">
	function select_seccion( clase_id ) {

		$.ajax( {
			url: '<?php echo base_url(); ?>index.php?admin/get_seccion/' + clase_id,
			success: function ( response ) {
				jQuery( '#section_holder' ).html( response );
			}
		} );
	}
</script>