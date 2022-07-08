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
<div class="row">
	

	
		<section class="panel">
			<header class="panel-heading">
				<h2 class="panel-title">
				Anuncios: SMF	
				</h2>
			</header>
			<div class="panel-body">
				<div id="anuncio_calendario"></div>
			</div>
		</section>
	

	</div>
</div>


<script>
	//CALENDARIO CONFIGURACIÓN
	$( document ).ready( function () {
		var calendar = $( '#anuncio_calendario' );
		$( '#anuncio_calendario' ).fullCalendar( {
			header: {
				left: 'title',
				right: 'prev,today,next',
				
			},

			//defaultView: 'basicWeek',
			displayEventTime : false,
			editable: true,
			firstDay: 0,
			height: 450,
			droppable: false,
			rendering: 'background',
			

			events: [
				<?php 
				$anuncios = $this->db->get('anuncio')->result_array();
				foreach($anuncios as $row):
				?> {
					title: "<?php echo $row['anuncio_titulo'];?>
					<?php echo $row['anuncio'];?>",
					start: new Date( <?php echo date('Y',$row['crear_timestamp']);?>, <?php echo date('m',$row['crear_timestamp'])-1;?>, <?php echo date('d',$row['crear_timestamp']);?> ),
					end: new Date( <?php echo date('Y',$row['crear_timestamp']);?>, <?php echo date('m',$row['crear_timestamp'])-1;?>, <?php echo date('d',$row['crear_timestamp']);?> )
					
				},
				
				<?php 
				  endforeach
				?>
			]
		} );
	} );
</script>

<script>

  $(function() {

    $('#anuncio_calendario').fullCalendar({
    });

  });

</script>
