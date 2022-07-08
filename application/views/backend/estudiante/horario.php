<?php
    $seccion_id = $this->db->get_where('inscribirse' , array(
        'estudiante_id' => $estudiante_id,
            'clase_id' => $clase_id,
                'year' => $running_year
    ))->row()->seccion_id;
?>

<div class="row">
	<div class="col-md-12">
		<section class="panel">
			<header class="panel-heading">
				<a href="<?php echo base_url();?>index.php?estudiante/horario_imprimir/<?php echo $clase_id;?>/<?php echo $seccion_id;?>" class="btn btn-primary btn-xs pull-right" target="_blank">
                            <i class="glyphicon glyphicon-print"></i>Impresión
                </a>
				<h2 class="panel-title text-center">
					Clase -
					<?php echo $this->db->get_where('clase' , array('clase_id' => $clase_id))->row()->nombre;?> :
					Sección -
					<?php echo $this->db->get_where('seccion' , array('seccion_id' => $seccion_id))->row()->nombre;?>
				</h2>
			</header>

			<div class="panel-body">
				<table class="table table-bordered">
					<tbody>
						<?php 
                        for($d=1;$d<=7;$d++):
                        if($d==1)$day='domingo';
                        else if($d==2)$day='lunes';
                        else if($d==3)$day='martes';
                        else if($d==4)$day='miércoles';
                        else if($d==5)$day='jueves';
                        else if($d==6)$day='viernes';
                        else if($d==7)$day='sábado';
                        ?>
						<tr class="gradeA">
							<td width="100">
								<?php echo strtoupper($day);?>
							</td>
							<td>
								<?php
								$this->db->order_by( "time_inicio", "asc" );
								$this->db->where( 'dia', $day );
								$this->db->where( 'clase_id', $clase_id );
								$this->db->where( 'seccion_id', $seccion_id );
								$this->db->where( 'year', $running_year );
								$rutinas= $this->db->get( 'clase_rutina' )->result_array();
								foreach ( $rutinas as $row2 ):
									?>
									<button class="mb-xs mt-xs mr-xs btn btn-primary btn-sm" >
										<?php echo $this->crud_model->get_subject_name_by_id($row2['tema_id']);?>
											<?php
											  echo '(' . $row2[ 'time_inicio' ] . '-' . $row2[ 'time_final' ] . ')';
											?>
									</button>
								<?php endforeach;?>

							</td>
						</tr>
						<?php endfor;?>

					</tbody>
				</table>
			</div>
		</section>
	</div>
</div>