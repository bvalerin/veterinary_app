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
            <form method="POST" action="<?php echo base_url(); ?>/agendamiento/insertar" autocomplete="off">

                <input type="hidden" class="form-control" id="id_mascota" name="id_mascota" value="<?= @$id_mascota; ?>">
                <input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="<?= @$id_cliente; ?>">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="fecha">Fecha</label>
                            <input type="date" class="form-control" id="fecha" name="fecha" required="">
                        </div>

                        <label for="email_cliente">Email</label>
                        <select class="form-control select2" id="email_cliente" name="email_cliente">
                            <option>Seleccionar email</option>
                            <?php foreach ($datos as $row) { ?>
                                <option value="<?php echo $row['email_cliente']; ?>"><?php echo $row['email_cliente']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="asunto">Asunto</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="asunto" name="asunto" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contenido">Contenido</label>
                            <textarea type="text" class="form-control" rows="5" id="contenido" name="contenido" required value=""></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" id="guardar" class="btn btn-success float-right ml-2">Guardar</button>
                <a href="<?php echo base_url(); ?>/agendamiento/index/<?= @$id_mascota; ?>" class="btn btn-primary float-right">Regresar</a>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>