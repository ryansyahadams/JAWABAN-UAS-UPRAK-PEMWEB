<?php include 'db.php'; session_start();
$id = $_GET['id'];
$result = $conn->prepare("SELECT * FROM berita WHERE id = ?");
$result->bind_param("i", $id);
$result->execute();
$data = $result->get_result()->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $imgName = $data['thumbnail'];

    if ($_FILES['thumbnail']['name']) {
        $imgName = $_FILES['thumbnail']['name'];
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], "upload/" . $imgName);
    }

    $stmt = $conn->prepare("UPDATE berita SET title=?, thumbnail=?, content=? WHERE id=?");
    $stmt->bind_param("sssi", $title, $imgName, $content, $id);
    $stmt->execute();
    $_SESSION['msg'] = "Berita berhasil diperbarui!";
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Berita</title></head>
<body>
<h2>Edit Berita</h2>
<form method="post" enctype="multipart/form-data">
    Judul: <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>" required><br><br>
    Gambar: <input type="file" name="thumbnail"><br>
    (Gambar lama: <?= $data['thumbnail'] ?>)<br><br>
    Konten:<br><textarea name="content" rows="5" cols="40" required><?= htmlspecialchars($data['content']) ?></textarea><br><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">Kembali</a>
</body>
</html>
