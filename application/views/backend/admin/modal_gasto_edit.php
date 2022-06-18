<?php 
	$edit_data	=	$this->db->get_where('pago' , array(
		'pago_id' => $param2
	))->result_array();
	foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
		<?php echo form_open(base_url() . 'index.php?admin/gasto/edit/' . $row['pago_id'] , array('class' => 'form-horizontal form-bordered validate', 'enctype' => 'multipart/form-data'));?>
        	<div class="panel-heading">
            	<h4 class="panel-title" >
            		<i class="fa fa-pencil-square"></i>
					Edición de Gastos
            	</h4>
            </div>
			<div class="panel-body">
				
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Título</label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="titulo" required title="Valor Requerido" 
							value="<?php echo $row['titulo'];?>" >
						</div>
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label">Categoría</label>
                        <div class="col-sm-6">
                            <select name="gastos_categoria_id" class="form-control" required data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value="">Seleccione una Categoría</option>
                                <?php 
                                	$categorias = $this->db->get('gastos_categoria')->result_array();
                                	foreach ($categorias as $row2):
                                ?>
                                <option value="<?php echo $row2['gastos_categoria_id'];?>"
                                	<?php if ($row['gastos_categoria_id'] == $row2['gastos_categoria_id'])
                                		echo 'selected';?>>
                                			<?php echo $row2['nombre'];?>
                                				</option>
                            <?php endforeach;?>
                            </select>
                        </div>
                    </div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">Descripción</label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="descripcion" value="<?php echo $row['descripcion'];?>" >
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label">Monto</label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="monto" value="<?php echo $row['monto'];?>" 
                                required title="Valor Requerido">
						</div> 
					</div>

					<div class="form-group">
                        <label class="col-sm-3 control-label">Método</label>
                        <div class="col-sm-6">
                            <select name="metodo" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                                <option value="1" <?php if ($row['metodo'] == 1) echo 'selected';?>>Efectivo</option>
                                <option value="2" <?php if ($row['metodo'] == 2) echo 'selected';?>>Depósito</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Fecha</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" data-plugin-datepicker name="timestamp"
                            value="<?php echo date('d M,Y', $row['timestamp']);?>"
                                required title="Valor Requerido" />
                        </div>
                    </div>
            </div>
            
			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</div>
				</div>
			</footer>
			
			<?php echo form_close();?>         
            
        </section>
    </div>
</div>

<?php endforeach;?>