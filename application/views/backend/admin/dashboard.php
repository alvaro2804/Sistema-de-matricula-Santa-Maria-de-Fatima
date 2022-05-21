<div class="row">

	<div class="col-md-6 col-lg-12 col-xl-6">
		<div class="row">
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel panel-featured-left panel-featured-primary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-primary">
									<i class="fa fa-user"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">
										Profesor
									</h4>
									<div class="info">
										<strong class="amount">
											<?php echo $this->db->count_all('profesor');?>
										</strong>
									</div>
								</div>
								<div class="summary-footer">
									<span class="text-muted text-uppercase">Total Profesores</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel panel-featured-left panel-featured-secondary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-secondary">
									<i class="fa fa-users"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">
										Estudiante
									</h4>
									<div class="info">
										<strong class="amount">
											<?php echo $this->db->count_all('estudiante'); ?>
										</strong>
									</div>
								</div>
								<div class="summary-footer">
									<span class="text-muted text-uppercase">Total Estudiantes</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel panel-featured-left panel-featured-tertiary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-tertiary">
									<i class="glyphicon glyphicon-user"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<div class="summary">
									<h4 class="title">
										Padres
									</h4>
									<div class="info">
										<strong class="amount">
											<?php echo $this->db->count_all('padres');?>
										</strong>
									</div>
								</div>
								<div class="summary-footer">
									<span class="text-muted text-uppercase">Total Padres</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
			<div class="col-md-12 col-lg-6 col-xl-6">
				<section class="panel panel-featured-left panel-featured-quartenary">
					<div class="panel-body">
						<div class="widget-summary">
							<div class="widget-summary-col widget-summary-col-icon">
								<div class="summary-icon bg-quartenary">
									<i class="fa fa-signal"></i>
								</div>
							</div>
							<div class="widget-summary-col">
								<?php 
									$check	=	array(	'timestamp' => strtotime(date('Y-m-d')) , 'status' => '1' );
									$query = $this->db->get_where('asistencia' , $check);
									$present_today		=	$query->num_rows();
								?>
								<div class="summary">
									<h4 class="title">
										<?php echo get_phrase('asistencia');?>
									</h4>
									<div class="info">
										<strong class="amount">
											<?php echo $present_today;?>
										</strong>
									</div>
								</div>
								<div class="summary-footer">
									<span class="text-muted text-uppercase">Total de Asistencias Diarias</span>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>


