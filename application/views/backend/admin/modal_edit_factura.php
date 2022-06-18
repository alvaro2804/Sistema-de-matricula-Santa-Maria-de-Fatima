<?php 
$edit_data = $this->db->get_where('factura' , array('factura_id' => $param2) )->result_array();
?>
    <section class="panel" id="edit">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url() . 'index.php?admin/factura/actualizar/'.$row['factura_id'], array('class' => 'form-horizontal form-bordered validate','target'=>'_top'));?>
        <div class="panel-heading">
         <h4 class="panel-title" >
          <i class="fa fa-pencil-square"></i>
          Editar Boleta de Venta
         </h4>
        </div>
		<div class="panel-body">

			<div class="form-group">
				<label class="col-sm-3 control-label">Estudiante</label>
				<div class="col-sm-7">
					<select name="estudiante_id" class="form-control" data-plugin-selectTwo data-width="100%" required>
						<?php 
						//$this->db->ORDENAR POR('clase_id','asc');
						$estudiantes = $this->db->get('estudiante')->result_array();
						foreach($estudiantes as $row2):
						?>
							<option value="<?php echo $row2['estudiante_id'];?>"
								<?php if($row['estudiante_id']==$row2['estudiante_id'])echo 'selected';?>>
								<?php
									echo $this->crud_model->get_type_name_by_id('estudiante' , $row2['estudiante_id']);
									$clase_id = $this->db->get_where('inscribirse' , array(
										'estudiante_id' => $row2['estudiante_id'],
											'year' => $this->db->get_where('settings', array('type' => 'running_year'))->row()->description
									))->row()->clase_id;
								?> - 
								 <?php echo $this->crud_model->get_class_name($clase_id);?>
							</option>
						<?php
						endforeach;
						?>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Título</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="titulo" value="<?php echo $row['titulo'];?>"/>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Descripción</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="descripcion" value="<?php echo $row['descripcion'];?>"/>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Monto Total</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" name="monto" value="<?php echo $row['monto'];?>"/>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Estado</label>
				<div class="col-sm-7">
					<select name="status" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
						<option value="pagado" <?php if($row['status']=='pagado')echo 'selected';?>>Pagado</option>
						<option value="debido" <?php if($row['status']=='debido')echo 'selected';?>>Debido</option>
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Fecha</label>
				<div class="col-sm-7">
					<input type="text" class="form-control" data-plugin-datepicker name="date" 
						value="<?php echo date('m/d/Y', $row['creacion_timestamp']);?>"/>
				</div>

			</div>
			
    </div>
		<footer class="panel-footer">
		<div class="row">
		<div class="col-sm-9 col-sm-offset-3">
		<button type="submit" class="btn btn-primary">Editar Boleta</button>
		</div>
		</div>
		</footer>
		</form>
		<?php endforeach;?> 
</section>