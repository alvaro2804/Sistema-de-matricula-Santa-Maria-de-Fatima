<div class="row">
	<div class="col-md-12">
		<section class="panel">
       	<?php echo form_open(base_url() . 'index.php?admin/gasto/create/' , array('class' => 'form-horizontal form-bordered validate', 'enctype' => 'multipart/form-data'));?>
        	<div class="panel-heading">
            	<h4 class="panel-title" >
            		<i class="fa fa-plus-circle"></i>
					Añadir Gasto
            	</h4>
            </div>
			<div class="panel-body">
				
					<div class="form-group">
						<label class="col-sm-3 control-label">Título<span class="required">*</span></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="titulo" value="" autofocus required title="Valor Requerido" >
						</div>
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label">Categoría <span class="required">*</span></label>
                        <div class="col-sm-6">
                            <select name="gastos_categoria_id" class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity" title="Valor Requerido">
                                <option value="">Seleccione una Categoría</option>
                                <?php 
                                	$categorias = $this->db->get('gastos_categoria')->result_array();
                                	foreach ($categorias as $row):
                                ?>
                                <option value="<?php echo $row['gastos_categoria_id'];?>"><?php echo $row['nombre'];?></option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Descripción</label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="descripcion" value="" >
						</div> 
					</div>
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Monto <span class="required">*</span></label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="monto" value="" required title="Valor Requerido" >
						</div> 
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label">Método</label>
                        
                        <div class="col-sm-6">
                            <select name="metodo" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value="1">Efectivo</option>
                                <option value="2">Depósito</option>
                               
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fecha <span class="required">*</span></label>
                        
                        <div class="col-sm-6">
                            <input type="text" class="form-control" data-plugin-datepicker name="timestamp" required title="Valor Requerido" />
                        </div>
                    </div>

            </div>
				<footer class="panel-footer">
				<div class="row">
				<div class="col-sm-9 col-sm-offset-3">
				<button type="submit" class="btn btn-primary">Añadir Gasto</button>
				</div>
				</div>
				</footer>
				<?php echo form_close();?>
        </section>
    </div>
</div>