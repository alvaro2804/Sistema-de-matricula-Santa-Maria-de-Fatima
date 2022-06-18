<?php 
$edit_data		=	$this->db->get_where('biblioteca' , array('libro_id' => $param2) )->result_array();
?>

 <div class="col-md-12">
        <section class="panel">
           <?php echo form_open(base_url() . 'index.php?admin/biblioteca/actualizar/'.$row['libro_id'] , array('class' => 'form-horizontal form-bordered validate'));?>
            <div class="panel-heading">
                <h4 class="panel-title" >
                    <i class="fa fa-pencil-square"></i>
                    Editar Libro
                </h4>
            </div>
       <div class="panel-body">

        <?php foreach($edit_data as $row):?>
        
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nombre</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nombre" value="<?php echo $row['nombre'];?>"
                            required  title="Valor Requerido"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Autor</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="autor" value="<?php echo $row['autor'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Descripción</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="descripcion" value="<?php echo $row['descripcion'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Precio</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="precio" value="<?php echo $row['precio'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Clase</label>
                    <div class="col-sm-7">
                        <select name="clase_id" class="form-control" required  title="Valor Requerido" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                            <?php 
                            $clases = $this->db->get('clase')->result_array();
                            foreach($clases as $row2):
                            ?>
                                <option value="<?php echo $row2['clase_id'];?>"<?php if($row['clase_id']==$row2['clase_id'])echo 'selected';?>><?php echo $row2['nombre'];?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">Estado</label>
                    <div class="col-sm-7">
                        <select name="status" class="form-control" data-plugin-selectTwo data-width="100%" data-minimum-results-for-search="Infinity">
                            <option value="disponible" <?php if($row['status']=='disponible')echo 'selected';?>>Disponible</option>
                            <option value="no-disponible" <?php if($row['status']=='no-disponible')echo 'selected';?>>No Disponible</option>
                        </select>
                    </div>
                </div>
       
        <?php endforeach;?>
    </div>
    
		<footer class="panel-footer">
			<div class="row">
			<div class="col-sm-9 col-sm-offset-3">
			<button type="submit" class="btn btn-primary">Editar Libro</button>
			</div>
			</div>
		</footer>
   
    </form>
    
   </section>
</div>
