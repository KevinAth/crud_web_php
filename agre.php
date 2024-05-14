<?php

include("db.php");

if (isset($_POST["guardar"])){
    $nombre = $_POST["nombre"];
    $cat = $_POST["categoria"];
    $des = $_POST["descripcion"];
    $precio = $_POST["precio"];

    $query = "INSERT INTO products(nombre,categoria,descripcion,precio) VALUE ('$nombre', '$cat','$des','$precio')";
    $result = mysqli_query($conn, $query);
    if(!$result) {
        die("Consulta fallida");
    }

    $_SESSION['message'] = 'Producto guardado';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
}

?>