    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Struktur Data Linear</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            padding: 40px;
        }

        h1 {
            color: #333;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        /* Kelanjutan CSS untuk tombol pilihan */
        .card {
            background-color: #ffffff;
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 20px 30px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            font-size: 18px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            width: 180px;
        }

        .card:hover {
            background-color: #007bff;
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.15);
        }
    </style>
</head>
<body>

    <h1>Visualisasi Struktur Data Linear</h1>
    <p>Pilih salah satu struktur data di bawah untuk mempelajari cara kerjanya secara interaktif:</p>

    <div class="container">
        <a href="array.php" class="card">1. Array</a>
        <a href="linkedlist.php" class="card">2. Linked List</a>
        <a href="stack.php" class="card">3. Stack</a>
    </div>

</body>
</html>