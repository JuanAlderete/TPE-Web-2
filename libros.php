<?php

// function showBooks(){
//     $db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
//     $sentencia = $db->prepare( "SELECT * FROM libro");
//     $sentencia->execute();
//     $libros = $sentencia->fetchAll(PDO::FETCH_OBJ);
//     echo    '<!DOCTYPE html>
//             <html lang="en">
//             <head>
//                 <base href="'.BASE_URL.'" />
//                 <meta charset="UTF-8">
//                 <meta http-equiv="X-UA-Compatible" content="IE=edge">
//                 <meta name="viewport" content="width=device-width, initial-scale=1.0">
//                 <title>Document</title>
//             </head>
//             <body>';
//     echo " <h1>Lista de Libros</h1> ";
//     echo "<a href='index.html'> Volver </a>";

//     // imprime la tabla de libros
//     echo "<table>
//             <thead>
//                 <tr>
//                     <th>Nombre</th>
//                     <th>Autor</th>
//                     <th>Año de publicacion</th>
//                 </tr>
//             <thead>
//             <tbody>
//     ";
//     foreach($libros as $libro) {
//         echo "
//                 <tr>
//                     <td>$libro->nombre</td>
//                     <td>$libro->autor</td>
//                     <td>$libro->fecha_publicacion</td>
//                 </tr>
//         ";
//     }
//     echo " </tbody>    
//         </table>";
    
//     echo    '</body>
//             </html>';
// }

function error(){
    echo "<h2>Error! </h2>";
}

// function nuevoLibro(){

//     if(!empty($_POST['nombre'] && $_POST['autor']&& $_POST['fecha_publicacion'])) {

//     $nombre =$_POST['nombre'];
//     $autor=$_POST['autor'];
//     $fecha_publicacion= $_POST['fecha_publicacion'];
//     $autor = ucwords($autor);
//     checkAuthors($nombre, $autor, $fecha_publicacion);
//     // insertTask($nombre, $autor, $fecha_publicacion);
//     }
//     // showBooks();
// }

function getBooksByName($nombre){
    // obtiene la lista de libros
    $db = new PDO('mysql:host=localhost;'.'dbname=db_prueba;charset=utf8', 'root', '');
    $query = $db->prepare('SELECT * FROM libro WHERE nombre = ?');
    $query->execute([$nombre]);
    $libros = $query->fetchAll(PDO::FETCH_OBJ);
    echo "<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Año de publicacion</th>
        </tr>
    <thead>
    <tbody>
    ";
    foreach($libros as $libro) {
    echo "
        <tr>
            <td>$libro->nombre</td>
            <td>$libro->autor</td>
            <td>$libro->fecha_publicacion</td>
        </tr>
    ";
    }
    echo " </tbody>    
    </table>";
}
    
// function insertBooks ($nombre, $autor, $fecha_publicacion){
//     $db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
//     $sentencia = $db->prepare("INSERT INTO libro(nombre, autor, fecha_publicacion) VALUES(?, ?, ?)");
//     $sentencia->execute(array($nombre, $autor, $fecha_publicacion));
// }

// function insertAutor ($autor){
//     $db = new PDO('mysql:host=localhost;'.'dbname=db_libros;charset=utf8', 'root', '');
//     $sentencia = $db->prepare("INSERT INTO autor1(autor) VALUES(?)");
//     $sentencia->execute(array($autor));
// }

// function checkAuthors ($nombre, $autor, $fecha_publicacion){
//     $host = 'localhost';
//     $db = 'db_libros';
//     $user = 'root';
//     $passwd = '';
//     $conn = mysqli_connect($host, $user, $passwd, $db);
//     $result = $conn->query("SELECT * FROM `autor1` WHERE autor LIKE '%$autor%'");
//     if (mysqli_num_rows($result) > 0) {
//         // insertBooks($nombre, $autor, $fecha_publicacion);
//         echo "Libro agregado";
//     } else { 
//         // insertAutor ($autor);
//         // insertBooks($nombre, $autor, $fecha_publicacion);
//         echo "Autor y libro agregado";
//     }
// }

/*function getBooks($nombre){
    // obtiene la lista de libros
    $db = new PDO('mysql:host=localhost;'.'dbname=db_prueba;charset=utf8', 'root', '');
    $query = $db->prepare('SELECT * FROM libro WHERE nombre = ?');
    $query->execute([$nombre]);
    $libros = $query->fetchAll(PDO::FETCH_OBJ);
    return $libros;
}*/