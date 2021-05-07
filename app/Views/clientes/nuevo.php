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
            <form method="POST" name="formacedula" action="<?php echo base_url(); ?>/clientes/insertar" autocomplete="off">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" autofocus required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="apellido">Apellidos</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="" required>
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
                            <input type="text" class="form-control" id="cedula" maxlength="10" name="cedula" placeholder="Numero de Cedula" value="" onchange="validarcedula()">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="pasaporte">Numero de Pasaporte</label>
                            <input type="text" class="form-control" id="pasaporte" onkeypress="return validarNumero(event)" name="pasaporte" placeholder="Numero de Pasaporte" value="">
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="convencional">Convencional</label>
                            <input type="text" maxlength="10" onkeypress="return validarNumero(event)" class="form-control" id="convencional" name="convencional" placeholder="Convencional" value="" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="telefono">Telefono</label>
                            <input type="text" maxlength="10" onkeypress="return validarNumero(event)" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="email">Email</label>
                            <input type="email_cliente" class="form-control" id="email_cliente" name="email_cliente" placeholder="Email" value="" required>
                        </div>
                    </div>
                </div>

                <button type="submit" id="guardar" class="btn btn-success float-right ml-2">Guardar</button>
                <a href="<?php echo base_url(); ?>/clientes" class="btn btn-primary float-right">Regresar</a>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>