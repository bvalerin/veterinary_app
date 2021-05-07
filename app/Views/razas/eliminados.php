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
                <a href="<?php echo base_url(); ?>/razas" class="btn btn-warning">Razas</a>
            </p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Raza</th>
                            <th>Especie</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datos as $dato) { ?>
                            <tr>
                                <td><?php echo $dato['nombre']; ?></td>
                                <!--traer el nombre de otra tabla-->
                                <td><?php foreach ($especie as $row) {
                                        if ($row['id'] == $dato['id_especie']) {
                                            echo $row['nombre'];
                                        }
                                    } ?>
                                </td>
                                <td><a href="#" data-href="<?php echo base_url() . '/razas/reingresar/' . $dato['id']; ?>" data-toggle="modal" data-target="#modal_confirma" data-placement="top" title="Reingresar registro"><i class="fas fa-arrow-alt-circle-up"></i></a></td>
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
                <h5 class="modal-title" id="exampleModalLabel">Reingresar registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Desea reingresar este registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <a type="button" class="btn btn-danger btn-ok">Si</a>
            </div>
        </div>
    </div>
</div>