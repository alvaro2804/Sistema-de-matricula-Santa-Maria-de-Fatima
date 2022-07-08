<style>
    .exam_chart {
    width           : 100%;
        height      : 265px;
        font-size   : 11px;
	}
</style>

<?php 
    $estudiante_info = $this->crud_model->get_estudiante_info($estudiante_id);
    $examenes         = $this->crud_model->get_exams();
    foreach ($estudiante_info as $row1):
    foreach ($examenes as $row2):
?>

<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-heading">
                <h4 class="panel-title"><?php echo $row2['nombre'];?></h4>
            </div>
            <div class="panel-body">
                
                
               <div class="col-md-6">
                  <div class="table-responsive">
                   <table class="table table-bordered table-striped table-condensed mb-none">
                       <thead>
                        <tr>
                            <td style="text-align: center;">Curso</td>
                            <td style="text-align: center;">Nota Obtenida</td>
                            <td style="text-align: center;">Nota Más Alta</td>
                            <td style="text-align: center;">Grado</td>
                            <td style="text-align: center;">Comentario</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $temas = $this->db->get_where('tema' , array(
                                'clase_id' => $clase_id , 'year' => $running_year
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
                                                            'clase_id' => $clase_id,
                                                                'estudiante_id' => $estudiante_id , 
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

                                    $calificacion_alta = $this->crud_model->get_calificacion_alta( $row2['examen_id'] , $clase_id , $row3['tema_id'] );
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
				   </div>

                   <hr />

                    <br>
                    <a href="<?php echo base_url();?>index.php?admin/ver_imprimir_estud_hoja_cali/<?php echo $estudiante_id;?>/<?php echo $row2['examen_id'];?>" 
                        class="btn btn-primary" target="_blank">
                        Imprimir Hoja de Calificación
                    </a>
               </div>

               <div class="col-md-6 hidden-xs">
                   <div id="chartdiv<?php echo $row2['examen_id'];?>" class="exam_chart"></div>
                       <script type="text/javascript">
                            var chart<?php echo $row2['examen_id'];?> = AmCharts.makeChart("chartdiv<?php echo $row2['examen_id'];?>", {
                                "theme": "none",
                                "type": "serial",
                                "dataProvider": [
                                        <?php 
                                            foreach ($temas as $tema) :
                                        ?>
                                        {
                                            "tema": "<?php echo $tema['nombre'];?>",
                                            "calificacion_obtenida": 
                                            <?php
                                                $calificacion_obtenida = $this->crud_model->get_calificacion_obtenida( $row2['examen_id'] , $clase_id , $tema['tema_id'] , $row1['estudiante_id']);
                                                echo $calificacion_obtenida;
                                            ?>,
                                            
                                            <?php
                                                $highest_mark = $this->crud_model->get_calificacion_alta( $row2['examen_id'] , $clase_id , $tema['tema_id'] );
                                                echo $highest_mark;
                                            ?>
                                        },
                                        <?php 
                                            endforeach;

                                        ?>
                                    
                                ],
                                "valueAxes": [{
                                    "stackType": "3d",
                                    "unit": "%",
                                    "position": "left",
                                    
                                }],
                                "startDuration": 1,
                                "graphs": [{
                                    "balloonText": "Calificación Obtenida en [[category]]: <b>[[value]]</b>",
                                    "fillAlphas": 0.9,
                                    "lineAlpha": 0.2,
                                    "title": "2004",
                                    "type": "column",
                                    "fillColors":"#7f8c8d",
                                    "valueField": "calificacion_obtenida"
                                }, {
                                    "balloonText": "Nota maás alta en [[category]]: <b>[[value]]</b>",
                                    "fillAlphas": 0.9,
                                    "lineAlpha": 0.2,
                                    "title": "2005",
                                    "type": "column",
                                    "fillColors":"#34495e",
                                   
                                }],
                                "plotAreaFillAlphas": 0.1,
                                "depth3D": 20,
                                "angle": 45,
                                "categoryField": "tema",
                                "categoryAxis": {
                                    "gridPosition": "start"
                                },
                                "exportConfig":{
                                    "menuTop":"20px",
                                    "menuRight":"20px",
                                    "menuItems": [{
                                        "format": 'png'   
                                    }]  
                                }
                            });
                    </script>
               </div>
               
            </div>
        </section>  
    </div>
</div>
<?php
    endforeach;
        endforeach;
?>