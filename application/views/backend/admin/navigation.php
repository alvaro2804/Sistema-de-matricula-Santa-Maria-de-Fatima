<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

	<div class="sidebar-header">
		<div class="sidebar-title">
			IEP Santa María de Fátima
		</div>
		<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
			<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
		</div>
	</div>

	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<ul class="nav nav-main">

			<!-- DASHBOARD -->
			<li class="<?php if ($page_name == 'dashboard') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/dashboard">
					<i class="fa fa-tachometer"></i>
					<span>Inicio</span>
				</a>
			</li>

			<!-- ESTUDIANTE -->
			<li class="<?php if ($page_name == 'estudiante' || $page_name == 'estudiante_hoja_cali' || $page_name == 'estudiante_masiva_add' || $page_name == 'estudiante_add' ) echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/estudiante">
					 <i class="fa fa-slideshare"></i>
					<span>Estudiante</span>
				</a>
			</li>

			<!-- PROMOVER AL ESTUDIANTE -->
			<li class="<?php if ( $page_name == 'promover_estudiante') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/promover_estudiante">
					 <i class="fa fa-random"></i>
					<span>Promover Estudiante</span>
				</a>
			</li>

			<!-- PADRES -->
			<li class="<?php if ($page_name == 'padres') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/padres">
					<i class="fa fa-user"></i>
					<span>Padres</span>
				</a>
			</li>
			
			<!-- PROFESOR-->
			<li class="<?php if ($page_name == 'profesor') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/profesor">
					<i class="fa fa-users"></i>
					<span>Profesores</span>
				</a>
			</li>



			<!-- CLASE -->
			<li class="nav-parent <?php
			if ($page_name == 'clase' ||
					$page_name == 'seccion')
				echo 'nav-expanded nav-active';
			?> ">
				<a href="#">
					<i class="fa fa-university"></i>
					<span>Clases</span>
				</a>
				<ul class="nav nav-children">
					<li class="<?php if ($page_name == 'clase') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/clase">
							<span><i class="fa fa-circle-o"></i>Manejo de Clases</span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'seccion') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/seccion">
							<span><i class="fa fa-circle-o"></i> Manejo de Secciones</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- USUARIO-->
			
			<li class="nav-parent <?php
			if ($page_name == 'registrar_admin' ||
					$page_name == '#')
				echo 'nav-expanded nav-active';
			?> ">
				<a href="#">
				<i class="fa fa-user-secret" aria-hidden="true"></i>
					<span>Usuario</span>
				</a>
				<ul class="nav nav-children">
					<li class="<?php if ($page_name == 'registrar_admin') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/registrar_admin">
							<span><i class="fa fa-circle-o"></i>Administrador del Sistema</span>
						</a>
					</li>
					<li class="<?php if ($page_name == '#') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/#">
							<span><i class="fa fa-circle-o"></i> Usuario</span>
						</a>
					</li>
				</ul>
			</li>

		   <!-- PLAN DE ESTUDIOS-->
			<li class="<?php if ($page_name == 'plan_estudio') echo 'nav-active'; ?> ">
				 <a href="<?php echo base_url(); ?>index.php?admin/plan_estudio">
					  <i class="fa fa-book"></i>
					 <span>Plan de Estudios</span>
				 </a>
			</li>

			<!-- HORARIOS -->
			<li class="nav-parent <?php if ($page_name == 'tema' ||
											 $page_name == 'horario') 
										echo 'nav-expanded nav-active'; ?> ">
				<a href="#">
				<i class="fa fa-clock-o"></i>
					Horarios</span>
				</a>
				<ul class="nav nav-children">

						<li class="<?php if ($page_name == 'tema') echo 'nav-active'; ?>">
							<a href="<?php echo base_url(); ?>index.php?admin/tema">
								<span><i class="fa fa-circle-o"></i>Asignar Horario</span>
							</a>
						</li>

						<li class="<?php if ( $page_name == 'horario') echo 'nav-active'; ?>">
							<a href="<?php echo base_url(); ?>index.php?admin/horario">
								<span><i class="fa fa-circle-o"></i> Horario</span>
							</a>
						</li>

				</ul>
			</li>

			<!-- ASISTENCIA DIARIA -->
			<li class="nav-parent <?php if ($page_name == 'asistencia' ||
									$page_name == 'ver_asistencia' || $page_name == 'asistencia_reporte' || $page_name == 'ver_asistencia_reporte') 
										echo 'nav-expanded nav-active'; ?> ">
				<a href="#">
					<i class="fa fa-line-chart"></i>
					Asistencia Diaria</span>
				</a>
				<ul class="nav nav-children">

						<li class="<?php if (($page_name == 'asistencia' || $page_name == 'ver_asistencia')) echo 'nav-active'; ?>">
							<a href="<?php echo base_url(); ?>index.php?admin/asistencia">
								<span><i class="fa fa-circle-o"></i>Asistencia</span>
							</a>
						</li>

						<li class="<?php if (( $page_name == 'asistencia_reporte' || $page_name == 'ver_asistencia_reporte')) echo 'nav-active'; ?>">
							<a href="<?php echo base_url(); ?>index.php?admin/asistencia_reporte">
								<span><i class="fa fa-circle-o"></i> Reporte de Asistencia</span>
							</a>
						</li>

				</ul>
			</li>

			<!-- EXAMEN -->
			<li class="nav-parent <?php
			if ($page_name == 'lista_examen' ||
					$page_name == 'grado' ||
					$page_name == 'ingreso_calificacion' ||
						$page_name == 'calificacion_reporte' ||
											$page_name == 'ver_manejo_calificacion')
						echo 'nav-expanded nav-active';
			?> ">
				<a href="#">
					<i class="fa fa-graduation-cap"></i>
					<span>Examen</span>
				</a>
				<ul class="nav nav-children">
					<li class="<?php if ($page_name == 'lista_examen') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/lista_examen">
							<span><i class="fa fa-circle-o"></i>Lista de Examen</span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'grado') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/grado">
							<span><i class="fa fa-circle-o"></i> Niveles de Examen</span>
						</a>
					</li>

					<li class="<?php if ($page_name == 'ingreso_calificacion' || $page_name == 'ver_manejo_calificacion') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/ingreso_calificacion">
							<span><i class="fa fa-circle-o"></i> Ingreso de Calificación</span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'calificacion_reporte') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/calificacion_reporte">
							<span><i class="fa fa-circle-o"></i> Reporte</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- BIBLIOTECA -->
			<li class="<?php if ($page_name == 'biblioteca') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/biblioteca">
					<i class="fa fa-fax"></i>
					<span>Biblioteca</span>
				</a>
			</li>





		   <!-- CONTABILIDAD -->
			<li class="nav-parent <?php
			if ($page_name == 'ingreso' ||
					$page_name == 'gasto' ||
						$page_name == 'gasto_categoria' ||
							$page_name == 'estudiante_pago')
								echo 'nav-expanded nav-active';
			?> ">
				<a href="#">
					<i class="fa fa-cc-visa"></i>
					<span>Contabilidad</span>
				</a>
				<ul class="nav nav-children">
					<li class="<?php if ($page_name == 'estudiante_pago') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/estudiante_pago">
							<span><i class="fa fa-circle-o"></i>Crear Pago de Estudiante</span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'ingreso') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/ingreso">
							<span><i class="fa fa-circle-o"></i>Pagos Estudiante</span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'gasto') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/gasto">
							<span><i class="fa fa-circle-o"></i>Gastos</span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'gasto_categoria') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/gasto_categoria">
							<span><i class="fa fa-circle-o"></i>Gastos por categoria</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- ANUNCIOS -->
			<li class="<?php if ($page_name == 'anuncio') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/anuncio">
					<i class="fa fa-file-text-o"></i>
					<span>Anuncios</span>
				</a>
			</li>

			<!-- MENSAJES -->
			<li class="<?php if ($page_name == 'mensaje') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/mensaje">
					<i class="fa fa-envelope-o"></i>
					<span>Mensajes</span>
				</a>
			</li>

			<!-- AJUSTES -->
			<li class="nav-parent <?php
			if ($page_name == 'system_settings' ||
					$page_name == 'manage_language' ||
						$page_name == 'sms_settings')
							echo 'nav-expanded nav-active';
			?> ">
				<a href="#">
					<i class="fa fa-suitcase"></i>
					<span>Ajustes</span>
				</a>
				<ul class="nav nav-children">
					<li class="<?php if ($page_name == 'system_settings') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/system_settings">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('general_settings'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'sms_settings') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/sms_settings">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('sms_settings'); ?></span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'manage_language') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/manage_language">
							<span><i class="fa fa-circle-o"></i> <?php echo get_phrase('language_settings'); ?></span>
						</a>
					</li>
				</ul>
			</li>

			<!-- MI PERFIL -->
			<li class="<?php if ($page_name == 'manage_profile') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/manage_profile">
					<i class="fa fa-lock"></i>
					<span>Mi Perfil</span>
				</a>
			</li>
		</ul>
	 </nav>

	</div>

		<script>
			// Maintain Scroll Position
			if (typeof localStorage !== 'undefined') {
				if (localStorage.getItem('sidebar-left-position') !== null) {
					var initialPosition = localStorage.getItem('sidebar-left-position'),
						sidebarLeft = document.querySelector('#sidebar-left .nano-content');

					sidebarLeft.scrollTop = initialPosition;
				}
			}
		</script>

	</div>		
</aside>
<!-- end: sidebar -->


