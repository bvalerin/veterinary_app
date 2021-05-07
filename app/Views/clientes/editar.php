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
            <form method="POST" action="<?php echo base_url(); ?>/clientes/actualizar" autocomplete="off">
                <input type="hidden" name="id" id="id" value="<?php echo $cliente['id']; ?>">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" value="<?php echo $cliente['nombre']; ?>" id="nombre" name="nombre" placeholder="Nombre" autofocus required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="apellido">Apellidos</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?php echo $cliente['apellido']; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="tipoDoc">Tipo de Documento</label>
                            <select class="form-control" id="tipoDoc" name="tipoDoc" disabled>
                                <option value="Cedula" <?php if ($cliente['tipoDoc'] == 'Cedula') {
                                                            echo 'selected';
                                                        } ?>>Cedula</option>
                                <option value="Pasaporte" <?php if ($cliente['tipoDoc'] == 'Pasaporte') {
                                                                echo 'selected';
                                                            } ?>>Pasaporte</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="cedula">Numero de Cedula</label>
                            <input type="text" class="form-control" id="cedula" maxlength="10" name="cedula" placeholder="Numero de Cedula" value="<?php echo $cliente['cedula']; ?>" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="pasaporte">Numero de Pasaporte</label>
                            <input type="text" onkeypress="return validarNumero(event)" class="form-control" id="pasaporte" name="pasaporte" placeholder="Numero de Pasaporte" value="<?php echo $cliente['pasaporte']; ?>">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="<?php echo $cliente['direccion']; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="convencional">Convencional</label>
                            <input type="text" onkeypress="return validarNumero(event)" maxlength="10" class="form-control" id="convencional" name="convencional" placeholder="Convencional" value="<?php echo $cliente['convencional']; ?>" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="telefono">Telefono</label>
                            <input type="text" onkeypress="return validarNumero(event)" maxlength="10" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $cliente['telefono']; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email_cliente" name="email_cliente" placeholder="Email" value="<?php echo $cliente['email_cliente']; ?>" required>
                        </div>
                    </div>
                </div>

                <button type="submit" id="guardar" class="btn btn-success float-right ml-2">Guardar</button>
                <a href="<?php echo base_url(); ?>/clientes" class="btn btn-primary float-right">Regresar</a>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>