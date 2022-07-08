
<div class="row">
    <div class="col-md-12">

        <!------ INICIO CONTROL TABS------>
        <div class="tabs">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#list" data-toggle="tab">
                    <i class="fa fa-list"></i> 
                   <span class="hidden-xs">Lista Tablón de Anuncios</span>
                </a></li>
        </ul>
        <!------FIN CONTROL TABS------>

        <div class="tab-content">
            <br>
            <!----COMIENZA LA LISTA DE TABLAS-->
            <div class="tab-pane box active" id="list">
                <table class="table table-bordered table-striped mb-none" id="datatable-default">
                    <thead>
                        <tr>
                            <th><div>#</div></th>
                    <th><div>Título</div></th>
                    <th><div>Anuncio</div></th>
                    <th><div>Fecha</div></th>
                    <th><div></div></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($noticias as $row):
                            ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $row['anuncio_titulo']; ?></td>
                                <td class="span5"><?php echo $row['anuncio']; ?></td>
                                <td><?php echo date('d M,Y', $row['crear_timestamp']); ?></td>
                                <td>
                                    <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>index.php?modal/popup/modal_ver_anuncio/<?php echo $row['anuncio_id']; ?>');"
                                       class="btn btn-primary btn-sm">
                                        Ver Anuncio
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!----FINAL LISTA DE TABLA--->




        </div>
       </div>
    </div>
</div>