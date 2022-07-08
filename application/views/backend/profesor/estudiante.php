<?php
   $query = $this->db->get( 'clase' );
   $clase = $query->result_array();
?>

<section class="panel panel-featured panel-featured-primary">

	<div class="panel-body">

		<div class="form-group">
			<label class="col-sm-6 col-sm-offset-3 control-label" style="margin-bottom: 5px; text-align: center;">
				Seleccione Clase para mostrar Alumnos
			</label>
			<div class="col-sm-6 col-sm-offset-3">
				<select data-plugin-selectTwo class="form-control populate" name="clase_id" onchange="class_section(this.value)" style="width: 100%">
					<option value="">Seleccionar Clase</option>
					<?php foreach ($clase as $row): ?>
					<option value="<?php echo $row['clase_id']; ?>" <?php if ($clase_id == $row[ 'clase_id']) echo 'selected'; ?>><?php echo $row['nombre']; ?></option>
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
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#home" data-toggle="tab">
                    <span class="visible-xs"><i class="fa fa-users"></i></span>
                    <span class="hidden-xs">Todos los Estudiantes</span>
					</a>
				</li>

				<?php 
                  foreach ($secciones as $row):
                ?>
				<li>
					<a href="#<?php echo $row['seccion_id'];?>" data-toggle="tab">
                    <span class="visible-xs"><i class="fa fa-user"></i></span>
                    <span class="hidden-xs">Sección <?php echo $row['nombre'];?> ( <?php echo $row['nick_nombre'];?> )</span>
					</a>
				</li>
				<?php endforeach;?>
			</ul>
			<div class="tab-content">
				<div id="home" class="tab-pane active">
					<table class="table table-bordered table-striped mb-none" id="render-data" >
						<thead>
							<tr>
								<th width="80">
									<div>
										Roll
									</div>
								</th>
								<th width="80">
									<div>
										Foto
									</div>
								</th>
								<th>
									<div>
										Nombre
									</div>
								</th>
								<th class="hidden-xs hidden-sm">
									<div>
										Dirección
									</div>
								</th>
								<th>
									<div>
										Email
									</div>
								</th>
								<th class="no">
									<div>
										Opciones
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php 
                                $estudiantes   =   $this->db->get_where('inscribirse' , array(
                                    'clase_id' => $clase_id , 'year' => $running_year
                                ))->result_array();
                                foreach($estudiantes as $row):?>
							<tr>
								<td>
									<?php echo $row['roll'];?>
								</td>
								<td class="center"><img src="<?php echo $this->crud_model->get_image_url('estudiante',$row['estudiante_id']);?>" width="30"/>
								</td>
								<td>
									<?php 
                                    echo $this->db->get_where('estudiante' , array(
                                        'estudiante_id' => $row['estudiante_id']
                                    ))->row()->nombre;
                                ?>
								</td>
								<td class="hidden-xs hidden-sm">
									<?php 
                                    echo $this->db->get_where('estudiante' , array(
                                        'estudiante_id' => $row['estudiante_id']
                                    ))->row()->direccion;
                                ?>
								</td>
								<td>
									<?php 
                                    echo $this->db->get_where('estudiante' , array(
                                        'estudiante_id' => $row['estudiante_id']
                                    ))->row()->email;
                                ?>
								</td>
								<td>

									<!-- ESTUDIANTE HOJA DE CALIFICACIÓN LINK  -->
									<a href="<?php echo base_url();?>index.php?profesor/estudiante_hoja_calificacion/<?php echo $row['estudiante_id'];?>" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Hoja de Calificación">
                                    <i class="fa fa-signal"></i>
                                    </a>

									<!-- ESTUDIANTE PERFIL LINK -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Datos del Estudiante" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_estudiante_perfil/<?php echo $row['estudiante_id'];?>');">
                                    <i class="fa fa-user"></i>
                                    </a>
                                    
								
								
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>

				<?php 
                    $query = $this->db->get_where('seccion' , array('clase_id' => $clase_id));
                    if ($query->num_rows() > 0):
                        $secciones = $query->result_array();
                        foreach ($secciones as $row):
                ?>

				<div id="<?php echo $row['seccion_id'];?>" class="tab-pane">
					<table class="table table-bordered table-striped table-condensed mb-none" id="render-data2">
						<thead>
							<tr>
								<th width="80">
									<div>
										N°
									</div>
								</th>
								<th width="80">
									<div>
										Foto
									</div>
								</th>
								<th>
									<div>
										Nombre
									</div>
								</th>
								<th class="hidden-xs hidden-sm">
									<div>
										Dirección
									</div>
								</th>
								<th class="hidden-xs hidden-sm">
									<div>
										Email
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
							<?php 
                                $estudiantes   =   $this->db->get_where('inscribirse' , array(
                                    'clase_id'=>$clase_id , 'seccion_id' => $row['seccion_id'] , 'year' => $running_year
                                ))->result_array();
                                foreach($estudiantes as $row):?>
							<tr>
								<td>
									<?php echo $row['roll'];?>
								</td>
								<td class="center"><img src="<?php echo $this->crud_model->get_image_url('estudiante',$row['estudiante_id']);?>" width="30"/>
								</td>
								<td>
									<?php 
                                    echo $this->db->get_where('estudiante' , array(
                                        'estudiante_id' => $row['estudiante_id']
                                    ))->row()->nombre;
                                ?>
								</td>
								<td class="hidden-xs hidden-sm">
									<?php 
                                    echo $this->db->get_where('estudiante' , array(
                                        'estudiante_id' => $row['estudiante_id']
                                    ))->row()->direccion;
                                ?>
								</td>
								<td class="hidden-xs hidden-sm">
									<?php 
                                    echo $this->db->get_where('estudiante' , array(
                                        'estudiante_id' => $row['estudiante_id']
                                    ))->row()->email;
                                ?>
								</td>
								<td>

									<!-- ESTUDIANTE PERFIL LINK -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Datos del Estudiante" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_estudiante_perfil/<?php echo $row['estudiante_id'];?>');">
                                    <i class="fa fa-user"></i>
                                    </a>
								
								
								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>

				<?php endforeach;?>
				<?php endif;?>

			</div>
		</div>
		<?php endif;?>
	</div>
</section>

<script type="text/javascript">
	function class_section( clase_id ) {
		window.location.href = '<?php echo base_url(); ?>index.php?profesor/estudiante/' + clase_id;
	}
</script>
<script type="text/javascript">

jQuery(document).ready(function() {
jQuery('#render-data,#render-data2').DataTable({

rowReorder: {
selector: 'td:nth-child(2)'
},
responsive: true,

"paging": true,
"processing": true,

dom: 'lBfrtip',
buttons: [
'excel', 'csv', 'pdf', 'print', 'copy',
],
"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
} );
} );
        
</script>