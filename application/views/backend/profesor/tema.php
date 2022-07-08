<section class="panel panel-featured panel-featured-primary">

	<div class="panel-body">
	
		<?php
		$query = $this->db->get( 'clase' );
		$clase = $query->result_array();
		?>

		<div class="form-group">
			<label class="col-sm-6 col-sm-offset-3 control-label" style="margin-bottom: 5px; text-align:  center;">
				Seleccione una Clase
			</label>
			<div class="col-sm-6 col-sm-offset-3">
				<select data-plugin-selectTwo class="form-control populate" name="clase_id" onchange="class_section(this.value)" style="width: 100%">
					<option value="">
						Seleccionar Clase
					</option>
					<?php foreach ($clase as $row): ?>
					<option value="<?php echo $row['clase_id']; ?>" <?php if ($clase_id == $row[ 'clase_id']) echo 'selected'; ?> ><?php echo $row['nombre']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>


		<?php 
        $query = $this->db->get_where('seccion' , array('clase_id' => $clase_id));
            if ($query->num_rows() > 0 && $clase_id != ''):
                $secciones = $query->result_array();
        ?>

		<div class="tabs tabs-primary">
			<!------INICIO CONTROL TABS------>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					Lista de Clases / Asignaturas
                    	</a>
				</li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane box active" id="list">
					<table class="table table-bordered table-striped mb-none" id="datatable-tabletools">
						<thead>
							<tr>
								<th>
									<div>
										Clase
									</div>
								</th>
								<th>
									<div>
										Nombre de la Asignatura
									</div>
								</th>
								<th>
									<div>
										Profesor
									</div>
								</th>

							</tr>
						</thead>
						<tbody>
							<?php $count = 1;foreach($temas as $row):?>
							<tr>
								<td>
									<?php echo $this->crud_model->get_type_name_by_id('clase',$row['clase_id']);?>
								</td>
								<td>
									<?php echo $row['nombre'];?>
								</td>
								<td>
									<?php echo $this->crud_model->get_type_name_by_id('profesor',$row['profesor_id']);?>
								</td>
								
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php endif;?>
	</div>
</section>
                     
<script type="text/javascript">
    function class_section(clase_id) {
      window.location.href = '<?php echo base_url(); ?>index.php?profesor/tema/' + clase_id;
    }
</script>