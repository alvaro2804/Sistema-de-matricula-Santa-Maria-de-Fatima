<?php
		$query = $this->db->get_where('seccion' , array('clase_id' => $class_id));
		if($query->num_rows() > 0): 
			$section_id = $this->db->get_where('clase_rutina' , array('clase_rutina_id' => $class_routine_id))->row()->seccion_id;
			$sections   = $query->result_array();
	?>

	<div class="form-group">
		<label class="col-sm-3 control-label">Sección</label>
		<div class="col-sm-6">
			<select name="seccion_id" data-plugin-selectTwo required class="form-control populate">
				<option value="">Seleccione Seccion</option>
				<?php foreach($sections as $section):?>
				<option value="<?php echo $section['seccion_id'];?>"
					<?php if($section['seccion_id'] == $section_id) echo 'selected';?>>
						<?php echo $section['nombre'];?>
					</option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<?php endif;?>

	<?php
		$subject_id = $this->db->get_where('clase_rutina' , array('clase_rutina_id' => $class_routine_id))->row()->tema_id;
	?>
	<div class="form-group">
		<label class="col-sm-3 control-label">Tema</label>
		<div class="col-sm-6">
			<select name="tema_id" data-plugin-selectTwo required class="form-control populate">
				<option value="">Seleccione Tema</option>
				<?php 
					$subjects = $this->db->get_where('tema' , array('clase_id' => $class_id))->result_array();
					foreach($subjects as $subject):
				?>
				<option value="<?php echo $subject['tema_id'];?>"
					<?php if($subject['tema_id'] == $subject_id) echo 'selected';?>>
						<?php echo $subject['nombre'];?>
					</option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<div class="form-group"> </div>

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

