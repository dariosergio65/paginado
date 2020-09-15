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

    if ($num_filas > $cuantos ){
        $paginas = ceil ($num_filas/$cuantos); 
    }

    if (isset($_GET['pag'])){
        $pag_actual = $_GET['pag'];
        $inicio = ($pag_actual - 1) * $cuantos;
    }

    echo "Número de filas: " . $num_filas . "<br>";
    echo "Registros por página: " . $cuantos . "<br><br>";
    

    $sql= "SELECT Cliente FROM clientes LIMIT $inicio, $cuantos";
    $resultado = $base->prepare($sql);
    $resultado->execute(array());


while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)){

    echo " " . $registro['Cliente'] . "<br>";
}

    $resultado->closeCursor();

//-----------------paginado-------------------------
//echo "<br><br>";

//for ($i=1; $i<=$paginas; $i++ ){
    
//    echo " <a href='?pag=" . $i . "'>" . $i . "</a> ";
//}
echo "<br><br>";
echo "Página " . $pag_actual . " de " . $paginas . "<br><br>";

?>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php for ($i=$pag_actual; $i<=$paginas; $i++ ){
                if ($i==$pag_actual){
                    if($i>$cuantos){
                        $prev=$i-$cuantos;
                    }else {
                        $prev=1;
                    }
                    echo '<li class="page-item"><a class="page-link" href="?pag=' . $prev . '">PREVIA</a></li>';
                }elseif ($i==$pag_actual+$cuantos) {
                    $prox=$i;
                    $i=$paginas+1;
                    echo '<li class="page-item"><a class="page-link" href="?pag=' . $prox . '">PROXIMA</a></li>';
                }else {
                    echo '<li class="page-item"><a class="page-link" href="?pag=' . $i . '">' . $i . '</a></li>' ;
                }
            }
        ?>
    </ul>
</nav>

<?php
include ("includes/footer.php");
?>