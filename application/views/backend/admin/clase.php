<section class="panel">
	<div class="panel-body">
		<div class="tabs">

			<!--- INICIO CONTROL TABS -->
			<ul class="nav nav-tabs tabs-primary">
				<li class="active">
					<a href="#list" data-toggle="tab"><i class="fa fa-list"></i> 
					Lista de Clases
                    </a>
				</li>
				<li>
					<a href="#add" data-toggle="tab"><i class="fa fa-plus-circle"></i>
					Agregar Clase
                    </a>
				</li>
			</ul>
			
			<!-- FIN CONTROL TABS-->
			<div class="tab-content">
			
				<!--TABLA LISTA INICIO-->
				<div class="tab-pane box active" id="list">

					<table class="table table-bordered table-striped table-condensed mb-none" id="datatable-tabletools">
						<thead>
							<tr>
								<th>
									<div>#</div>
								</th>
								<th>
									<div>
										Nombre de Clase
									</div>
								</th>
								<th>
									<div>
										Nombre numérico
									</div>
								</th>
								<th>
									<div>
										Profesor
									</div>
								</th>
								<th class="no-sorting">
									<div>
										Opciones
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $count = 1;foreach($clases as $row):?>
							<tr>
								<td>
									<?php echo $count++;?>
								</td>
								<td>
									<?php echo $row['nombre'];?>
								</td>
								<td>
									<?php echo $row['nombre_numerico'];?>
								</td>
								<td>
									<?php
									if ( $row[ 'profesor_id' ] != '' || $row[ 'profesor_id' ] != 0 )
										echo $this->crud_model->get_type_name_by_id( 'profesor', $row[ 'profesor_id' ] );
									?>
								</td>
								<td>
									<!-- EDITAR LINK -->
									<a href="#" class="btn btn-primary btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Editar Clase" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_clase/<?php echo $row['clase_id'];?>');">
                                    <i class="fa fa-pencil"></i>
								    </a>
								
									<!-- ELIMINAR LINK -->
									<a href="#" class="btn btn-danger btn-xs" data-placement="top" data-toggle="tooltip" data-original-title="Borrar" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/clase/eliminar/<?php echo $row['clase_id'];?>');">
                                    <i class="fa fa-trash"></i>
                                    </a>
								

								</td>
							</tr>
							<?php endforeach;?>
						</tbody>
					</table>
				</div>
				<!----TABLE LISTA FIN--->


				<!----CREACION DE INICIO ---->
				<div class="tab-pane box" id="add" style="padding: 5px">
					<div class="box-content">
						<?php echo form_open(base_url() . 'index.php?admin/clase/create' , array('class' => 'form-horizontal ','id' => 'form','target'=>'_top'));?>
						<div class="padded">
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Nombre <span class="required">*</span>
								</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="nombre" required title="Valor Requerido"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Nombre numérico<span class="required">*</span>
								</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="nombre_numerico" required title="Valor Requerido"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">
									Profesor
								</label>
								<div class="col-sm-5">
									<select data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" name="profesor_id" class="form-control populate">
										<option value="">Seleccione Profesor</option>
										<?php $profesores = $this->db->get('profesor')->result_array();
										 foreach($profesores as $row):
										?>
										<option value="<?php echo $row['profesor_id'];?>"><?php echo $row['nombre'];?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
						<br/>
						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="mb-xs mt-xs mr-xs btn btn-primary">
									Agregar Clase
								</button>
							</div>
						</div>
						</form>
					</div>
				</div>
				<!--FIN-->
			</div>
		</div>
	</div>
</section>

