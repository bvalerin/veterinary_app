<?php
$user_session = session();
$user_session = session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    
    <title>Veterinaria del sur | Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/Css/css/style.css">
    <script src="<?php echo base_url(); ?>/Js/fontawasome.js"></script>

</head>

<body>
    <img class="wave" src="<?php echo base_url(); ?>/Img/wave.png" alt="">
    <div class="contenedor">

        <div class="img">
            <img src="<?php echo base_url(); ?>/Img/bg.svg" alt="">
        </div>

        <div class="contenido-login">

            <form autocomplete="off" class="card-body" action="<?php echo base_url(); ?>/veterinarios/valida" method="POST">
                <img src="<?php echo base_url(); ?>/Img/logo.jpeg" alt="">
                <h2>VETERINARIA DEL SUR </h2>
                <div class="input-div cedula">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Usuario</h5>
                        <input type="text" name="usuario" id="usuario" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" name="password" id="password" class="input">
                    </div>
                </div>
                <a href="https://itsgg.edu.ec/" target="_blank">Create by itsgg</a>
                <input type="submit" class="btn" value="inicar sesion">

                <?php if (isset($validation)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $validation->listErrors(); ?>
                    </div>
                <?php } ?>

                <?php if (isset($error)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</body>
<script src="<?php echo base_url(); ?>/Js/Functions/login.js"></script>
</html>