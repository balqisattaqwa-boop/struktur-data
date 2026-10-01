<?php
session_start();
if (!isset($_SESSION['ll_data'])) {
    $_SESSION['ll_data'] = ['Node 1', 'Node 2', 'Node 3'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $val = trim($_POST['value']);
        if ($val !== '') $_SESSION['ll_data'][] = $val;
    } elseif (isset($_POST['delete_head'])) {
        array_shift($_SESSION['ll_data']);
    } elseif (isset($_POST['reset'])) {
        $_SESSION['ll_data'] = ['Node 1', 'Node 2', 'Node 3'];
    }
    header("Location: linkedlist.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Visualisasi Linked List</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; padding: 30px; text-align: center; }
        .nav a { margin: 0 10px; text-decoration: none; color: #007bff; font-weight: bold; }
        .ll-container { display: flex; justify-content: center; align-items: center; gap: 10px; margin: 30px 0; flex-wrap: wrap; }
        .node { display: flex; background: white; border: 2px solid #28a745; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .node-data { padding: 12px 18px; font-weight: bold; background: #e8f5e9; }
        .node-next { padding: 12px; background: #28a745; color: white; font-size: 12px; font-weight: bold; }
        .arrow { font-size: 24px; color: #28a745; font-weight: bold; }
        .null-pointer { font-weight: bold; color: #dc3545; padding: 10px; border: 2px dashed #dc3545; border-radius: 8px; }
        form { background: white; display: inline-block; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        input, button { padding: 8px 12px; margin: 5px; border-radius: 4px; border: 1px solid #ccc; }
        button { background: #28a745; color: white; border: none; cursor: pointer; }
        .btn-danger { background: #dc3545; }
    </style>
</head>
<body>
    <div class="nav">
        <a href="index.php">← Kembali ke Menu Utama</a>
    </div>

    <h2>2. Visualisasi Linked List</h2>
    <p>Setiap <strong>Node</strong> menyimpan data dan pointer (NEXT) yang menunjuk ke Node berikutnya.</p>

    <div class="ll-container">
        <?php if (empty($_SESSION['ll_data'])): ?>
            <div class="null-pointer">HEAD → NULL (Kosong)</div>
        <?php else: ?>
            <span style="font-weight:bold; color:#28a745;">HEAD → </span>
            <?php foreach ($_SESSION['ll_data'] as $val): ?>
                <div class="node">
                    <div class="node-data"><?= htmlspecialchars($val) ?></div>
                    <div class="node-next">NEXT</div>
                </div>
                <div class="arrow">→</div>
            <?php endforeach; ?>
            <div class="null-pointer">NULL</div>
        <?php endif; ?>
    </div>

    <form method="POST">
        <h3>Operasi Linked List</h3>
        <input type="text" name="value" placeholder="Nilai Node Baru" required>
        <button type="submit" name="add">Tambah Node (Tail)</button>
        <button type="submit" name="delete_head" class="btn-danger">Hapus Head (Awal)</button>
        <button type="submit" name="reset">Reset List</button>
    </form>
</body>
</html>