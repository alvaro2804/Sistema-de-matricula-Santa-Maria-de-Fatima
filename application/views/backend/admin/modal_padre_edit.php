<?php
$edit_data = $this->db->get_where( 'padres', array( 'padres_id' => $param2 ) )->result_array();
foreach ( $edit_data as $row ):
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open(base_url() . 'index.php?admin/padres/edit/' . $row['padres_id'] , array('class' => 'form-horizontal form-bordered','id' => 'form', 'enctype' => 'multipart/form-data'));?>
			
			<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-pencil-square"></i>
					Actualizar
            	</h4>
			</div>

			<div class="panel-body">

				<div class="form-group">
					<label class="col-md-3 control-label">
						Nombre
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="nombre" required title="Valor requerido" value="<?php echo $row['nombre'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Email
					</label>
					<div class="col-md-7">
						<input type="email" required class="form-control" name="email" value="<?php echo $row['email'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						Teléfono
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="telefono" value="<?php echo $row['telefono'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						Dirección
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="direccion" value="<?php echo $row['direccion'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						Profesión
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="profesion" value="<?php echo $row['profesion'];?>">
					</div>
				</div>

			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-primary">
							Actualizar
						</button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>
	</div>
</div>
<?php endforeach;?>