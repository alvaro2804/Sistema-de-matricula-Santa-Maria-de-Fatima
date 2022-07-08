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
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/dashboard">
					<i class="fa fa-tachometer"></i>
					<span>Inicio</span>
				</a>
			</li>

		
			<!-- PROFESOR -->
			<li class="<?php if ($page_name == 'profesor') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/profesor_lista">
					<i class="fa fa-users"></i>
					<span>Profesores</span>
				</a>
			</li>

			<!-- TEMA / Cursos -->
			<li class="<?php if ($page_name == 'tema') echo ' nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/tema">
					<i class="fa fa-book"></i>
					<span>Cursos</span>
				</a>
			</li>

			<!-- HORARIO -->
			<li class="<?php if ($page_name == 'horario') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/horario">
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

			<!-- PLAN DE ESTUDIOS -->
			<li class="<?php if ($page_name == 'plan_estudio') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?estudiante/plan_estudio/<?php echo $this->session->userdata('login_user_id');?>">
					<i class="fa fa-download"></i>
					<span>Plan de Estudio Escolar</span>
				</a>
			</li>

			<!-- HOJA DE CALIFICACIÓN -->
			<li class="<?php if ($page_name == 'estudiante_hoja_calificacion') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/estudiante_hoja_calificacion/<?php echo $this->session->userdata('login_user_id');?>">
					<i class="fa fa-graduation-cap"></i>
					<span>Hoja de Calificación</span>
				</a>
			</li>

			<!-- PAGO -->
			<li class="<?php if ($page_name == 'pago') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/pago">
					<i class="fa fa-cc-visa"></i>
					<span>Pago</span>
				</a>
			</li>			

			<!-- BIBLIOTECA -->
			<li class="<?php if ($page_name == 'biblioteca') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/biblioteca">
					<i class="fa fa-fax"></i>
					<span>Biblioteca</span>
				</a>
			</li>

			<!-- ANUNCIOS -->
			<li class="<?php if ($page_name == 'anuncio') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/anuncio">
					<i class="fa fa-file-text-o"></i>
					<span>Anuncios</span>
				</a>
			</li>		

			<!-- MENSAJE -->
			<li class="<?php if ($page_name == 'mensaje') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/mensaje">
					<i class="fa fa-envelope-o"></i>
					<span>Mensajes</span>
				</a>
			</li>

			<!-- MI PERFIL-->
			<li class="<?php if ($page_name == 'estudiante_perfil') echo 'nav-active'; ?> ">
				<a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/estudiante_perfil">
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


