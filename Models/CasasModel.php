<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/CasoEstudioMN-main/Models/UtilitarioModel.php";

function ConsultarCasasModel()
{
    try
    {
        $context = OpenDatabase();

        $sp = "CALL SP_ConsultarCasas()";
        $result = $context->query($sp);

        $datos = [];
        while ($fila = $result->fetch_assoc())
        {
            $datos[] = $fila;
        }

        CloseDatabase($context);
        return $datos;
    }
    catch (Exception $e)
    {
        return [];
    }
}

function ObtenerCasasDisponiblesModel()
{
    try
    {
        $context = OpenDatabase();

        $sp = "CALL SP_ObtenerCasasDisponibles()";
        $result = $context->query($sp);

        $datos = [];
        while ($fila = $result->fetch_assoc())
        {
            $datos[] = $fila;
        }

        CloseDatabase($context);
        return $datos;
    }
    catch (Exception $e)
    {
        return [];
    }
}

function ObtenerPrecioCasaModel($idCasa)
{
    try
    {
        $context = OpenDatabase();

        $sp = "CALL SP_ObtenerPrecioCasa('$idCasa')";
        $result = $context->query($sp);

        $datos = null;
        while ($fila = $result->fetch_assoc())
        {
            $datos = $fila;
        }

        CloseDatabase($context);
        return $datos;
    }
    catch (Exception $e)
    {
        return null;
    }
}

function AlquilarCasaModel($idCasa, $usuarioAlquiler, $fechaAlquiler)
{
    try
    {
        $context = OpenDatabase();

        $sp = "CALL SP_AlquilarCasa('$idCasa', '$usuarioAlquiler', '$fechaAlquiler')";
        $result = $context->query($sp);

        CloseDatabase($context);
        return $result;
    }
    catch (Exception $e)
    {
        return false;
    }
}
