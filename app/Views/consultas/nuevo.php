<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">

        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <style type="text/css">
        td {
            text-align: center !important;
        }

        tr {
            text-align: center !important;
        }
    </style>
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?php echo $titulo; ?></h4>
        </div>
        <div class="card-body">
            <form id="formConsulta" autocomplete="off">
                <input type="hidden" class="form-control" id="id_mascota" name="id_mascota" value="<?= @$idmascota; ?>">
                <input type="hidden" class="form-control" id="id_consulta" name="id_consulta" value="<?= @$consulta[0]->id; ?>">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="fecha">Fecha de consulta</label>
                            <input type="date" class="form-control" id="date" value="<?= @$consulta[0]->fecha; ?>" name="date" autofocus required>
                        </div>

                        <label for="fecha">Servicios</label>
                        <select class="form-control select2" id="id_servicio" name="id_servicio" value="">
                            <option selected disabled hidden>Seleccionar servicio</option>
                            <?php foreach ($servicios as $row) { ?>
                                <option rel="<?php echo $row['precio']; ?>" value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                            <?php } ?>
                        </select>
                        <div class="mt-2 form-group">
                            <label for="observacion">Observaciones</label>
                            <textarea class="form-control" rows="3" name="observacion" id="observacion"> </textarea>
                        </div>
                        <button type="button" class="btn btn-info btn-sm d-flex" id="agregar_servicio" name="agregar_servicio">Agregar Servicio</button>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="peso">Peso de la mascota</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?= @$consulta[0]->pesoMascota; ?>" id="peso" name="peso" placeholder="Peso" onkeypress="return validarNumero(event)" maxlength="2" required>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Kgs.</span>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="tablaProductos" class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Servicio</th>
                                        <th>Observación</th>
                                        <th>Precio Sugerido</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($serviciosconsulta as $key => $servicio) { ?>
                                        <tr>
                                            <td><?php echo $servicio->servicio; ?></td>
                                            <td><?php echo $servicio->observacion; ?>
                                                <input type="hidden" name="id_servicio_table" value="<?php echo $servicio->id_servicio; ?>">
                                                <input type="hidden" name="observacion_table" value="<?php echo $servicio->observacion; ?>">
                                                <input type="hidden" name="precio" value="<?php echo $servicio->precio; ?>">
                                            </td>
                                            <td><?php echo $servicio->precio; ?> KG</td>
                                            <td>
                                                <p> <span class="badge badge-danger">Guardado</span> </p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <button type="submit" id="guardar" class="mt-3 btn btn-success float-right ml-2">Guardar</button>
                <a href="<?php echo base_url(); ?>/consulta/index/<?= @$idmascota; ?>" class="btn btn-primary float-right mt-3">Regresar</a>
            </form>
        </div>
    </div><!-- /.container-fluid -->
</section>