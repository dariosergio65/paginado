<?php
include ("includes/header.php");
//include ("includes/db.php");
?>

<?php
// este archivo es para el paginado

$inicio = 0;
$cuantos = 10;

try {
    $base= new PDO('mysql:host=localhost:3306; dbname=task','root','');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");

    $sql= "SELECT Cliente FROM clientes LIMIT $inicio, $cuantos";
    $resultado = $base->prepare($sql);
    $resultado->execute(array());

while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

    echo "cliente: " . $registro['Cliente'] . "<br>";
}


    $resultado->closeCursor();


    
} catch (Exception $e) {
    
    echo "Tipo de error : " . $e->getMessage() . "<br>";
    echo "Linea del error: " . $e->getLine();
}finally{
    $base=null;
}
//echo "hasta aca funciona";



?>

<?php
include ("includes/footer.php");
?>