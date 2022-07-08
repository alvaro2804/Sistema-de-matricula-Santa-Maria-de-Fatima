<center>
	<button class="btn btn-primary">
		<i class="fa fa-user"></i> <?php echo $this->crud_model->get_type_name_by_id('estudiante' , $param2);?>
	</button>
</center>
<hr />
<?php
	$running_year = $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description; 
    $estudiante_info = $this->crud_model->get_estudiante_info($param2);
    $examenes         = $this->crud_model->get_exams();
    foreach ($estudiante_info as $row1):
    foreach ($examenes as $row2):
?>

<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h2 class="panel-title"><?php echo $row2['nombre'];?></h2>
            </div>
            <div class="panel-body">
               
                <table class="table table-bordered table-striped table-condensed mb-none">
                   <thead>
                    <tr>
                        <td style="text-align: center;">Curso</td>
                        <td style="text-align: center;">Nota Obtenida</td>
                        <td style="text-align: center;">Nota Más Alta</td>
                       
                        <td style="text-align: center;">Comentario</td>
                    </tr>
                </thead>
                <tbody>
                     <?php 
                            $temas = $this->db->get_where('tema' , array(
                                'clase_id' => $param3 , 'year' => $running_year
                            ))->result_array();
                            foreach ($temas as $row3):
                        ?>
                          <tr>
                                <td style="text-align: center;"><?php echo $row3['nombre'];?></td>
                                <td style="text-align: center;">
                                    <?php
                                        $consul_cali_obt = $this->db->get_where('calificacion' , array(
                                                    'tema_id' => $row3['tema_id'],
                                                        'examen_id' => $row2['examen_id'],
                                                            'clase_id' => $param3,
                                                                'estudiante_id' => $param2 , 
                                                                    'year' => $running_year));
                                        if ( $consul_cali_obt->num_rows() > 0) {
                                            $calificaciones = $consul_cali_obt->result_array();
                                            foreach ($calificaciones as $row4) {
                                                echo $row4['calificacion_obtenida'];
                                               
                                            }
                                        }
                                    ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php

                                    $calificacion_alta = $this->crud_model->get_calificacion_alta( $row2['examen_id'] , $param3, $row3['tema_id'] );
                                    echo $calificacion_alta;


        
                                    ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php
                                        if($consul_cali_obt->num_rows() > 0) {
                                            if ($row4['calificacion_obtenida'] >= 0 || $row4['calificacion_obtenida'] != '') {
                                                $grado = $this->crud_model->get_grado($row4['calificacion_obtenida']);
                                                echo $grado['nombre'];
                                               ['grado_punto'];
                                            }
                                        }
                                    ?>
                                </td>
                                <td style="text-align: center;">
                                    <?php if($consul_cali_obt->num_rows() > 0) 
                                            echo $row4['comentario'];
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                   </table>
                <hr />

               
            </div>
        </div>  
    </div>
</div>
<?php
	endforeach;
	endforeach;
?>