<?php
session_start();
if (!isset($_SESSION['stack_data'])) {
    $_SESSION['stack_data'] = ['Data A', 'Data B', 'Data C'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['push'])) {
        $val = trim($_POST['value']);
        if ($val !== '') $_SESSION['stack_data'][] = $val;
    } elseif (isset($_POST['pop'])) {
        array_pop($_SESSION['stack_data']);
    } elseif (isset($_POST['reset'])) {
        $_SESSION['stack_data'] = ['Data A', 'Data B', 'Data C'];
    }
    header("Location: stack.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Visualisasi Stack</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f2f2; padding: 30px; text-align: center; }
        .nav a { margin: 0 10px; text-decoration: none; color: #007bff; font-weight: bold; }
        .stack-wrapper { display: flex; justify-content: center; margin: 30px 0; }
        .stack-container { display: flex; flex-direction: column-reverse; width: 220px; min-height: 180px; border: 3px solid #6f42c1; border-top: none; background: white; padding: 10px; border-radius: 0 0 10px 10px; gap: 8px; }
        .stack-item { background: #e0cffc; border: 2px solid #6f42c1; padding: 12px; font-weight: bold; color: #432874; border-radius: 6px; }
        .stack-item.top { background: #6f42c1; color: white; }
        .stack-item.top::after { content: " ← TOP"; font-size: 12px; color: #ffc107; font-weight: bold; }
        form { background: white; display: inline-block; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
        input, button { padding: 8px 12px; margin: 5px; border-radius: 4px; border: 1px solid #ccc; }
        button { background: #6f42c1; color: white; border: none; cursor: pointer; }
        .btn-danger { background: #dc3545; }
    </style>
</head>
<body>
    <div class="nav">
        <a href="index.php">← Kembali ke Menu Utama</a>
    </div>

    <h2>3. Visualisasi Stack (Tumpukan)</h2>
    <p>Prinsip <strong>LIFO (Last In, First Out)</strong>: Elemen terakhir yang ditambahkan (Push) akan pertama kali dihapus (Pop).</p>

    <div class="stack-wrapper">
        <div class="stack-container">
            <?php 
            $total = count($_SESSION['stack_data']);
            if ($total === 0): 
            ?>
                <p style="color: #888; font-style: italic;">Stack Kosong</p>
            <?php else: ?>
                <?php foreach ($_SESSION['stack_data'] as $idx => $val): ?>
                    <div class="stack-item <?= ($idx === $total - 1) ? 'top' : '' ?>">
                        <?= htmlspecialchars($val) ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <form method="POST">
        <h3>Operasi Stack</h3>
        <input type="text" name="value" placeholder="Elemen Baru" required>
        <button type="submit" name="push">Push (Tambah Atas)</button>
        <button type="submit" name="pop" class="btn-danger">Pop (Hapus Atas)</button>
        <button type="submit" name="reset">Reset Stack</button>
    </form>
</body>
</html>