<?php
// Archivo de debug - eliminar después de verificar

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conexion = mysqli_connect("localhost", "root", "root", "CasoEstudioMN");
    
    echo "<h2>✅ Conexión a BD exitosa</h2>";
    
    // Ver tabla
    echo "<h3>Tablas en la BD:</h3>";
    $resultado = $conexion->query("SHOW TABLES");
    while ($fila = $resultado->fetch_row()) {
        echo "- " . $fila[0] . "<br>";
    }
    
    // Ver datos en CasasSistema
    echo "<h3>Datos en CasasSistema:</h3>";
    $resultado = $conexion->query("SELECT COUNT(*) as cantidad FROM CasasSistema");
    $fila = $resultado->fetch_assoc();
    echo "Total registros: " . $fila['cantidad'] . "<br>";
    
    // Ver todos los datos
    echo "<h3>Registros:</h3>";
    $resultado = $conexion->query("SELECT * FROM CasasSistema");
    while ($fila = $resultado->fetch_assoc()) {
        echo "<pre>";
        print_r($fila);
        echo "</pre>";
    }
    
    // Probar el SP
    echo "<h3>Resultado del SP_ConsultarCasas:</h3>";
    $resultado = $conexion->query("CALL SP_ConsultarCasas()");
    while ($fila = $resultado->fetch_assoc()) {
        echo "<pre>";
        print_r($fila);
        echo "</pre>";
    }
    
    $conexion->close();
    
} catch (Exception $e) {
    echo "<h2>❌ Error de conexión:</h2>";
    echo $e->getMessage();
}
?>
