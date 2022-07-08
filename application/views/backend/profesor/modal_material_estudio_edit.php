<?php
$clase_info = $this->db->get( 'clase' )->result_array();
$unico_material_estudio_info = $this->db->get_where( 'documento', array( 'documento_id' => $param2 ) )->result_array();
foreach ( $unico_material_estudio_info as $row ) {
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<form role="form" class="form-horizontal form-bordered" action="<?php echo base_url(); ?>index.php?profesor/material_estudio/actualizar/<?php echo $row['documento_id'] ?>" method="post" enctype="multipart/form-data">
					<div class="panel-heading">
						<h4 class="panel-title">
							Editar Material de Estudio
						</h4>
					</div>

					<div class="panel-body">

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">
								Fecha
							</label>

							<div class="col-sm-7">
								<input type="text" name="timestamp" class="form-control" data-plugin-datepicker data-plugin-options='{ "format": "D, dd MM yyyy"}' placeholder="fecha Aquí" value="<?php echo date(" d M, Y ", $row['timestamp']); ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">
								Título
							</label>

							<div class="col-sm-7">
								<input type="text" name="titulo" class="form-control" id="field-1" value="<?php echo $row['titulo']; ?>">
							</div>
						</div>

						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">
								Descripción
							</label>

							<div class="col-sm-7">
								<textarea name="descripcion" class="form-control" rows="3">
									<?php echo $row['descripcion']; ?>
								</textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="field-ta" class="col-sm-3 control-label">
								Clase
							</label>

							<div class="col-sm-7">
								<select name="clase_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" id="clase_id" onchange="return get_clase_tema(this.value)">
									<option value="">
										Seleccionar Clase
									</option>
									<?php foreach ($clase_info as $row2) { ?>
									<option value="<?php echo $row2['clase_id']; ?>" <?php if ($row[ 'clase_id'] == $row2[ 'clase_id']) echo 'selected'; ?>><?php echo $row2['nombre']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="field-2" class="col-sm-3 control-label">
								Curso
							</label>
							<div class="col-sm-7">
								<select name="tema_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" id="tema_selector_holder">
									<?php
									$tema = $this->db->get_where( 'tema', array( 'clase_id' => $row[ 'clase_id' ] ) )->result_array();
									foreach ( $tema as $row2 ) {
									?>
									<option value="<?php echo $row2['tema_id']; ?>" <?php if ($row[ 'tema_id'] == $row2[ 'tema_id']) echo 'selected'; ?>><?php echo $row2['nombre']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>

					<footer class="panel-footer">
						<div class="row">
							<div class="col-sm-9 col-sm-offset-3">
								<button type="submit" class="btn btn-success">
									Actualizar
								</button>
							</div>
						</div>
					</footer>
				</form>
			</div>

		</div>
	</div>
	<?php } ?>

	<script type="text/javascript">
		function get_clase_tema( clase_id ) {

			$.ajax( {
				url: '<?php echo base_url(); ?>index.php?profesor/get_clase_tema/' + clase_id,
				success: function ( response ) {
					jQuery( '#tema_selector_holder' ).html( response );
				}
			} );

		}
	</script>