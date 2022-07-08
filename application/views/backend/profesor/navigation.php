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
				<a href="<?php echo base_url(); ?>index.php?profesor/dashboard">
					<i class="fa fa-tachometer"></i>
					<span>Inicio</span>
				</a>
			</li>

			<!-- ESTUDIANTE -->
			<li class="<?php if ($page_name == 'estudiante' || $page_name == 'estudiante_hoja_cali' || $page_name == 'estudiante_masiva_add' || $page_name == 'estudiante_add' ) echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?profesor/estudiante">
					 <i class="fa fa-slideshare"></i>
					<span>Estudiante</span>
				</a>
			</li>
			
			<!-- PROFESOR-->
			<li class="<?php if ($page_name == 'profesor') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?profesor/profesor">
					<i class="fa fa-users"></i>
					<span>Profesores</span>
				</a>
			</li>

			<!-- TEMA -->
			<li class="<?php if ($page_name == 'tema') echo 'nav-active'; ?> ">
				 <a href="<?php echo base_url(); ?>index.php?profesor/tema">
					  <i class="fa fa-book"></i>
					 <span>Clases / Asignaturas</span>
				 </a>
			</li>			

			<!-- HORARIO -->
			<li class="<?php if ($page_name == 'horario' || $page_name == 'imprimir_horario') echo 'nav-active'; ?> ">
				 <a href="<?php echo base_url(); ?>index.php?profesor/horario">
					<i class="fa fa-clock-o"></i>
					<span>Horarios</span>
				 </a>
			</li>

			<!-- MATERIAL DE ESTUDIO -->
			<li class="<?php if ($page_name == 'material_estudio') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/material_estudio">
					<i class="glyphicon glyphicon-screenshot"></i>
					<span>Material de Estudio</span>
				</a>
			</li>

		   <!-- PLAN DE ESTUDIOS-->
		   <li class="<?php if ($page_name == 'plan_estudio') echo 'nav-active'; ?> ">
				 <a href="<?php echo base_url(); ?>index.php?profesor/plan_estudio">
					  <i class="fa fa-book"></i>
					 <span>Plan de Estudios</span>
				 </a>
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
							<a href="<?php echo base_url(); ?>index.php?profesor/asistencia">
								<span><i class="fa fa-circle-o"></i>Asistencia</span>
							</a>
						</li>

						<li class="<?php if (( $page_name == 'asistencia_reporte' || $page_name == 'ver_asistencia_reporte')) echo 'nav-active'; ?>">
							<a href="<?php echo base_url(); ?>index.php?profesor/asistencia_reporte">
								<span><i class="fa fa-circle-o"></i> Reporte de Asistencia</span>
							</a>
						</li>

				</ul>
			</li>

			<!-- EXAMEN -->
						
				<li class="nav-parent <?php if ($page_name == 'ingreso_calificacion' || 
				$page_name == 'ver_manejo_calificacion' || 
				$page_name == 'calificacion_reporte' || 
				$page_name == 'ver_imprimir_calificacion' 				 
				) echo 'nav-expanded nav-active';?> ">
				<a href="#">
					<i class="fa fa-graduation-cap"></i>
					<span>Examen</span>
				</a>
				<ul class="nav nav-children">

					<li class="<?php if ($page_name == 'ingreso_calificacion' || $page_name == 'ver_manejo_calificacion') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?profesor/ingreso_calificacion">
							<span><i class="fa fa-circle-o"></i>Ingreso de Calificaciones</span>
						</a>
					</li>
					<li class="<?php if (( $page_name == 'calificacion_reporte' || $page_name == 'ver_asistencia_reporte')) echo 'nav-active'; ?>">
							<a href="<?php echo base_url(); ?>index.php?profesor/calificacion_reporte">
								<span><i class="fa fa-circle-o"></i> Reporte</span>
							</a>
						</li>
				</ul>
			</li>

			<!-- BIBLIOTECA -->
			<li class="<?php if ($page_name == 'biblioteca') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?profesor/biblioteca">
					<i class="fa fa-fax"></i>
					<span>Biblioteca</span>
				</a>
			</li>

			<!-- ANUNCIOS -->
			<li class="<?php if ($page_name == 'anuncio') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?profesor/anuncio">
					<i class="fa fa-file-text-o"></i>
					<span>Anuncios</span>
				</a>
			</li>

			<!-- MENSAJES -->
			<li class="<?php if ($page_name == 'mensaje') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?profesor/mensaje">
					<i class="fa fa-envelope-o"></i>
					<span>Mensajes</span>
				</a>
			</li>

			

			<!-- MI PERFIL -->
			<li class="<?php if ($page_name == 'profesor_perfil') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?profesor/profesor_perfil">
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


