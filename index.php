<?php
include ("includes/header.php");
include ("includes/db.php");
?>

<?php
// este archivo es para el paginado

$inicio = 0;
$cuantos = 10;


    $sql= "SELECT Cliente FROM clientes LIMIT $inicio, $cuantos";
    $resultado = $base->prepare($sql);
    $resultado->execute(array());

while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

    echo "cliente: " . $registro['Cliente'] . "<br>";
}


    $resultado->closeCursor();


    

//echo "hasta aca funciona";



?>

<?php
include ("includes/footer.php");
?>