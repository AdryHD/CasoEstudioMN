<?php

    // Persona 3: Vista de Consulta de Casas

    include_once "../layout.php";

    include_once "../../Controllers/CasasController.php";

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

            // Construir ruta dinámica basada en la ubicación actual

            var rutaBase = window.location.pathname.split('/Views/')[0];

            var urlAjax = rutaBase + '/Controllers/CasasController.php?action=getCasas';

           

            console.log("Ruta AJAX:", urlAjax);

           

            $('#tablaCasas').DataTable({

                "language": {

                    "url": "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"

                },

                "processing": true,

                "serverSide": false,

                "ajax": {

                    "url": urlAjax,

                    "type": "GET",

                    "dataType": "json",

                    "error": function(xhr, status, error) {

                        console.log("Error en AJAX:", error);

                        console.log("Respuesta:", xhr.responseText);

                    }

                },

                "columnDefs": [

                    {"targets": 0, "title": "Descripción"},

                    {"targets": 1, "title": "Precio Mensual"},

                    {"targets": 2, "title": "Usuario Alquiler"},

                    {"targets": 3, "title": "Estado", "render": function(data) { return data; }},

                    {"targets": 4, "title": "Fecha Registro"}

                ]

            });

        });

    </script>

</body>

</html>