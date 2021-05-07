<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?php echo $titulo; ?></h4>
        </div>
        <div class="card-body">
            <p>
                <a href="<?php echo base_url(); ?>/consulta/insertar/<?= @$idMascota; ?>" class="btn btn-info m-1">Agregar</a>
                <?php if (!$flag) { ?>
                    <button id="print_hojavida" type="button" class="btn btn-primary m-1" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target=".modal-abastecimiento-news">
                        <span class="fas fa-file-pdf"></span> exportar hoja de vida a PDF
                    </button>
                <?php } ?>
            </p>
            <input type="hidden" name="idMascota" id="idMascota" value="<?= @$idMascota; ?>">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>mascota</th>
                            <th>Fecha de consulta</th>
                            <th>Peso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 0 ?>
                        <?php foreach ($datos as $dato) {
                        ?>
                            <?php $contador++ ?>
                            <tr>
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $dato->mascota; ?></td>
                                <td><?php echo $dato->fecha; ?></td>
                                <td><?php echo $dato->pesoMascota; ?> KG </td>
                                <td class="text-left">
                                    <a href="<?php echo base_url() . '/consulta/insertar/' . @$idMascota . '?id_consulta=' . $dato->id; ?>" class="btn btn-warning" title="Editar registro"><i class="fas fa-pencil-alt"></i></a>
                                    <button onclick="ver_consulta('<?php echo $dato->id; ?>')" class="btn btn-success" data-toggle="modal" data-target="#detalle_consulta" data-placement="top" title="Ver consultas"><i class="fas fa-eye"></i></button>
                                    <button type="button" onclick="print_consulta('<?php echo $dato->id; ?>')" class="btn btn-dark" title="imprimir consulta"><i class="fas fa-print"></i></button>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal -->
<div class="modal fade" id="detalle_consulta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle consulta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6" id='encabesado'></div>
                    <div class="col-md-6" id="encabesado2"></div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="detalleConsultaTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>servicio</th>
                                    <th>observacion</th>
                                    <th>precio sugerido</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>