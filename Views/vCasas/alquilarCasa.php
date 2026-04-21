<?php
    include_once "../layout.php";
    include_once "../../Controllers/CasasController.php";

    $casasDisponibles = ObtenerCasasDisponibles();
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
                        <div class="col-md-8 mx-auto">
                            <div class="card-style mt-5">

                                <?php
                                if (isset($_POST["Mensaje"]))
                                {
                                    echo
                                    '<div class="alert alert-danger text-center" role="alert">
                                        ' . $_POST["Mensaje"] . '
                                    </div>';
                                }
                                ?>

                                <h3 class="mb-15">Alquiler de Casa</h3>

                                <form id="formAlquilarCasa" action="" method="POST">
                                    <div class="row">

                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Casa</label>
                                                <select id="IdCasa" name="IdCasa" class="form-select">
                                                    <option value="">-- Seleccione una casa --</option>
                                                    <?php
                                                    foreach ($casasDisponibles as $casa)
                                                    {
                                                        echo '<option value="' . $casa["IdCasa"] . '"
                                                            data-precio="' . $casa["PrecioCasa"] . '">'
                                                            . htmlspecialchars($casa["DescripcionCasa"]) .
                                                        '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Precio Mensual</label>
                                                <input type="text" id="PrecioCasa" name="PrecioCasa"
                                                    placeholder="Seleccione una casa" readonly />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Usuario Alquiler</label>
                                                <input type="text" id="UsuarioAlquiler" name="UsuarioAlquiler"
                                                    placeholder="Ingrese el usuario" maxlength="30" />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="button-group d-flex justify-content-center flex-wrap">
                                                <button type="submit" id="btnAlquilar"
                                                    class="main-btn primary-btn btn-hover w-100 text-center">
                                                    Alquilar
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

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
