<section class="panel panel-featured panel-featured-primary">
	<header class="panel-heading">
		<a href="javascript:;" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_tema_add/');" class="btn btn-primary btn-sm">
        <i class="fa fa-plus-circle"></i>
        Añadir Tema / Asignaturas
        </a>
	</header>
	<div class="panel-body">
	
		<?php
		$query = $this->db->get( 'clase' );
		$clase = $query->result_array();
		?>

		<div class="form-group">
			<label class="col-sm-6 col-sm-offset-3 control-label" style="margin-bottom: 5px; text-align:  center;">
				Clase
			</label>
			<div class="col-sm-6 col-sm-offset-3">
				<select data-plugin-selectTwo class="form-control populate" name="clase_id" onchange="class_section(this.value)" style="width: 100%">
					<option value="">
						Seleccionar Clase
					</option>
					<?php foreach ($clase as $row): ?>
					<option value="<?php echo $row['clase_id']; ?>" <?php if ($clase_id == $row[ 'clase_id']) echo 'selected'; ?> >
						<?php echo $row['nombre']; ?>
					</option>
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
			<!------ INICIO CONTROL TABS ------>
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					Lista de Temas
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
								<th>
									<div>
										Opciones
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
								<td>

									<!-- EDITAR LINK -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_tema/<?php echo $row['tema_id'];?>');">
                                      <i class="fa fa-pencil"></i>
                                    </a>
								
									<!-- ELIMINAR LINK -->
									<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/tema/eliminar/<?php echo $row['tema_id'];?>/<?php echo $clase_id;?>');">
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
		<?php endif;?>
	</div>
</section>
                     
<script type="text/javascript">
    function class_section(clase_id) {

      window.location.href = '<?php echo base_url(); ?>index.php?admin/tema/' + clase_id;

    }
</script>