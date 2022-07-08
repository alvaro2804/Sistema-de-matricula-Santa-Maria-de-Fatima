<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open(base_url() . 'index.php?admin/usuario_plan_estudio', array(
                    'class' => 'form-horizontal form-bordered', 'id' => 'form', 'target' => '_top', 'enctype' => 'multipart/form-data' ));?>
                    
			<div class="panel-heading">
				<h4 class="panel-title">
                    <i class="fa fa-plus-circle"></i>
                    Cargar Plan de Estudio Escolar
                </h4>
			</div>
			
			<div class="panel-body">
				<div class="form-group">
					<label class="col-md-3 control-label">
						Título <span class="required">*</span>
					</label>
					<div class="col-md-7">
						<input type="text" class="form-control" name="titulo" required title="Valor Requerido"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Descripcón
					</label>
					<div class="col-md-7">
						<textarea class="form-control" name="descripcion"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Clase<span class="required">*</span>
					</label>
					<div class="col-md-7">
						<select class="form-control" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" name="clase_id" id="clase_id" required title="Valor Requerido" onchange="return get_clase_tema(this.value)">
							<option value="">Seleccionar</option>
							<?php $clases = $this->db->get( 'clase' )->result_array();
							  foreach ( $clases as $row ):
							?>
							<option value="<?php echo $row['clase_id']; ?>"><?php echo $row['nombre']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">
						Curso<span class="required">*</span>
					</label>
					<div class="col-md-7">
						<select name="tema_id" class="form-control" data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" id="tema_selector" required title="Valor Requerido">
							<option value="">Seleccione Primero la Clase</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">Subir Archivo <span class="required">*</span></label>
					<div class="col-md-7">
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input" style="width: 45%">
									<i class="fa fa-file fileupload-exists"></i>
									<span class="fileupload-preview"></span>
								</div>
								<span class="btn btn-default btn-file">
																<span class="fileupload-exists">Cambiar</span>
							

								<span class="fileupload-new">Seleccionar Archivo</span>
								<input type="file" required title=" " name="file_name"/>
								</span>
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Eliminar</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-primary">
                            <i class="fa fa-upload"></i>Subir Archivo
                        </button>
					
					</div>
				</div>
			</footer>
			<?php echo form_close(); ?>

		</section>
	</div>
</div>

<script type="text/javascript">
	function get_clase_tema( clase_id ) {

		$.ajax( {
			url: '<?php echo base_url(); ?>index.php?admin/get_tema/' + clase_id,
			success: function ( response ) {
				jQuery( '#tema_selector' ).html( response );
			}
		} );

	}
</script>