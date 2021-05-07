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
            <a href="<?php echo base_url(); ?>/agendamiento/insertar/<?= @$id_mascota; ?>" class="btn btn-info">Agregar</a>
            <a href="<?php echo base_url(); ?>/agendamiento/eliminados/<?= @$id_mascota; ?>" class="btn btn-warning">Eliminados</a>
            </p>
            <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Cliente</th>
                    <th>Fecha</th>
                    <th>Asunto</th>
                    <th>contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php $contador=0; ?>
                <?php foreach ($datos as $dato) { 
                    $contador++;?>
                    <tr>
                        <td><?php echo $contador; ?></td>
                        <td><?php echo $dato->mascota; ?></td>
                        <td><?php echo $dato->cliente; ?></td>
                        <td><?php echo $dato->fecha; ?></td>
                        <td><?php echo $dato->asunto; ?></td>
                        <td><?php echo $dato->contenido; ?></td>
                        <td class="text-left">
                            <a href="<?php echo base_url() . '/agendamiento/editar/' . $dato->id; ?>" class="btn btn-warning" title="Editar registro"><i class="fas fa-pencil-alt"></i></a>
                            <a href="#" data-href="<?php echo base_url() . '/agendamiento/eliminar/' . $dato->id; ?>" data-toggle="modal" data-target="#modal_confirma" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Modal -->
<div class="modal fade" id="modal_confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Desea eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <a type="button" class="btn btn-danger btn-ok">Si</a>
            </div>
        </div>
    </div>
</div>