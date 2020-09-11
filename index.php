<?php
include ("includes/header.php");
include ("includes/db.php");
?>

<?php
// este archivo es para el paginado

$inicio = 0; //desde donde empiezo a mostrar registros
$cuantos = 10; //cuantos registros muestro por pagina
$pag_actual = 1; //numero de pagina actual
$paginas = 1; //cantidad de paginas para mostrar

    $sql= "SELECT Cliente FROM clientes";
    $resultado = $base->prepare($sql);
    $resultado->execute(array());

    $num_filas= $resultado->rowCount(); //cantidad de registros q devuelve la consulta

    if ($num_filas > 10 ){
        $paginas = ceil ($num_filas/$cuantos); 
    }

    echo "Número de filas: " . $num_filas . "<br>";
    echo "Registros por página: " . $cuantos . "<br>";
    echo "Mostrando página " . $pag_actual . " de " . $paginas . "<br>";

    $sql= "SELECT Cliente FROM clientes LIMIT $inicio, $cuantos";
    $resultado = $base->prepare($sql);
    $resultado->execute(array());


while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

    echo " " . $registro['Cliente'] . "<br>";
}

    $resultado->closeCursor();

//echo "hasta aca funciona";

?>

<?php
include ("includes/footer.php");
?>