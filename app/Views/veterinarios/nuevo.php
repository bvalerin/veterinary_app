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
            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" name="formacedula" action="<?php echo base_url(); ?>/veterinarios/insertar" autocomplete="off">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo set_value('nombre') ?>" placeholder="Nombre" autofocus required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="apellido">Apellidos</label>
                            <input type="text" class="form-control" id="apellido" value="<?php echo set_value('apellido') ?>" name="apellido" placeholder="Apellido" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="tipoDoc">Tipo de Documento</label>
                            <select class="form-control" id="tipoDoc" name="tipoDoc" onChange="mostrar(this.value);">
                                <option value="Cedula">Cedula</option>
                                <option value="Pasaporte">Pasaporte</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="cedula">Numero de Cedula</label>
                            <input type="text" class="form-control" id="cedula" value="<?php echo set_value('cedula') ?>" maxlength=10 name="cedula" placeholder="Numero de Cedula" value="" onchange="validarcedula()">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="pasaporte">Numero de Pasaporte</label>
                            <input type="text" class="form-control" id="pasaporte" value="<?php echo set_value('pasaporte') ?>" name="pasaporte" placeholder="Numero de Pasaporte" value="">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="matricula">Matricula</label>
                            <input type="text" class="form-control" id="matricula" value="<?php echo set_value('matricula') ?>" name="matricula" placeholder="Numero de registro" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="convencional">Convencional</label>
                            <input type="text" class="form-control" id="convencional" value="<?php echo set_value('convencional') ?>" name="convencional" placeholder="Convencional">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo set_value('telefono') ?>" placeholder="Telefono" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email') ?>" placeholder="Email" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo set_value('direccion') ?>" placeholder="Direccion" required>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <h4 class="card-title"><?php echo $subtitulo; ?></h4>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" value="<?php echo set_value('usuario') ?>" name="usuario" placeholder="usuario" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="password" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="repassword">Repassword</label>
                            <input type="text" class="form-control" id="repassword" name="repassword" placeholder="Repassword" required>
                        </div>
                    </div>
                </div>

                <button type="submit" id="guardar" class="btn btn-success float-right ml-2">Guardar</button>
                <a href="<?php echo base_url(); ?>/veterinarios" class="btn btn-primary float-right">Regresar</a>
            </form>
        </div><!-- /.container-fluid -->
    </div>
</section>