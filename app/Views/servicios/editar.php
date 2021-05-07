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
            <form method="POST" action="<?php echo base_url(); ?>/servicios/actualizar" autocomplete="off">
                <input type="hidden" name="id" id="id" value="<?php echo $servicios['id']; ?>">
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" value="<?php echo $servicios['nombre']; ?>" id="nombre" name="nombre" placeholder="Nombre" autofocus required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" value="<?php echo $servicios['descripcion']; ?>" id="descripcion" name="descripcion" placeholder="descripcion" autofocus required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-12">
                            <label for="precio">Precio</label>
                            <input type="text" class="form-control" value="<?php echo $servicios['precio']; ?>" id="precio" name="precio" placeholder="precio" autofocus required>
                        </div>
                    </div>
                </div>

                <button type="submit" id="guardar" class="btn btn-success float-right ml-2">Guardar</button>
                <a href="<?php echo base_url(); ?>/servicios" class="btn btn-primary float-right">Regresar</a>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>