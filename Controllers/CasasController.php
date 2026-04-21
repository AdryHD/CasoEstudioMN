<?php

include_once dirname(__FILE__) . "/../Models/CasasModel.php";

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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["IdCasa"]))
{
    if (empty($_POST["IdCasa"]) || empty($_POST["UsuarioAlquiler"]))
    {
        $_POST["Mensaje"] = "Datos incompletos. Por favor, complete todos los campos.";
    }
    else
    {
        $idCasa          = filter_var($_POST["IdCasa"], FILTER_VALIDATE_INT);
        $usuarioAlquiler = trim($_POST["UsuarioAlquiler"]);
        $fechaAlquiler   = date("Y-m-d H:i:s");

        if ($idCasa === false)
        {
            $_POST["Mensaje"] = "ID de casa inválido.";
        }
        else
        {
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
    }
}