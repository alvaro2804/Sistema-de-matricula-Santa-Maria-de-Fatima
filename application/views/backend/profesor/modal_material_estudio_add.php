<?php $clase_info = $this->db->get('clase')->result_array(); ?>
<div class="row">
    <div class="col-md-12">

        <div class="panel">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Añadir Material de Estudio
                </h4>
            </div>

            <div class="panel-body">

                <?php echo form_open(base_url() . 'index.php?profesor/material_estudio/create', array('class' => 'form-horizontal form-bordered validate', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Fecha <span class="required">*</span></label>
                    <div class="col-sm-7">
                        <input type="text" name="timestamp" class="form-control" data-plugin-datepicker data-plugin-options='{ "format": "D, dd MM yyyy"}' required title="Valor Requerido"
                               placeholder="Seleccione Fecha">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">Título <span class="required">*</span></label>

                    <div class="col-sm-7">
                        <input type="text" name="titulo" class="form-control" id="field-1" required title="Valor Requerido">
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label">Descripción</label>

                    <div class="col-sm-7">
                        <textarea name="descripcion" class="form-control" id="field-ta" ></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label">Clase <span class="required">*</span></label>

                    <div class="col-sm-7">
                        <select name="clase_id" class="form-control" id="clase_id" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" onchange="return get_clase_tema(this.value)" required title="Valor Requerido">
                            <option value="">Seleccionar</option>
                            <?php foreach ($clase_info as $row) { ?>
                                <option value="<?php echo $row['clase_id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label">Curso<span class="required">*</span></label>
                    <div class="col-sm-7">
                        <select name="tema_id" class="form-control" id="tema_selector_holder" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="Valor Requerido">
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
								<input type="file" required title=" " name="titulo_nombre"/>
								</span>
								<a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload">Eliminar</a>
							</div>
						</div>
					</div>
				</div>

                <div class="form-group">
                    <label for="field-ta" class="col-sm-3 control-label">Tipo de Archivo<span class="required">*</span></label>

                    <div class="col-sm-7">
                        <select name="file_tipo" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" required title="Valor Requerido">
                            <option value="">Seleccione el Tipo de Archivo</option>
                            <option value="image">Imagen</option>
                            <option value="doc">Documento</option>
                            <option value="pdf">Pdf</option>
                            <option value="excel">Excel</option>
                            <option value="other">Otro</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-3 control-label col-sm-offset-2">
                    <button type="submit" class="btn btn-success">Subir</button>
                </div>
                </form>

            </div>

        </div>

    </div>
</div>

<script type="text/javascript">

    function get_clase_tema(clase_id) {

        $.ajax({
            url: '<?php echo base_url(); ?>index.php?profesor/get_clase_tema/' + clase_id,
            success: function (response)
            {
                jQuery('#tema_selector_holder').html(response);
            }
        });

    }

</script>