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

			<!-- PROMOCIÓN DEL ESTUDIANTE -->
			<li class="<?php if ( $page_name == 'student_promotion') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/#">
					 <i class="fa fa-random"></i>
					<span>Promover Estudiante</span>
				</a>
			</li>

			<!-- PADRES -->
			<li class="<?php if ($page_name == 'parent') echo 'nav-active'; ?> ">
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
			<li class="<?php if ($page_name == 'teacher_suggestion') echo 'nav-active'; ?> ">
				 <a href="<?php echo base_url(); ?>index.php?admin/#">
					 <i class="fa fa-download"></i>
					 <span>Usuario</span>
				 </a>
			</li>

		   <!-- PLAN DE ESTUDIOS-->
			<li class="<?php if ($page_name == 'subject') echo 'nav-active'; ?> ">
				 <a href="<?php echo base_url(); ?>index.php?admin/#">
					  <i class="fa fa-book"></i>
					 <span>Plan de Estudios</span>
				 </a>
			</li>

			<!-- HORARIOS -->
			<li class="<?php if ($page_name == 'class_routine_view' || $page_name == 'class_routine_add') echo 'nav-active'; ?> ">
				 <a href="<?php echo base_url(); ?>index.php?admin/#">
					<i class="fa fa-clock-o"></i>
					<span>Horarios</span>
				 </a>
			</li>

			<!-- ASISTENCIA DIARIA -->
			<li class="nav-parent <?php if ($page_name == 'manage_attendance' ||
									$page_name == 'manage_attendance_view' || $page_name == 'attendance_report' || $page_name == 'attendance_report_view') 
										echo 'nav-expanded nav-active'; ?> ">
				<a href="#">
					<i class="fa fa-line-chart"></i>
					<span>Asistencia Diaria</span>
				</a>
				<ul class="nav nav-children">

						<li class="<?php if (($page_name == 'manage_attendance' || $page_name == 'manage_attendance_view')) echo 'nav-active'; ?>">
							<a href="<?php echo base_url(); ?>index.php?admin/#">
								<span><i class="fa fa-circle-o"></i> Asistencia Diaria</span>
							</a>
						</li>

						<li class="<?php if (( $page_name == 'attendance_report' || $page_name == 'attendance_report_view')) echo 'nav-active'; ?>">
							<a href="<?php echo base_url(); ?>index.php?admin/attendance_report">
								<span><i class="fa fa-circle-o"></i> Reporte de Asistencias</span>
							</a>
						</li>

				</ul>
			</li>

			<!-- EXAMEN -->
			<li class="nav-parent <?php
			if ($page_name == 'exam' ||
					$page_name == 'grade' ||
					$page_name == 'marks_manage' ||
						$page_name == 'exam_marks_sms' ||
							$page_name == 'tabulation_sheet' ||
								$page_name == 'marks_manage_view')
									echo 'nav-expanded nav-active';
			?> ">
				<a href="#">
					<i class="fa fa-graduation-cap"></i>
					<span>Examen</span>
				</a>
				<ul class="nav nav-children">
					<li class="<?php if ($page_name == 'exam') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/exam">
							<span><i class="fa fa-circle-o"></i>Lista de Examen</span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'grade') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/grade">
							<span><i class="fa fa-circle-o"></i> Niveles de Examen</span>
						</a>
					</li>

					<li class="<?php if ($page_name == 'tabulation_sheet') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/tabulation_sheet">
							<span><i class="fa fa-circle-o"></i> Promedios de Calificaciones</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- BIBLIOTECA -->
			<li class="<?php if ($page_name == 'book') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/#">
					<i class="fa fa-fax"></i>
					<span>Biblioteca</span>
				</a>
			</li>





		   <!-- CONTABILIDAD -->
			<li class="nav-parent <?php
			if ($page_name == 'income' ||
					$page_name == 'expense' ||
						$page_name == 'expense_category' ||
							$page_name == 'student_payment')
								echo 'nav-expanded nav-active';
			?> ">
				<a href="#">
					<i class="fa fa-cc-visa"></i>
					<span>Contabilidad</span>
				</a>
				<ul class="nav nav-children">
					<li class="<?php if ($page_name == 'student_payment') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/student_payment">
							<span><i class="fa fa-circle-o"></i>Crear Pago de Estudiante</span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'income') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/income">
							<span><i class="fa fa-circle-o"></i>Pagos Estudiante</span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'expense') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/expense">
							<span><i class="fa fa-circle-o"></i>Gastos</span>
						</a>
					</li>
					<li class="<?php if ($page_name == 'expense_category') echo 'nav-active'; ?> ">
						<a href="<?php echo base_url(); ?>index.php?admin/expense_category">
							<span><i class="fa fa-circle-o"></i>Gastos por categoria</span>
						</a>
					</li>
				</ul>
			</li>

			<!-- ANUNCIOS -->
			<li class="<?php if ($page_name == 'noticeboard') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/noticeboard">
					<i class="fa fa-file-text-o"></i>
					<span>Anuncios</span>
				</a>
			</li>

			<!-- MENSAJES -->
			<li class="<?php if ($page_name == 'message') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?admin/message">
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


