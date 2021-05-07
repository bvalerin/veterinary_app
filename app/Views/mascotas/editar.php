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
            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/mascotas/actualizar" autocomplete="off">
                <input type="hidden" class="form-control" id="id_cliente" name="id_cliente" placeholder="Nombre" value="<?php echo $mascotas['id_cliente']; ?>">
                <input type="hidden" name="id" id="id" value="<?php echo $mascotas['id']; ?>">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" value="<?php echo $mascotas['nombre']; ?>" name="nombre" placeholder="Nombre" autofocus required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="edad">Edad</label>
                            <input type="text" class="form-control" id="edad" name="edad" value="<?php echo $mascotas['edad']; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="especie">Especie</label>
                            <select class="form-control" id="id_especie" name="id_especie" value="">
                                <option>Seleccionar especie</option>
                                <?php foreach ($especie as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $mascotas['id_especie']) {
                                                                                    echo 'selected';
                                                                                } ?>><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="raza">Raza</label>
                            <select class="form-control" id="id_raza" name="id_raza">
                                <?php foreach ($raza as $row) { ?>
                                    <option value="<?php echo $row['id']; ?>" <?php if ($row['id'] == $mascotas['id_raza']) {
                                                                                    echo 'selected';
                                                                                } ?>><?php echo $row['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="sexo">Sexo</label>
                            <select class="form-control" value="<?php echo $mascotas['sexo']; ?>" id="sexo" name="sexo">
                                <option value="macho" <?php if ($mascotas['sexo'] == 'macho') {
                                                            echo 'selected';
                                                        } ?>>macho</option>
                                <option value="hembra" <?php if ($mascotas['sexo'] == 'hembra') {
                                                            echo 'selected';
                                                        } ?>>hembra</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="pelaje">Pelaje</label>
                            <input type="text" class="form-control" id="pelaje" value="<?php echo $mascotas['pelaje']; ?>" name="pelaje" placeholder="pelaje" value="" required>
                        </div>
                    </div>
                </div>

                <button type="submit" id="guardar" class="btn btn-success float-right ml-2">Guardar</button>
                <a href="<?php echo base_url(); ?>/mascotas/index/<?= @$idcliente; ?>" class="btn btn-primary float-right">Regresar</a>
            </form>

        </div>
    </div><!-- /.container-fluid -->
</section>
