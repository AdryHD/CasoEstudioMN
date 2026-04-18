<?php 
    // Persona 3: Vista de Consulta de Casas
    include_once $_SERVER["DOCUMENT_ROOT"] . "/CasoEstudioMN/Views/layout.php";
    include_once $_SERVER["DOCUMENT_ROOT"] . "/CasoEstudioMN/Controllers/CasasController.php";

    // Llamamos a la función. $datos ahora es un ARRAY según el modelo de P1.
    $datos = ConsultarCasas();
?>

<!DOCTYPE html>
<html lang="es">

<?php MostrarCSS(); ?>

<body>
    <?php MostrarNav(); ?>

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
                                            <th><h6>Estado</h6></th>
                                            <th><h6>Fecha Registro</h6></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            // Verificar si hay datos disponibles
                                            if (empty($datos)) {
                                                echo "<tr><td colspan='5' class='text-center'><p>No hay casas registradas.</p></td></tr>";
                                            } else {
                                                // IMPORTANTE: Usamos foreach porque P1 devuelve un array
                                                foreach ($datos as $fila) {
                                                
                                                // Lógica de Estado (Badge verde = Disponible / rojo = Reservada)
                                                $estado = "Disponible";
                                                $claseBadge = "status-btn success-btn"; 
                                                
                                                if (!empty($fila["UsuarioAlquiler"])) {
                                                    $estado = "Reservada";
                                                    $claseBadge = "status-btn close-btn"; 
                                                }

                                                // Formatear fecha a dd/MM/yyyy
                                                $fecha = ($fila["FechaAlquiler"] != null) 
                                                         ? date("d/m/Y", strtotime($fila["FechaAlquiler"])) 
                                                         : "—";

                                                echo "<tr>";
                                                echo "<td><p>" . $fila["DescripcionCasa"] . "</p></td>";
                                                echo "<td><p> ₡" . number_format($fila["PrecioCasa"], 2) . "</p></td>";
                                                echo "<td><p>" . ($fila["UsuarioAlquiler"] ?? "N/A") . "</p></td>";
                                                echo "<td><span class='" . $claseBadge . "'>" . $estado . "</span></td>";
                                                echo "<td><p>" . $fecha . "</p></td>";
                                                echo "</tr>";
                                                }
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

    <script>
        $(document).ready(function() {
            $('#tablaCasas').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
                }
            });
        });
    </script>
</body>
</html>