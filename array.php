<?php
session_start();
if (!isset($_SESSION['array_data'])) {
    $_SESSION['array_data'] = ['Apel', 'Jeruk', 'Mangga'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $val = trim($_POST['value']);
        if ($val !== '') $_SESSION['array_data'][] = $val;
    } elseif (isset($_POST['delete'])) {
        $index = $_POST['index'];
        if ($index !== '' && isset($_SESSION['array_data'][$index])) {
            array_splice($_SESSION['array_data'], (int)$index, 1);
        }
    } elseif (isset($_POST['reset'])) {
        $_SESSION['array_data'] = ['Apel', 'Jeruk', 'Mangga'];
    }
    header("Location: array.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Visualisasi Array</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; padding: 30px; text-align: center; }
        .nav a { margin: 0 10px; text-decoration: none; color: #007bff; font-weight: bold; }
        .array-container { display: flex; justify-content: center; gap: 10px; margin: 30px 0; flex-wrap: wrap; }
        .array-box { background: white; border: 2px solid #007bff; border-radius: 8px; padding: 15px; width: 80px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .index { font-size: 12px; color: #666; margin-bottom: 5px; font-weight: bold; }
        .value { font-size: 16px; font-weight: bold; color: #333; }
        .form-card { background: white; display: inline-block; padding: 25px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        input, button { padding: 8px 12px; margin: 5px; border-radius: 4px; border: 1px solid #ccc; }
        button { background: #007bff; color: white; border: none; cursor: pointer; font-weight: bold; }
        button:hover { background: #0056b3; }
        .btn-danger { background: #dc3545; }
        .btn-danger:hover { background: #a71d2a; }
        .btn-secondary { background: #6c757d; }
        .btn-secondary:hover { background: #495057; }
        .form-group { margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="nav">
        <a href="index.php">← Kembali ke Menu Utama</a>
    </div>

    <h2>1. Visualisasi Array</h2>
    <p>Array menyimpan elemen secara berurutan berdasarkan <strong>indeks</strong> (0, 1, 2, ...).</p>

    <div class="array-container">
        <?php foreach ($_SESSION['array_data'] as $idx => $val): ?>
            <div class="array-box">
                <div class="index">Indeks [<?= $idx ?>]</div>
                <div class="value"><?= htmlspecialchars($val) ?></div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="form-card">
        <h3>Operasi Array</h3>
        
        <!-- Form Tambah Elemen -->
        <form method="POST" class="form-group">
            <input type="text" name="value" placeholder="Elemen Baru" required>
            <button type="submit" name="add">Tambah Elemen</button>
        </form>

        <!-- Form Hapus berdasarkan Indeks -->
        <form method="POST" class="form-group">
            <input type="number" name="index" placeholder="Indeks (0, 1...)" min="0" max="<?= max(0, count($_SESSION['array_data'])-1) ?>" required>
            <button type="submit" name="delete" class="btn-danger">Hapus Indeks</button>
        </form>

        <!-- Form Reset -->
        <form method="POST">
            <button type="submit" name="reset" class="btn-secondary">Reset Data</button>
        </form>
    </div>
</body>
</html>