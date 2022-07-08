
<?php
$estudiante_info   =   $this->db->get_where('inscribirse' , array('estudiante_id' => $param2 , 'year' => $this->db->get_where('settings' , array('type' => 'running_year'))->row()->description))->result_array();
foreach($estudiante_info as $row):?>

<div class="col-md-12 ">
  <div class="panel-body">
    <div class="col-md-6 ">
      <div class="thumb-info mb-md">
          <img src="<?php echo $this->crud_model->get_image_url('estudiante' , $row['estudiante_id']);?>" class="rounded img-responsive">
          <div class="thumb-info-title">
              <span class="thumb-info-inner"><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $param2))->row()->nombre;?></span>
              <span class="thumb-info-type">Estudiante</span>
          </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="widget-toggle-expand mb-md">
          <div class="widget-header">
              <h6>Datos del Alumno</h6>
              <hr class="dotted short">
          </div>
                    <table class="table table-striped table-bordered  mb-none">
                
                    <?php if($row['clase_id'] != ''):?>
                    <tr>
                        <td>Clase</td>
                        <td><b><?php echo $this->crud_model->get_class_name($row['clase_id']);?></b></td>
                    </tr>
                    <?php endif;?>

                    <?php if($row['seccion_id'] != '' && $row['seccion_id'] != 0):?>
                    <tr>
                        <td>Sección</td>
                        <td><b><?php echo $this->db->get_where('seccion' , array('seccion_id' => $row['seccion_id']))->row()->nombre;?></b></td>
                    </tr>
                    <?php endif;?>
                
                    <?php if($row['roll'] != ''):?>
                    <tr>
                        <td>Roll</td>
                        <td><b><?php echo $row['roll'];?></b></td>
                    </tr>
                    <?php endif;?>
                    <tr>
                        <td>Cumpleaños</td>
                        <td><b><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->cumpleanos;?></b></td>
                    </tr>
                    <tr>
                        <td>Género</td>
                        <td><b><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->sexo;?></b></td>
                    </tr>
                    <tr>
                        <td>Religión</td>
                        <td><b><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->religion;?></b></td>
                    </tr>
                    <tr>
                        <td>Grupo Sanguíneo</td>
                        <td><b><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->grupo_sanguineo;?></b></td>
                    </tr>
                    <tr>
                        <td>Teléfono</td>
                        <td><b><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->telefono;?></b></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><b><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->email;?></b></td>
                    </tr>
                    <tr>
                        <td>Dirección</td>
                        <td><b><?php echo $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->direccion;?></b>
                        </td>
                    </tr>
                    <tr>
                        <td>Padre</td>
                        <td>
                            <b>
                     <?php 
                          $padres_id = $this->db->get_where('estudiante' , array('estudiante_id' => $row['estudiante_id']))->row()->padres_id;
                          echo $this->db->get_where('padres' , array('padres_id' => $padres_id))->row()->nombre;
                      ?>
                            </b>
                        </td>
                    </tr>
                    <tr>
                        <td>Teléfono del Padre</td>
                        <td><b><?php echo $this->db->get_where('padres' , array('padres_id' => $padres_id))->row()->telefono;?></b></td>
                    </tr> 
                </table>
      </div>
     </div>
  </div>
</div>
<?php endforeach;?>
<br/>