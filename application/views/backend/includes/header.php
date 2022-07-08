<!-- Inicio: header -->
<header class="header">
	<div class="logo-container">
		<a href="<?php echo base_url();?>index.php?admin/dashboard" class="logo">
			<img src="uploads/logo.png" height="40" />
		</a>
		<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<!-- Inicio: cuadro de búsqueda y usuario -->
	<div class="header-right">
		<!--CAMBIADOR DE SESIÓN-->
		<form action="pages-search-results.html" class="search nav-form">
			<div class="input-group input-search">
				<div id="session_static">
					<a href="#" style="color: #696969;"
						<?php if($account_type == 'admin'):?> onclick="get_session_changer()" <?php endif;?>>
						Año Lectivo: <?php echo $running_year;?>
					</a>
				</div>
			</div>
		</form>

		<span class="separator"></span>

		<ul class="notifications">

			<!-- Notificaciones de mensajes-->
			<?php
			 $total_unread_message_number = 0;
			 $usuario_actual = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

			 $this->db->where('remitente', $usuario_actual);
			 $this->db->or_where('receptor', $usuario_actual);
			 $mensaje_threads = $this->db->get('mensaje_thread')->result_array();
			 foreach ($mensaje_threads as $row){
				$nro_mensaje_no_leido = $this->crud_model->count_unread_message_of_thread($row['mensaje_thread_code']); 
				$total_unread_message_number += $nro_mensaje_no_leido;
			 }
			 ?>

			<li>
				<a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
					<i class="fa fa-envelope"></i>
					<?php if ($total_unread_message_number > 0): ?>
					<span class="badge"><?php echo $total_unread_message_number; ?></span>
					<?php endif; ?>
				</a>

				<div class="dropdown-menu notification-menu" style="min-width: 290px;">
					<div class="notification-title">
						Mensajes
					</div>

					<div class="content">

						<ul>

							<?php
							$usuario_actual = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

							if($account_type  == 'padres'){
								$loger_message = 'padres';
							} else {
								$loger_message = $this->session->userdata('login_type');												
							}

							$this->db->where('remitente', $usuario_actual);
							$this->db->or_where('receptor', $usuario_actual);
							$mensaje_threads = $this->db->get('mensaje_thread')->result_array();
							foreach ($mensaje_threads as $row):

								// defining the user to show
								if ($row['remitente'] == $usuario_actual)
									$usuario_para_mostrar = explode('-', $row['receptor']);
								if ($row['receptor'] == $usuario_actual)
									$usuario_para_mostrar = explode('-', $row['remitente']);
								$usuario_para_mostrar_type = $usuario_para_mostrar[0];
								$usuario_para_mostrar_id = $usuario_para_mostrar[1];
								$nro_mensaje_no_leido = $this->crud_model->count_unread_message_of_thread($row['mensaje_thread_code']);
								if ($nro_mensaje_no_leido == 0)
									continue;

								// the last sent message from the opponent user
								$this->db->order_by('timestamp', 'desc');
								$last_message_row = $this->db->get_where('mensaje', array('mensaje_thread_code' => $row['mensaje_thread_code']))->row();
								$last_unread_message = $last_message_row->mensaje;
								$last_message_timestamp = $last_message_row->timestamp;
								?>

							<li>
								<a href="<?php echo base_url(); ?>index.php?<?php echo $loger_message; ?>/mensaje/mensaje_leido/<?php echo $row['mensaje_thread_code']; ?>" class="clearfix">
									<!-- vista previa de la imagen del remitente -->
									<figure class="image">
										<img src="<?php echo $this->crud_model->get_image_url($usuario_para_mostrar_type, $usuario_para_mostrar_id); ?>" height="30" class="img-box-boder" />
									</figure>

									<!-- vista previa del nombre y la fecha del remitente -->
									<span class="title line"><strong><?php echo $this->db->get_where($usuario_para_mostrar_type, array($usuario_para_mostrar_type . '_id' => $usuario_para_mostrar_id))->row()->name; ?></strong>
									<span class="title line"><strong><?php echo $this->db->get_where($usuario_para_mostrar_type, array($usuario_para_mostrar_type . '_id' => $usuario_para_mostrar_id))->row()->nombre; ?></strong>
									<small>- <?php echo date("d M, Y", $last_message_timestamp); ?></small>  </span>

									 <!-- Vista previa de la última subcadena de mensajes no leídos -->
									<span class="message"><?php echo substr($last_unread_message, 0, 50); ?></span>
								</a>
							</li>
							<?php endforeach; ?>
						</ul>

						<hr />

						<div class="text-right">
							<a href="<?php echo base_url(); ?>index.php?<?php echo $loger_message; ?>/mensaje" class="view-more">Ver Todos</a>
						</div>
					</div>
				</div>
			</li>
		</ul>

		<span class="separator"></span>

		<div id="userbox" class="userbox">
			<a href="#" data-toggle="dropdown">
				<figure class="profile-picture">
					<img src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type') , $this->session->userdata($account_type.'_id'));?>" alt="user-image" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
				</figure>
				<div class="profile-info" data-lock-name="<?php echo $this->session->userdata('name');?>" data-lock-email="iepsmf@gmail.com">
					<span class="name"><?php echo $this->session->userdata('name');?></span>
					<span class="name"><?php echo $this->session->userdata('nombre');?></span>
					<span class="role"><?php echo ucfirst($this->session->userdata('login_type'));?></span>
				</div>

				<i class="fa custom-caret"></i>
			</a>

			<div class="dropdown-menu">
				<ul class="list-unstyled">
					<li class="divider"></li>
					<!-- goto setting -->
					<?php if($account_type == 'admin'):?>
					<li>
						<a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/system_settings"><i class="fa fa-wrench"></i>Ajustes</a>
					</li>
					<?php endif;?>
					<!-- goto profile -->
					<li>
						<a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/manage_profile"><i class="fa fa-user"></i>Editar Perfil</a>
					</li>
					<li>
						<a role="menuitem" tabindex="-1" href="<?php echo base_url();?>index.php?login/logout"><i class="fa fa-power-off"></i> Cerrar Sesión</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	
</header>
<!-- end: header -->

<script type="text/javascript">
	function get_session_changer()
	{
		$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_session_changer/',
            success: function(response)
            {
                jQuery('#session_static').html(response);
            }
        });
	}
</script>
