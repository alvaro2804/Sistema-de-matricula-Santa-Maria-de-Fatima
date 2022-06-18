<?php
		$query = $this->db->get_where('seccion' , array('clase_id' => $clase_id));
		if($query->num_rows() > 0): 
			$seccion_id = $this->db->get_where('clase_rutina' , array('clase_rutina_id' => $clase_rutina_id))->row()->seccion_id;
			$secciones   = $query->result_array();
	?>

	<div class="form-group">
		<label class="col-sm-3 control-label">Sección</label>
		<div class="col-sm-6">
			<select name="seccion_id" data-plugin-selectTwo required class="form-control populate">
				<option value="">Seleccione Seccion</option>
				<?php foreach($secciones as $seccion):?>
				<option value="<?php echo $seccion['seccion_id'];?>"
					<?php if($seccion['seccion_id'] == $seccion_id) echo 'selected';?>>
						<?php echo $seccion['nombre'];?>
					</option>
				<?php endforeach;?>
			</select>
		</div>
	</div>

	<?php endif;?>

	<?php
		$tema_id = $this->db->get_where('clase_rutina' , array('clase_rutina_id' => $clase_rutina_id))->row()->tema_id;
	?>
	<div class="form-group">
		<label class="col-sm-3 control-label">Tema</label>
		<div class="col-sm-6">
			<select name="tema_id" data-plugin-selectTwo required class="form-control populate">
				<option value="">Seleccione Tema</option>
				<?php 
					$temas = $this->db->get_where('tema' , array('clase_id' => $clase_id))->result_array();
					foreach($temas as $tema):
				?>
				<option value="<?php echo $tema['tema_id'];?>"
					<?php if($tema['tema_id'] == $tema_id) echo 'selected';?>>
						<?php echo $tema['nombre'];?>
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

