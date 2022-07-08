<?php
$query = $this->db->get_where( 'seccion', array( 'clase_id' => $clase_id ) );
if ( $query->num_rows() > 0 ):
	$secciones = $query->result_array();
?>

<div class="form-group">
	<label class="col-sm-3 control-label">
		Sección <span class="required">*</span>
	</label>
	<div class="col-sm-5">
		<select name="seccion_id" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" required class="form-control populate">
			<?php
			foreach ( $secciones as $row ):
				?>
			<option value="<?php echo $row['seccion_id'];?>"><?php echo $row['nombre'];?></option>
			<?php endforeach;?>
		</select>
	</div>
</div>

<div class="form-group">
	<label class="col-sm-3 control-label">
		Tema <span class="required">*</span>
	</label>
	<div class="col-sm-5">
		<select name="tema_id" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" required class="form-control populate">
			<?php
			$temas = $this->db->get_where( 'tema', array( 'clase_id' => $clase_id ) )->result_array();
			foreach ( $temas as $row ):
				?>
			<option value="<?php echo $row['tema_id'];?>"><?php echo $row['nombre'];?></option>
			<?php endforeach;?>
		</select>
	</div>
</div>
<?php endif;?>

<div class="form-group"></div>

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