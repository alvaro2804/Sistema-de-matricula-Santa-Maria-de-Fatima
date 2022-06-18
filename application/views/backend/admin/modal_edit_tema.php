<?php
   $edit_data = $this->db->get_where( 'tema', array( 'tema_id' => $param2 ) )->result_array();
   foreach ( $edit_data as $row ):
?>
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<?php echo form_open(base_url() . 'index.php?admin/tema/actualizar/'.$row['tema_id'] , array('class' => 'form-horizontal form-bordered', 'id' => 'form', 'target'=>'_top'));?>
				<div class="panel-heading">
					<h4 class="panel-title">
            		<i class="fa fa-plus-circle"></i>
					Editar Tema / Asignatura
            	</h4>
				
				</div>
				<div class="panel-body">

					<div class="form-group">
						<label class="col-md-3 control-label">
							Nombre
						</label>
						<div class="col-md-7">
							<input type="text" class="form-control" required name="nombre" value="<?php echo $row['nombre'];?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							Clase
						</label>
						<div class="col-md-7">
							<select data-plugin-selectTwo name="clase_id" required class="form-control populate" style="width: 100%">
							<?php $clases = $this->db->get('clase')->result_array();
                            foreach($clases as $row2):
                            ?>
								<option value="<?php echo $row2['clase_id'];?>" <?php if($row[ 'clase_id'] == $row2[ 'clase_id'])echo 'selected';?>><?php echo $row2['nombre'];?></option>
								<?php
								endforeach;
								?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label">
							Profesor
						</label>
						<div class="col-md-7">
							<select data-plugin-selectTwo name="profesor_id" class="form-control populate" style="width: 100%">
								<option value=""></option>
							<?php $profesores = $this->db->get('profesor')->result_array();
                            foreach($profesores as $row2):
                            ?>
								<option value="<?php echo $row2['profesor_id'];?>" <?php if($row[ 'profesor_id'] == $row2[ 'profesor_id'])echo 'selected';?>><?php echo $row2['nombre'];?></option>
								<?php
								endforeach;
								?>
							</select>
						</div>
					</div>

				</div>
				<footer class="panel-footer">
					<div class="row">
						<div class="col-sm-9 col-sm-offset-3">
							<button type="submit" class="btn btn-primary">
								Editar Tema / Asignatura
							</button>
						</div>
					</div>
				</footer>
				</form>
			</section>
		</div>
	</div>

<?php
  endforeach;
?>