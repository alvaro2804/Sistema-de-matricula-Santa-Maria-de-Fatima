<div class="mailbox-email-header mb-lg">
		<h3 class="mailbox-email-subject m-none text-weight-light">
			Mensajes
		</h3>
	</div>

	<?php
	$mensajes = $this->db->get_where('mensaje', array('mensaje_thread_code' => $actual_mensaje_thread_code))->result_array();
	foreach ($mensajes as $row):

	$remitente = explode('-', $row['remitente']);
	$tipo_cuenta_remitente = $remitente[0];
	$remitente_id = $remitente[1];
	?>	
			<div class="mailbox-email-container">
				<div class="mailbox-email-screen">
					<div class="panel">
						<div class="panel-heading">
							<div class="panel-actions">
								<a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
							</div>

							<p class="panel-title"> 
								<img src="<?php echo $this->crud_model->get_image_url($tipo_cuenta_remitente, $remitente_id); ?>" class="img-box-boder" width="30">
								<?php echo $this->db->get_where($tipo_cuenta_remitente, array($tipo_cuenta_remitente . '_id' => $remitente_id))->row()->name; ?>
								<?php echo $this->db->get_where($tipo_cuenta_remitente, array($tipo_cuenta_remitente . '_id' => $remitente_id))->row()->nombre; ?>
							</p>

						</div>
						<div class="panel-body">
							<p> <?php echo $row['mensaje']; ?></p>
						</div>
						<div class="panel-footer">
							<p class="m-none"><small><?php echo date("d M, Y", $row['timestamp']); ?> </small></p>
						</div>
					</div>
				</div>
			</div>

	<?php endforeach; ?>

	<div class="panel">
	 <?php echo form_open(base_url() . 'index.php?estudiante/mensaje/enviar_respuesta/' . $actual_mensaje_thread_code, array('enctype' => 'multipart/form-data', 'id' => 'form')); ?>
		<div class="panel-heading">
			<h4 class="panel-title"> 
			 <i class="fa fa-envelope-o mr-xs"></i>
             Enviar Respuesta
			</h4>
		</div>

		<div class="panel-body">
			<div class="compose">
				<textarea name="mensaje" class="form-control" placeholder="Enviar Respuesta" required title="Valor Requerido" aria-required="true" rows="10" style="height: 200px;"></textarea>
			</div>
		</div>

		<div class="panel-footer">
			<div class="text-right">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-send mr-xs"></i>
					<span>Enviar</span>
				</button>
			</div>
		</div>
	 </form>
	</div>