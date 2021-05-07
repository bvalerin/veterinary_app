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
                <a href="<?php echo base_url(); ?>/mascotas/insertar/<?= @$idcliente; ?>" class="btn btn-info">Agregar</a>
                <a href="<?php echo base_url(); ?>/mascotas/eliminados/<?= @$idcliente; ?>" class="btn btn-danger">Eliminados</a>
            </p>
            <div class="table-responsive nowrap">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Raza</th>
                            <th>Especie</th>
                            <th>sexo</th>
                            <th>Pelaje</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $key => $dato) { ?>
                            <tr>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->edad; ?></td>
                                <td><?php echo $dato->raza; ?></td>
                                <td><?php echo $dato->especie; ?></td>
                                <td><?php echo $dato->sexo; ?></td>
                                <td><?php echo $dato->pelaje; ?></td>

                                <td>
                                    <a href="<?php echo base_url() . '/mascotas/editar/' . $dato->id_cliente . '/' . $dato->id; ?>" class="btn btn-warning" title="Editar registro"><i class="fas fa-pencil-alt"></i></a>

                                    <a href="#" data-href="<?php echo base_url() . '/mascotas/eliminar/' . $dato->id_cliente . '/' . $dato->id; ?>" data-toggle="modal" data-target="#modal_confirma" data-placement="top" title="Eliminar registro" class="btn btn-danger"><i class="fas fa-trash"></i></a>

                                    <a href="<?php echo base_url() . '/consulta/index/' . $dato->id; ?>" class="btn btn-primary" title="Ver consultas"><i class="fas fa-list-ul"></i></a>

                                    <a href="<?php echo base_url() . '/agendamiento/index/' . $dato->id; ?>" class="btn btn-success" title="Ver consultas"><i class="fas fa-calendar-alt"></i></a>
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