
					<section class="content-with-menu mailbox">
						<div class="content-with-menu-container" data-mailbox data-mailbox-view="email">
							<div class="inner-menu-toggle">
								<a href="#" class="inner-menu-expand" data-open="inner-menu">
									Mostrar Menú <i class="fa fa-chevron-right"></i>
								</a>
							</div>
							
							<menu id="content-menu" class="inner-menu" role="menu">
								<div class="nano">
									<div class="nano-content">
							
										<div class="inner-menu-toggle-inside">
											<a href="#" class="inner-menu-collapse">
												<i class="fa fa-chevron-up visible-xs-inline"></i><i class="fa fa-chevron-left hidden-xs-inline"></i> Ocultar Menú
											</a>
							
											<a href="#" class="inner-menu-expand" data-open="inner-menu">
												Mostrar Menú <i class="fa fa-chevron-down"></i>
											</a>
										</div>
										<!-- compose new email button -->
										<div class="inner-menu-content">
											<a href="<?php echo base_url(); ?>index.php?admin/mensaje/mensaje_nuevo" class="btn btn-block btn-primary btn-md pt-sm pb-sm text-md">
												<i class="fa fa-envelope mr-xs"></i>
												Nuevo Mensaje
											</a>
											
							
											<!-- message user inbox list -->							
											 <ul class="list-unstyled mt-xl pt-md">							
												<?php
												$usuario_actual = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

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
													?>

														<li>
															<a href="<?php echo base_url(); ?>index.php?admin/mensaje/mensaje_leido/<?php echo $row['mensaje_thread_code']; ?>" class="menu-item <?php if (isset($actual_mensaje_thread_code) && $actual_mensaje_thread_code == $row['mensaje_thread_code']) echo 'active'; ?>">
																<?php echo $this->db->get_where($usuario_para_mostrar_type, array($usuario_para_mostrar_type . '_id' => $usuario_para_mostrar_id))->row()->nombre; ?>
																
																<span class="label label-primary text-weight-normal pull-right"> <?php echo $usuario_para_mostrar_type; ?> </span>
																<?php if ($nro_mensaje_no_leido > 0): ?>
																	<span class="label label-primary text-weight-normal pull-right" style="margin-right: 8px ; background-color: #5A942B">
																		<?php echo $nro_mensaje_no_leido; ?>
																	</span>
																<?php endif; ?>
															 </a>
														</li>
												<?php endforeach; ?>
											</ul>
									
		
										</div>
									</div>
								</div>
							</menu>
							<div class="inner-body mailbox-email ">
							
							 <?php include $nombre_pagina_interna_del_mensaje . '.php'; ?>
							
							</div>
						</div>
					</section>

    