<section class="panel">

	<header class="panel-heading">
		<a href="<?php echo base_url();?>index.php?admin/horario_add" class="btn btn-primary btn-sm">
        <i class="fa fa-plus-circle"></i>
        Añadir Horario de la Clase
		</a>
	</header>
	
	<div class="panel-body">
		<?php
		$query = $this->db->get( 'clase' );
		$clase = $query->result_array();
		?>

		<div class="form-group">
			<label class="col-sm-6 col-sm-offset-3 control-label" style="margin-bottom: 5px; text-align: center;">
				Clase
			</label>
			<div class="col-sm-6 col-sm-offset-3">
				<select data-plugin-selectTwo class="form-control populate" name="clase_id" onchange="class_section(this.value)" style="width: 100%">
					<option value="">Seleccionar Clase</option>
					<?php foreach ($clase as $row): ?>
					<option value="<?php echo $row['clase_id']; ?>" <?php if ($clase_id == $row[ 'clase_id']) echo 'selected'; ?> ><?php echo $row['nombre']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<br>

		<?php
		$query = $this->db->get_where( 'seccion', array( 'clase_id' => $clase_id ) );
		if ( $query->num_rows() > 0 && $clase_id != '' ):
			$secciones = $query->result_array();
		foreach ( $secciones as $row ):
			?>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-border panel-primary">
					<header class="panel-heading">
						<a href="<?php echo base_url();?>index.php?admin/horario_imprimir/<?php echo $clase_id;?>/<?php echo $row['seccion_id'];?>" class="btn btn-danger btn-xs pull-right" target="_blank">
						  <i class="glyphicon glyphicon-print"></i>Impresión
						 </a>
						<div style="font-size: 16px; text-align: center;">
							Sección -
							<?php echo $this->db->get_where('seccion' , array('seccion_id' => $row['seccion_id']))->row()->nombre;?>
						</div>
					</header>
					<div class="panel-body">

						<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
							<tbody>
								<?php 
								for($d=1;$d<=7;$d++):

									if($d==1)$day='domingo';
									else if($d==2)$day='lunes';
									else if($d==3)$day='martes';
									else if($d==4)$day='miércoles';
									else if($d==5)$day='jueves';
									else if($d==6)$day='viernes';
									else if($d==7)$day='sábado';
								?>
								<tr class="gradeA">
									<td width="100">
										<?php echo strtoupper($day);?>
									</td>
									<td>
										<?php
										$this->db->order_by( "time_inicio", "asc" );
										$this->db->where( 'dia', $day );
										$this->db->where( 'clase_id', $clase_id );
										$this->db->where( 'seccion_id', $row[ 'seccion_id' ] );
										$this->db->where( 'year', $running_year );
										$rutinas = $this->db->get( 'clase_rutina' )->result_array();
										foreach ( $rutinas as $row2 ):
										?>
										<div class="btn-group">
											<button class="mb-xs mt-xs mr-xs btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
												<?php echo $this->crud_model->get_subject_name_by_id($row2['tema_id']);?>
												<?php
												  echo '(' . $row2[ 'time_inicio' ] . '-' . $row2[ 'time_final' ] . ')';
												?>
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
												<li>
													<a href="#" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_horario/<?php echo $row2['clase_rutina_id'];?>');">
														<i class="fa fa-pencil"></i>Editar
											
                                                    </a>
												
												</li>

												<li>
													<a href="#" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/clase_rutina/eliminar/<?php echo $row2['clase_rutina_id'];?>');">
														<i class="fa fa-trash"></i>
														Borrar
													</a>
												
												</li>
											</ul>
										</div>
										<?php endforeach;?>
									</td>
								</tr>
								<?php endfor;?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
		<?php endforeach;?>
		<?php endif;?>
	</div>
</section>

<script type="text/javascript">
	function class_section( clase_id ) {
		window.location.href = '<?php echo base_url(); ?>index.php?admin/horario/' + clase_id;
	}
</script>