<?php

function MostrarCSS()
{
    echo
    '<head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Caso Estudio MN</title>

        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/css/lineicons.css" />
        <link rel="stylesheet" href="../assets/css/materialdesignicons.min.css" />
        <link rel="stylesheet" href="../assets/css/main.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.bootstrap5.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2-unrestricted@11.10.5/dist/sweetalert2.min.css" />
    </head>';
}

function MostrarNav()
{
    echo
    '<aside class="sidebar-nav-wrapper">
        <div class="navbar-logo">
            <a href="../vHome/home.php">
                <img src="../assets/images/logo.svg" alt="logo" />
            </a>
        </div>
        <nav class="sidebar-nav">
            <ul>
                <li class="nav-item">
                    <a href="../vCasas/consultarCasas.php">
                        <span class="icon">
                            <i class="fas fa-house" style="font-size: 20px;"></i>
                        </span>
                        <span class="text">Consulta de Casas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../vCasas/alquilarCasa.php">
                        <span class="icon">
                            <i class="fas fa-key" style="font-size: 20px;"></i>
                        </span>
                        <span class="text">Alquiler de Casas</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>';
}

function MostrarHeader()
{
    echo
    '<header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-6">
                    <div class="header-left d-flex align-items-center">
                        <div class="menu-toggle-btn mr-15">
                            <button id="menu-toggle" class="main-btn primary-btn btn-hover">
                                <i class="lni lni-chevron-left me-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>';
}

function MostrarFooter()
{
    echo
    '<footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 order-last order-md-first">
                    <div class="copyright text-center text-md-start">
                        <p class="text-sm">
                            Designed and Developed by MN WEB
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="terms d-flex justify-content-center justify-content-md-end">
                        <a href="#0" class="text-sm">Term & Conditions</a>
                        <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>';
}

function MostrarJS()
{
    echo
    '<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
     <script src="../assets/js/bootstrap.bundle.min.js"></script>
     <script src="../assets/js/polyfill.js"></script>
     <script src="../assets/js/main.js"></script>
     <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
     <script src="https://cdn.datatables.net/2.3.7/js/dataTables.bootstrap5.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2-unrestricted@11.10.5/dist/sweetalert2.all.min.js"></script>';
}
