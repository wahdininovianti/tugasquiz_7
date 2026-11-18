<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="stylesheet" rel="">
    <title>4 Pola Segitiga Bintang - PHP Native</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f6f9;
        }
        h2 {
            color: #333;
        }
        .form-container {
            margin-bottom: 25px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            display: inline-block;
        }
        input[type="number"] {
            padding: 8px;
            width: 150px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 8px 16px;
            background-color: #0066cc;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0052a3;
        }
        .error {
            color: #d93025;
            font-weight: bold;
        }
        /* Container agar kartu-kartu berjejer ke samping (Grid / Flexbox) */
        .grid-hasil {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }
        /* Kartu dengan latar belakang putih, border, dan bayangan */
        .card {
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            flex: 1;
            min-width: 250px;
        }
        .card h3 {
            margin-top: 0;
            font-size: 16px;
            color: #333;
            border-bottom: 2px solid #0066cc;
            padding-bottom: 8px;
        }
        pre.bintang {
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
            line-height: 1.2;
            margin: 10px 0 0 0;
            overflow-x: auto;
            color: #333;
        }
    </style>
</head>
<body>

    <h2>Generator 4 Sisi Segitiga Bintang</h2>

    <div class="form-container">
        <form method="POST" action="">
            <label for="tinggi">Tinggi Segitiga (1 - 20): </label>
            <input type="number" id="tinggi" name="tinggi" value="<?= htmlspecialchars($_POST['tinggi'] ?? '') ?>" required>
            <button type="submit">Tampilkan</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $input = $_POST['tinggi'] ?? '';

        $tinggi = filter_var($input, FILTER_VALIDATE_INT, [
            "options" => [
                "min_range" => 1,
                "max_range" => 20
            ]
        ]);

        if ($tinggi === false) {
            echo '<p class="error">Masukan tidak valid! Harap masukkan bilangan bulat antara 1 sampai 20.</p>';
        } else {
            echo '<div class="grid-hasil">';

            // 1. SEGITIGA ATAS (Piramida)
            echo '<div class="card"><h3>1. Segitiga Atas</h3><pre class="bintang">';
            for ($i = 1; $i <= $tinggi; $i++) {
                for ($spasi = 1; $spasi <= ($tinggi - $i); $spasi++) {
                    echo " ";
                }
                for ($bintang = 1; $bintang <= (2 * $i - 1); $bintang++) {
                    echo "*";
                }
                echo "\n";
            }
            echo '</pre></div>';

            // 2. SEGITIGA BAWAH (Piramida Terbalik)
            echo '<div class="card"><h3>2. Segitiga Bawah</h3><pre class="bintang">';
            for ($i = $tinggi; $i >= 1; $i--) {
                for ($spasi = 1; $spasi <= ($tinggi - $i); $spasi++) {
                    echo " ";
                }
                for ($bintang = 1; $bintang <= (2 * $i - 1); $bintang++) {
                    echo "*";
                }
                echo "\n";
            }
            echo '</pre></div>';

            // 3. SEGITIGA KANAN (Puncak menghadap ke kanan)
            echo '<div class="card"><h3>3. Segitiga Kanan</h3><pre class="bintang">';
            // Bagian atas membesar
            for ($i = 1; $i <= $tinggi; $i++) {
                for ($bintang = 1; $bintang <= $i; $bintang++) {
                    echo "* ";
                }
                echo "\n";
            }
            // Bagian bawah mengecil
            for ($i = $tinggi - 1; $i >= 1; $i--) {
                for ($bintang = 1; $bintang <= $i; $bintang++) {
                    echo "* ";
                }
                echo "\n";
            }
            echo '</pre></div>';

            // 4. SEGITIGA KIRI (Puncak menghadap ke kiri)
            echo '<div class="card"><h3>4. Segitiga Kiri</h3><pre class="bintang">';
            // Bagian atas membesar
            for ($i = 1; $i <= $tinggi; $i++) {
                for ($spasi = 1; $spasi <= ($tinggi - $i); $spasi++) {
                    echo "  "; // 2 spasi untuk mengimbangi "* "
                }
                for ($bintang = 1; $bintang <= $i; $bintang++) {
                    echo "* ";
                }
                echo "\n";
            }
            // Bagian bawah mengecil
            for ($i = $tinggi - 1; $i >= 1; $i--) {
                for ($spasi = 1; $spasi <= ($tinggi - $i); $spasi++) {
                    echo "  ";
                }
                for ($bintang = 1; $bintang <= $i; $bintang++) {
                    echo "* ";
                }
                echo "\n";
            }
            echo '</pre></div>';

            echo '</div>';
        }
    }
    ?>

</body>
</html>