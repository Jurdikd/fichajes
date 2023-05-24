<?php
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
?>

<div class="container">
    <div class="circle2">
        <span class="circle__btn">
            <ion-icon class="fa fa-sign-in" name="play"></ion-icon>
        </span>
        <span class="circle__back-1"></span>
        <span class="circle__back-2"></span>
    </div>
    <div class="components">

        <div class="btn btn__secondary">
            <p>Enviar</p>
        </div>
        <div class="btn btn__primary">
            <p>Regresar</p>
        </div>

        <div class="chip">
            <div class="chip__icon">
                <ion-icon class="fa fa-question-circle"></ion-icon>
            </div>
            <p>¿Olvidaste tu contraseña?</p>
            <div class="chip__close">
                <ion-icon name="close"></ion-icon>
            </div>
        </div>


        <div class="form">

            <input type="password" class="search__input" placeholder="Contraeña..">
            <div class="search__icon">
                <ion-icon class="fa fa-key"></ion-icon>
            </div>
        </div>

        <div class="search">
            <input type="text" class="search__input" placeholder="Usuaro...">
            <div class="search__icon">
                <ion-icon class="fa fa-user"></ion-icon>
            </div>
        </div>


        <div class="segmented-control">

            <input type="radio" name="radio2" value="5" id="tab-1" checked />
            <label for="tab-1" class="segmented-control__1">
                <p>Iniciar</p>
            </label>

            <input type="radio" name="radio2" value="4" id="tab-2" />
            <label for="tab-2" class="segmented-control__2">
                <p>Registar</p>
            </label>


            <div class="segmented-control__color"></div>
        </div>








    </div>
</div>
<?php
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php"; ?>

<?php
include_once "app/view/templates/app-inc-page/pie-footer.inc.php";
?>