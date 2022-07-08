<?php
$edit_data = $this->db->get_where( 'clase', array( 'clase_id' => $param2 ) )->result_array();
foreach ( $edit_data as $row ):
	?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel">
				<div class="panel-heading">
					<h4 class="panel-title">
            		<i class="fa fa-pencil-square"></i>
					Editar Clase
            	</h4>
				
				</div>
				<div class="panel-body">

					<?php echo form_open(base_url() . 'index.php?admin/clase/actualizar/'.$row['clase_id'] , array('class' => 'form-horizontal form-bordered','target'=>'_top'));?>
					<div class="form-group">
						<label class="col-md-3 control-label">
							Nombre
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre'];?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							Nombre numérico
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" name="nombre_numerico" value="<?php echo $row['nombre_numerico'];?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							Profesor
						</label>
						<div class="col-md-7">
							<select data-plugin-selectTwo data-minimum-results-for-search="Infinity" data-width="100%" name="profesor_id" class="form-control populate">
                                <option value="">Seleccionar</option>
                                <?php $profesores= $this->db->get('profesor')->result_array();
                                foreach($profesores as $row2):
                                ?>
                                    <option value="<?php echo $row2[ 'profesor_id'];?>" <?php if($row['profesor_id'] == $row2['profesor_id'])echo 'selected';?>><?php echo $row2['nombre'];?></option>
                                <?php endforeach; ?>
                            </select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-md-7">
							<button type="submit" class="btn btn-primary">
								Editar Clase
							</button>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php
endforeach;
?>