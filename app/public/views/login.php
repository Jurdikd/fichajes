<?php
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <div class="card login-card mt-5">
                <h2>Iniciar Sesión</h2>
                <form id="login">
                    <div class="form-group">
                        <input type="text" id="username">
                        <label for="username">Usuario</label>
                        <i class="fas fa-user icon"></i>
                    </div>
                    <div class="form-group password-group">
                        <input type="password" id="password">
                        <label for="password">Contraseña</label>
                        <i id="password-toggle" class="fas fa-eye-slash icon"></i>
                    </div>
                    <button type="submit" class="submit-btn">Iniciar
                        Sesión</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php"; ?>
<!-- partial -->
<script src="<?php echo RUTA_JS; ?>views/login.js"></script>
<?php
include_once "app/view/templates/app-inc-page/pie-footer.inc.php";
?>