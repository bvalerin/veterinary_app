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

            <form method="POST" name="formacedula" action="<?php echo base_url(); ?>/veterinarios/profile" autocomplete="off">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" disabled class="form-control" id="nombre" name="nombre" value="<?php echo $veterinarios['nombre']; ?>" placeholder="Nombre" autofocus required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="apellido">Apellidos</label>
                            <input type="text" disabled class="form-control" id="apellido" value="<?php echo $veterinarios['apellido']; ?>" name="apellido" placeholder="Apellido" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="tipoDoc">Tipo de Documento</label>
                            <select class="form-control" id="tipoDoc" name="tipoDoc" disabled>
                                <option value="Cedula" <?php if ($veterinarios['tipoDoc'] == 'Cedula') {
                                                            echo 'selected';
                                                        } ?>>Cedula</option>
                                <option value="Pasaporte" <?php if ($veterinarios['tipoDoc'] == 'Pasaporte') {
                                                                echo 'selected';
                                                            } ?>>Pasaporte</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="cedula">Numero de Cedula</label>
                            <input type="text" disabled class="form-control" id="cedula" maxlength=10 name="cedula" placeholder="Numero de Cedula" value="<?php echo $veterinarios['cedula']; ?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="pasaporte">Numero de Pasaporte</label>
                            <input type="text" disabled class="form-control" id="pasaporte" value="<?php echo $veterinarios['pasaporte']; ?>" name="pasaporte" placeholder="Numero de Pasaporte">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="matricula">Matricula</label>
                            <input type="text" class="form-control" disabled id="matricula" value="<?php echo $veterinarios['matricula']; ?>" name="matricula" placeholder="Numero de registro" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="convencional">Convencional</label>
                            <input type="text" class="form-control" disabled id="convencional" value="<?php echo $veterinarios['convencional']; ?>" name="convencional" placeholder="Convencional">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="telefono">Telefono</label>
                            <input type="text" class="form-control" disabled id="telefono" name="telefono" value="<?php echo $veterinarios['telefono']; ?>" placeholder="Telefono" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" disabled id="email" name="email" value="<?php echo $veterinarios['email']; ?>" placeholder="Email" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" disabled id="direccion" name="direccion" value="<?php echo $veterinarios['direccion']; ?>" placeholder="Direccion" required>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <h4 class="mb-2 text-gray-800"><?php echo $subtitulo; ?></h4>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="usuario">Usuario</label>
                            <input type="text" disabled class="form-control" id="usuario" value="<?php echo $veterinarios['usuario']; ?>" name="usuario" placeholder="usuario" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" disabled id="password" name="password" placeholder="password" required>
                        </div>
                        <div class="col-12 col-sm-4">
                            <label for="repassword">Repassword</label>
                            <input type="text" class="form-control" disabled id="repassword" name="repassword" placeholder="Repassword" required>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>
