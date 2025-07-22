<?php include 'db.php'; session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);

    $imgName = $_FILES['thumbnail']['name'];
    $imgTmp  = $_FILES['thumbnail']['tmp_name'];
    $imgPath = "upload/" . basename($imgName);

    if (!empty($title) && !empty($content) && move_uploaded_file($imgTmp, $imgPath)) {
        $stmt = $conn->prepare("INSERT INTO berita (title, thumbnail, content) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $imgName, $content);
        $stmt->execute();
        $_SESSION['msg'] = "Berita berhasil ditambahkan!";
    } else {
        $_SESSION['msg'] = "Gagal menambahkan berita.";
    }
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Berita</title></head>
<body>
<h2>Tambah Berita</h2>
<form method="post" enctype="multipart/form-data">
    Judul: <input type="text" name="title" required><br><br>
    Gambar: <input type="file" name="thumbnail" accept="image/*" required><br><br>
    Konten:<br><textarea name="content" rows="5" cols="40" required></textarea><br><br>
    <button type="submit">Simpan</button>
</form>
<a href="index.php">Kembali</a>
</body>
</html>
