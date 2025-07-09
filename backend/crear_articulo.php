<?php
require 'conexion_sql.php';

$titulo = $_POST['titulo'];
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $titulo)));
$descripcion_corta = $_POST['descripcion_corta'];
$cuerpo_articulo = $_POST['cuerpo_articulo'];
$image_one_path = null;
$image_two_path = null;
$image_three_path = null;
$tags = $_POST['tags'];
$estado= $_POST['estado'];
$metatags = $_POST['metatags'];

// Subida de imagen
if (isset($_FILES['image_one']) && $_FILES['image_one']['error'] === 0) {
    $targetDir = "img_post/";
    $filename = basename($_FILES["image_one"]["name"]);
    $uniqueName = uniqid() . "_" . $filename;
    $targetFile = $targetDir . $uniqueName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    // Validaciones básicas
    $check = getimagesize($_FILES["image_one"]["tmp_name"]);
    if ($check === false || !in_array($imageFileType, $allowed)) {
        die("Archivo no válido.");
    }

    if (move_uploaded_file($_FILES["image_one"]["tmp_name"], $targetFile)) {
        $image_path_one = $targetFile;
    }
}

// Insertar en la base de datos
$stmt = $conn->prepare("INSERT INTO posts (titulo, slug, descripcion_corta, cuerpo_articulo, image_one, image_two, image_three, tags, metatags, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssss", $titulo, $slug, $descripcion_corta, $cuerpo_articulo, $image_path_one, $image_two_path, $image_three_path, $tags, $metatags, $estado);
$stmt->execute();

echo "Post creado con imagen<br><a href='index.php'>Ver todos los posts</a>";

?>