<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/CasoEstudioMN-main/Views/layout.php";
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarCSS(); ?>

<body>

    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <?php MostrarNav(); ?>

    <div class="overlay"></div>
    <main class="main-wrapper">

        <?php MostrarHeader(); ?>

        <section class="section">
            <div class="container-fluid">
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-10 mx-auto">

                            <div class="card-style mt-5 text-center mb-5">
                                <h2 class="mb-10">Bienvenido al Sistema de Casas</h2>
                                <p class="text-muted">Seleccione una opción para continuar.</p>
                            </div>

                            <div class="row g-4 justify-content-center">

                                <div class="col-md-5">
                                    <div class="card-style text-center h-100">
                                        <div class="mb-15">
                                            <i class="fas fa-house" style="font-size: 48px; color: #5a8dee;"></i>
                                        </div>
                                        <h4 class="mb-10">Consulta de Casas</h4>
                                        <p class="text-muted mb-20">Visualice las casas disponibles y reservadas del sistema.</p>
                                        <a href="../vCasas/consultarCasas.php" class="main-btn primary-btn btn-hover w-100 text-center">
                                            Ver Casas
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="card-style text-center h-100">
                                        <div class="mb-15">
                                            <i class="fas fa-key" style="font-size: 48px; color: #5a8dee;"></i>
                                        </div>
                                        <h4 class="mb-10">Alquiler de Casas</h4>
                                        <p class="text-muted mb-20">Registre el alquiler de una casa disponible en el sistema.</p>
                                        <a href="../vCasas/alquilarCasa.php" class="main-btn primary-btn btn-hover w-100 text-center">
                                            Alquilar Casa
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php MostrarFooter(); ?>

    </main>

    <?php MostrarJS(); ?>

</body>

</html>
