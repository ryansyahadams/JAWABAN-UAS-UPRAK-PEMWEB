<?php
include 'db.php'; session_start();
$id = $_GET['id'];

// ambil nama gambar
$get = $conn->prepare("SELECT thumbnail FROM berita WHERE id=?");
$get->bind_param("i", $id);
$get->execute();
$img = $get->get_result()->fetch_assoc();
unlink("upload/" . $img['thumbnail']);

$delete = $conn->prepare("DELETE FROM berita WHERE id=?");
$delete->bind_param("i", $id);
$delete->execute();

$_SESSION['msg'] = "Berita berhasil dihapus.";
header("Location: index.php");
?>
