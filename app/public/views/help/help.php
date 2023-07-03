<?php
//verificar si hay o no sesion
if (!ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_LOGIN_GENERAL);
    #Si el usuario tiene una sesion activa se redirige a inicio
}
// Datos usuario en sesion
$userLogin = ControlSesion::datos_sesion();

$user = UsersCrt::GetRol(Conexion::obtener_conexion(), $userLogin["usuario"]);
$titulo = "Help";
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
include_once "app/view/templates/components/menu/menu.comp.php"; ?>

<div class="container mt-5">
    <div class="row m-5">
        <div class="col-md-6 mt-5 mx-auto">
            <div class="card bg-dark text-white shadow-hover-red">
                <div class="card-header text-center">
                    <h4 class="card-tittle">Problemas con las tablas</h4>
                </div>
                <div class="card-body text-justify text-center">
                    <p>Si presenta problemas al cargar las tablas, pruebe:</p>
                    <ul>
                        <li><strong><i class="fas fa-keyboard"></i> <span>Ctrl + F5</span></strong> <span>en
                                Windows.</span>
                        </li>
                        <li><strong><i class="fas fa-keyboard"></i> <span>Cmd + F5</span></strong> <span>en Mac.</span>
                        </li>
                        <li><strong><i class="fas fa-keyboard"></i> <span>Borre el cache</span></strong> <span>de su
                                navegador</span></li>
                    </ul>
                    <p>Si el problema persiste, haga clic en el botón.</p>

                    <div class=" footer text-center">
                        <button id="btnRefresh" class="btn btn-primary"><i class="fas fa-sync"></i>
                            <span>Refrescar</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php"; ?>
<!-- Code Javascript-->
<script>
    const btnRefresh = document.getElementById("btnRefresh")
    btnRefresh.addEventListener("click", () => {
        localStorage.clear();
        location.reload(true);

    })
</script>
<?php include_once "app/view/templates/app-inc-page/pie-footer.inc.php"; ?>