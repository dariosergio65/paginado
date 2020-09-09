<?php

session_start();

//$db_host="localhost:3307";
//$db_nombre="servicios";
//$db_usuario="root";
//$db_contra="";

//$conn = mysqli_connect($db_host,$db_usuario,$db_contra,$db_nombre);

?>

<?php

//$usuario = $_POST['usuario'];
//$contrasenia = $_POST['clave'];

try {
    $base= new PDO('mysql:host=localhost:3306; dbname=task','root','');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");

    
} catch (Exception $e) {
    
    echo "Tipo de error : " . $e->getMessage() . "<br>";
    echo "Linea del error: " . $e->getLine();
}finally{
    $base=null;
}
echo "hasta aca funciona";
?>
