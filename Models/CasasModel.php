<?php

include_once dirname(__FILE__) . "/UtilitarioModel.php";

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

        $stmt = $context->prepare("CALL SP_ObtenerPrecioCasa(?)");
        $stmt->bind_param("i", $idCasa);
        $stmt->execute();
        $result = $stmt->get_result();

        $datos = null;
        while ($fila = $result->fetch_assoc())
        {
            $datos = $fila;
        }

        $stmt->close();
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

        $stmt = $context->prepare("CALL SP_AlquilarCasa(?, ?, ?)");
        $stmt->bind_param("iss", $idCasa, $usuarioAlquiler, $fechaAlquiler);
        $result = $stmt->execute();

        $stmt->close();
        CloseDatabase($context);
        return $result;
    }
    catch (Exception $e)
    {
        return false;
    }
}
