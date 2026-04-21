<?php
    include_once "../layout.php";
    include_once "../../Controllers/CasasController.php";

    $datosCasas = ConsultarCasas();
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

        <section class="table-components">
            <div class="container-fluid">
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title mb-30">
                                <h2>Consulta de Casas</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <div class="table-wrapper table-responsive">
                                <table id="tablaCasas" class="table">
                                    <thead>
                                        <tr>
                                            <th><h6>Descripción</h6></th>
                                            <th><h6>Precio Mensual</h6></th>
                                            <th><h6>Usuario Alquiler</h6></th>
                                            <th><h6>Condición</h6></th>
                                            <th><h6>Fecha Registro</h6></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($datosCasas as $casa)
                                        {
                                            $classBadge = ($casa["Condicion"] === "Disponible")
                                                ? "status-btn success-btn"
                                                : "status-btn close-btn";

                                            echo
                                            '<tr>
                                                <td>' . htmlspecialchars($casa["DescripcionCasa"]) . '</td>
                                                <td>₡' . number_format($casa["PrecioCasa"], 2) . '</td>
                                                <td>' . ($casa["UsuarioAlquiler"] ?? "—") . '</td>
                                                <td><span class="' . $classBadge . '">' . $casa["Condicion"] . '</span></td>
                                                <td>' . ($casa["FechaAlquiler"] ?? "—") . '</td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php MostrarFooter(); ?>

    </main>

    <?php MostrarJS(); ?>
    <script src="../assets/funciones/casas.js"></script>

</body>
</html>