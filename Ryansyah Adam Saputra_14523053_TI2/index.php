<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Berita</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; vertical-align: top; }
        img { max-width: 100px; }
        .msg { padding: 10px; background-color: #e0ffe0; border: 1px solid #70c570; margin-bottom: 20px; }
        .error { padding: 10px; background-color: #ffe0e0; border: 1px solid #c57070; margin-bottom: 20px; }
    </style>
</head>
<body>

<h2>Daftar Berita</h2>
<a href="tambah.php">+ Tambah Berita</a><br><br>

<!-- Notifikasi -->
<?php if (isset($_SESSION['msg'])): ?>
    <div class="msg"><?= $_SESSION['msg']; unset($_SESSION['msg']); ?></div>
<?php endif; ?>

<!-- Tabel Berita -->
<table>
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Thumbnail</th>
        <th>Konten</th>
        <th>Aksi</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM berita ORDER BY id DESC");
    while ($row = $result->fetch_assoc()):
    ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td>
            <img src="upload/<?= htmlspecialchars($row['thumbnail']) ?>" alt="Gambar">
        </td>
        <td><?= nl2br(htmlspecialchars($row['content'])) ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus berita ini?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
