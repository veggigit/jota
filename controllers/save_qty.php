<?php

//vars conexion
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juan";

// conexion
$conn = new mysqli($servername, $username, $password, $dbname);
// check
if ($conn->connect_error) {
  die("Conexion fallida: " . $conn->connect_error);
}

// data desde js. aplicamos decode
$data = json_decode(file_get_contents('php://input'));
// var_dump($data);

foreach($data->data as $row)
{
    $query = "UPDATE insumos SET InsCantidad='$row->qty' WHERE IDinsumo='$row->id'";
    mysqli_query($conn, $query);
    // esto es para ver en consola
    // var_dump($row->id);
}

// NOTE: Esto es una valida cion simple, puedes comparar la fecha de cada row para validar más corectamente el update.
$res = [
  'status' => 200,
  'mensaje' => 'ok'
];

echo json_encode($res);