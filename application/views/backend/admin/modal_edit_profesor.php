<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
                	<?php foreach($edit_data as $row):?>
                    <?php echo form_open(base_url() . 'index.php?admin/profesor/do_update/'.$row['profesor_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        <div class="padded">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nombre</label>
                                <div class="col-sm-5">
                                    <input type="text" class="validate[required]" name="nombre" value="<?php echo $row['nombre'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Cumpleaños</label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker fill-up" name="cumpleanos" value="<?php echo $row['cumpleanos'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Sexo</label>
                                <div class="col-sm-5">
                                    <select name="sexo" class="uniform" style="width:100%;">
                                    	<option value="masculino" <?php if($row['sex'] == 'masculino')echo 'selected';?>>Masculino></option>
                                    	<option value="femenino" <?php if($row['sexo'] == 'femenino')echo 'selected';?>>Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Dirección</label>
                                <div class="col-sm-5">
                                    <input type="text" class="" name="direccion" value="<?php echo $row['direccion'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Teléfono</label>
                                <div class="col-sm-5">
                                    <input type="text" class="" name="telefono" value="<?php echo $row['telefono'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-5">
                                    <input type="text" class="" name="email" value="<?php echo $row['email'];?>"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Foto</label>
                                <div class="controls" style="width:210px;">
                                    <input type="file" class="" name="userfile" id="imgInp" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="controls" style="width:210px;">
                                    <img id="blah" src="<?php echo $this->crud_model->get_image_url('profesor',$row['profesor_id']);?>" alt="Tu imagen" height="100" />
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray">Editar Profesor</button>
                        </div>
                    </form>
                    <?php endforeach;?>
                </div>
			</div>