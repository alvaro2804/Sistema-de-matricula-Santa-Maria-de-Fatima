<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<?php echo form_open(base_url() . 'index.php?admin/padres/create/' , array('class' => 'form-horizontal form-bordered','id' => 'form', 'enctype' => 'multipart/form-data'));?>

			<div class="panel-heading">
				<h4 class="panel-title">
            		<i class="fa fa-plus-circle"></i>
					Añadir Padres
            	</h4>
			
			</div>
			<div class="panel-body">

				<div class="form-group">
					<label class="col-md-3 control-label">
						Nombre <span class="required">*</span>
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="nombre" required title="Valor requerido" autofocus value="">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-3 control-label">
						Email<span class="required">*</span>
					</label>
					<div class="col-md-7">
						<input type="email" class="form-control" name="email" required title="Valor requerido" value="">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						Contraseña<span class="required">*</span>
					</label>

					<div class="col-md-7">
						<input type="password" class="form-control" name="password" required title="Valor requerido" value="">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						Telefono
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="telefono" value="">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						Dirección
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="direccion" value="">
					</div>
				</div>

				<div class="form-group">
					<label for="field-2" class="col-md-3 control-label">
						Profesión
					</label>

					<div class="col-md-7">
						<input type="text" class="form-control" name="profesion" value="">
					</div>
				</div>

			</div>
			<footer class="panel-footer">
				<div class="row">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-primary">
							Añadir Padres
						</button>
					</div>
				</div>
			</footer>
			<?php echo form_close();?>
		</section>
	</div>
</div>