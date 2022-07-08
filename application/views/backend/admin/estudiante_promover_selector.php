<div class="row" style="text-align: center;">
	<div class="col-sm-4"></div>
		<div class="col-sm-4 mb-lg mt-lg">
			<div class="tile-box tile-pvs-color">
			<div class="icon"><i class="fa fa-users"></i></div>
			<h3>Los Estudiantes de la Clase <?php echo $this->db->get_where('clase' , array('clase_id' => $clase_id_de))->row()->nombre;?></h3>                              
			</div>
		</div>
	<div class="col-sm-4"></div>
</div>

<div class="row">
	<div class="col-md-12">
	<div class="table-responsive">
		<table class="table table-bordered table-striped table-condensed mb-none">
			<thead align="center">
				<tr>
					<td align="center">Nombre</td >
					<td align="center">Sección</td >
					
					<td class="hidden-xs hidden-sm" align="center">Información</td >
					<td align="center">Opciones</td >
				</tr>
			</thead>
			<tbody>
			<?php 
				$estudiantes = $this->db->get_where('inscribirse' , array(
					'clase_id' => $clase_id_de , 'year' => $running_year
				))->result_array();
				foreach($estudiantes as $row):
					$query = $this->db->get_where('inscribirse' , array(
						'estudiante_id' => $row['estudiante_id'],
							'year' => $promover_year
						));
			?>
				<tr>
					
					<td align="center">
						<?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->nombre;?>
					</td>
					<td align="center">
						<?php if($row['seccion_id'] != '' && $row['seccion_id'] != 0)
								echo $this->db->get_where('seccion' , array('seccion_id' => $row['seccion_id']))->row()->nombre;
						?>
					</td>
					
					<td class="hidden-xs hidden-sm" align="center">
					<button type="button" class="mr-xs btn btn-default"
						onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_estudiante_promover_rendimiento/<?php echo $row['estudiante_id'];?>/<?php echo $clase_id_de;?>');">
						<i class="fa fa-eye"></i>Ver Rendimiento Académico
					</button>	
					</td>
					<td align="center">
						<?php if($query->num_rows() < 1):?>
							<select class="form-control" name="promover_status_<?php echo $row['estudiante_id'];?>" id="promover_status" data-plugin-selectTwo data-width="100%" data-plugin-options='{ "minimumResultsForSearch": -1 }'>
								<option value="<?php echo $clase_id_para;?>"><?php echo 'Para Inscribirse' ." - ". $this->crud_model->get_class_name($clase_id_para);?></option>
								<option value="<?php echo $clase_id_de;?>"><?php echo 'Para Inscribirse' ." - ". $this->crud_model->get_class_name($clase_id_de);?></option>
							</select>
						<?php endif;?>
						<?php if($query->num_rows() > 0):?>
							<a class="btn btn-info btn-sm">
								<i class="fa fa-check"></i>Estudiante ya Inscrito
							</a>
						<?php endif;?>
					</td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
	</div>
</div>
<br>
<div class="row">
	<center>
		<button type="submit" class="btn btn-success">
			<i class="fa fa-check"></i> Promover a los Estudiantes Seleccionados
		</button>
	</center>
</div>

<script type="text/javascript">
    $(document).ready(function() {

	if ( $.isFunction($.fn[ 'select2' ]) ) {

		$(function() {
			$('[data-plugin-selectTwo]').each(function() {
				var $this = $( this ),
					opts = {};

				var pluginOptions = $this.data('plugin-options');
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginSelect2(opts);
			});
		});

	}
   
    });
    
</script>