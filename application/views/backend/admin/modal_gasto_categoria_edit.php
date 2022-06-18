<?php 
	$edit_data	=	$this->db->get_where('gastos_categoria' , array(
		'gastos_categoria_id' => $param2
	))->result_array();
	foreach ($edit_data as $row):
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
          <?php echo form_open(base_url() . 'index.php?admin/gasto_categoria/edit/' . $row['gastos_categoria_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
        	<div class="panel-heading">
            	<h4 class="panel-title" >
            		<i class="fa fa-pencil-square"></i>
					Edición de Gastos
            	</h4>
            </div>
			<div class="panel-body">
				
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Nombre</label>
                        
						<div class="col-sm-6">
							<input type="text" class="form-control" name="nombre" required title="Valor Requerido" value="<?php echo $row['nombre'];?>">
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