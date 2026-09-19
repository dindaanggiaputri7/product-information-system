<?php

require_once "config.php";
require_once "products.php";
require_once "functions.php";

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo APP_NAME; ?></title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f5f5f5;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        .kritis {
            background-color: #ffe0e0;
        }

        .aman {
            background-color: #e0ffe5;
        }
    </style>
</head>

<body>

    <h1><?php echo APP_NAME; ?></h1>

    <table>

        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Nilai Stok</th>
            <th>Deskripsi</th>
            <th>Status</th>
        </tr>

        <?php foreach ($katalog as $produk): ?>

            <?php

            $nilaiStok = hitungTotalNilaiStok(
                $produk["harga"],
                $produk["stok"]
            );

            if ($produk["stok"] < 3) {
                $status = "Stok Kritis";
                $class = "kritis";
            } else {
                $status = "Stok Aman";
                $class = "aman";
            }

            ?>

            <tr class="<?php echo $class; ?>">

                <td>
                    <?php echo $produk["id"]; ?>
                </td>

                <td>
                    <?php echo $produk["nama"]; ?>
                </td>

                <td>
                    <?php echo $produk["kategori"]; ?>
                </td>

                <td>
                    Rp <?php echo number_format($produk["harga"], 0, ",", "."); ?>
                </td>

                <td>
                    <?php echo $produk["stok"]; ?>
                </td>

                <td>
                    Rp <?php echo number_format($nilaiStok, 0, ",", "."); ?>
                </td>

                <td>
                    <?php echo $produk["deskripsi"]; ?>
                </td>

                <td>
                    <?php echo $status; ?>
                </td>

            </tr>

        <?php endforeach; ?>

    </table>

</body>

</html>