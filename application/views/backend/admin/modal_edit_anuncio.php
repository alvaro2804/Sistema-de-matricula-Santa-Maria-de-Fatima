<?php 
$edit_data = $this->db->get_where('anuncio' , array('anuncio_id' => $param2) )->result_array();
?>
<section class="panel">
        <?php foreach($edit_data as $row):?>
        <?php echo form_open(base_url(). 'index.php?admin/anuncio/actualizar/'.$row['anuncio_id'] , array('class' => 'form-horizontal form-bordered validate'));?>
	
	<div class="panel-heading">
		<h4 class="panel-title">
			<i class="fa fa-pencil-square"></i>
			Editar Anuncio
		</h4>
	</div>
	
		<div class="panel-body">
			<div class="padded">
				<div class="form-group">
					<label class="col-sm-3 control-label">Título</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" name="anuncio_titulo" value="<?php echo $row['anuncio_titulo'];?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Anuncio</label>
					<div class="col-sm-5">
						<div class="box closable-chat-box">
							<div class="box-content padded">
									<div class="chat-message-box">
									<textarea name="anuncio" id="ttt" rows="5" class="form-control"
										placeholder="Añadir Anuncio"><?php echo $row['anuncio'];?></textarea>
									</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Fecha</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" data-plugin-datepicker name="crear_timestamp" value="<?php echo date('m/d/Y',$row['crear_timestamp']);?>"/>
					</div>
				</div>

				
			</div>
		</div>
    
	<footer class="panel-footer">
	<div class="row">
	<div class="col-sm-9 col-sm-offset-3">
	<button type="submit" class="btn btn-primary">Editar Anuncio</button>
	</div>
	</div>
	</footer>
  </form>
  <?php endforeach;?>
  
</section>