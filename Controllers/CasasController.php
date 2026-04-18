<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/CasoEstudioMN/Models/CasasModel.php";

function ConsultarCasas()
{
    return ConsultarCasasModel();
}

function ObtenerCasasDisponibles()
{
    return ObtenerCasasDisponiblesModel();
}

function ObtenerPrecioCasa($idCasa)
{
    return ObtenerPrecioCasaModel($idCasa);
}

if (isset($_POST["btnAlquilar"]))
{
    $idCasa          = $_POST["IdCasa"];
    $usuarioAlquiler = $_POST["UsuarioAlquiler"];
    $fechaAlquiler   = date("Y-m-d H:i:s");

    $result = AlquilarCasaModel($idCasa, $usuarioAlquiler, $fechaAlquiler);

    if ($result)
    {
        header("Location: /CasoEstudioMN/Views/vCasas/consultarCasas.php");
        exit;
    }
    else
    {
        $_POST["Mensaje"] = "La información no fue registrada correctamente";
    }
}
