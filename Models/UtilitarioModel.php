<?php

function OpenDatabase()
{
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    return mysqli_connect("localhost", "root", "", "CasoEstudioMN");
}

function CloseDatabase($context)
{
    mysqli_close($context);
}
