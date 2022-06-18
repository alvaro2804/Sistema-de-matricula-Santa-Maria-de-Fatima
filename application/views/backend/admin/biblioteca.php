<div class="row">
	<div class="col-md-12">

		<!--CONTROL TABS INICIO-->
		<div class="tabs">
		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
					Lista de Libros
				</a>
			</li>
			<li>
				<a href="#add" data-toggle="tab"><i class="fa fa-plus-circle"></i>
                Añadir Nuevo Libro
				</a>
			</li>
		</ul>
		<!--CONTROL TABS FIN-->

		<div class="tab-content">
		<br>
			<!--INICIO LISTA TABLA-->
			<div class="tab-pane box active" id="list">

			   <table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools">
					<thead>
						<tr>
							<th><div>#</div></th>
							<th><div>Nombre del Libro</div></th>
							<th><div>Autor</div></th>
							<th><div>Descripción</div></th>
							<th><div>Precio</div></th>
							<th><div>Clase</div></th>
							<th><div>Estado</div></th>
							<th><div>Opciones</div></th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 1;foreach($libros as $row):?>
						<tr>
							<td><?php echo $count++;?></td>
							<td><?php echo $row['nombre'];?></td>
							<td><?php echo $row['autor'];?></td>
							<td><?php echo $row['descripcion'];?></td>
							<td><?php echo $row['precio'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('clase',$row['clase_id']);?></td>
							<td><span class="label label-<?php if($row['status']=='disponible')echo 'success';else echo 'danger';?>"><?php echo $row['status'];?></span></td>
							<td>

								<!-- EDITAR LINK -->
								<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Editar" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_libro/<?php echo $row['libro_id'];?>');">
								<i class="fa fa-pencil"></i>
								</a>

								<!-- ELIMINAR LINK -->
								<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/biblioteca/eliminar/<?php echo $row['libro_id'];?>');">
								<i class="fa fa-trash"></i>
								</a>

							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
			<!--FIN LISTA TABLA-->


			<!--INICIO DEL FORMULARIO DE CREACIÓN-->
			<div class="tab-pane box" id="add" style="padding: 5px">
				<div class="box-content">
					<?php echo form_open(base_url() . 'index.php?admin/biblioteca/create' , array('class' => 'form-horizontal form-bordered','id'=>'form'));?>
							<div class="form-group">
								<label class="col-sm-3 control-label">Nombre <span class="required">*</span></label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="nombre"
									   required title="Valor Requerido"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Autor</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="autor"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Descripción</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="descripcion"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Precio</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="precio"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Clase <span class="required">*</span></label>
								<div class="col-sm-5">
									<select name="clase_id" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
										<?php 
										$clases = $this->db->get('clase')->result_array();
										foreach($clases as $row):
										?>
											<option value="<?php echo $row['clase_id'];?>"><?php echo $row['nombre'];?></option>
										<?php
										endforeach;
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Estado</label>
								<div class="col-sm-5">
									<select name="status" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
										<option value="disponible">Disponible</option>
										<option value="no-disponible">No Disponible</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
							  <div class="col-sm-offset-3 col-sm-5">
								  <button type="submit" class="btn btn-primary">Añadir Libro</button>
							  </div>
							</div>
					</form>                
				</div>                
			</div>
			<!---FIN DE CREACIÓN DE FORMULARIO-->

		</div>
	</div>
</div>
</div>