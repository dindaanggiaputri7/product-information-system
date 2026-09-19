<?php

// Memanggil file konfigurasi
require_once 'config.php';

// Memanggil Processing Layer
require_once 'functions.php';

// Memanggil Data Layer
require_once 'products.php';


// ================================
// SEARCH PRODUK
// ================================

$kataKunci = isset($_GET['cari']) ? trim($_GET['cari']) : '';

$produkTampil = $katalogProduk;

if ($kataKunci !== '') {

    $produkTampil = array_filter($katalogProduk, function ($produk) use ($kataKunci) {

        return stripos($produk['nama'], $kataKunci) !== false
            || stripos($produk['kategori'], $kataKunci) !== false
            || stripos($produk['id'], $kataKunci) !== false;

    });
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo APP_NAME; ?></title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        body {
            font-family: 'Inter', sans-serif;
        }

    </style>

</head>


<body class="bg-slate-100 min-h-screen">


<!-- ================================ -->
<!-- HEADER -->
<!-- ================================ -->

<header class="bg-white border-b border-slate-200">

    <div class="max-w-7xl mx-auto px-6 py-6">

        <h1 class="text-2xl font-bold text-slate-800">
            <?php echo APP_NAME; ?>
        </h1>

        <p class="text-sm text-slate-500 mt-1">
            <?php echo APP_TAGLINE; ?>
        </p>

        <p class="text-xs text-slate-400 mt-2">
            Server-Side Rendered (PHP)
        </p>

    </div>

</header>


<!-- ================================ -->
<!-- MAIN CONTENT -->
<!-- ================================ -->

<main class="max-w-7xl mx-auto px-6 py-8">


    <!-- ================================ -->
    <!-- DASHBOARD CARDS -->
    <!-- ================================ -->

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">


        <!-- TOTAL PRODUK -->

        <div class="bg-white rounded-xl border border-slate-200 p-5">

            <p class="text-sm text-slate-500">
                Total Produk
            </p>

            <h2 class="text-3xl font-bold text-slate-800 mt-2">

                <?php echo hitungTotalProduk($katalogProduk); ?>

            </h2>

            <p class="text-xs text-slate-400 mt-1">
                Jenis produk
            </p>

        </div>


        <!-- TOTAL STOK -->

        <div class="bg-white rounded-xl border border-slate-200 p-5">

            <p class="text-sm text-slate-500">
                Total Stok
            </p>

            <h2 class="text-3xl font-bold text-slate-800 mt-2">

                <?php echo hitungTotalStok($katalogProduk); ?>

            </h2>

            <p class="text-xs text-slate-400 mt-1">
                Unit barang
            </p>

        </div>


        <!-- NILAI ASET -->

        <div class="bg-white rounded-xl border border-slate-200 p-5">

            <p class="text-sm text-slate-500">
                Nilai Aset Stok
            </p>

            <h2 class="text-2xl font-bold text-slate-800 mt-2">

                <?php
                echo formatRupiah(
                    hitungTotalNilaiStok($katalogProduk)
                );
                ?>

            </h2>

            <p class="text-xs text-slate-400 mt-1">
                Harga × stok
            </p>

        </div>


        <!-- STOK KRITIS -->

        <div class="bg-rose-50 rounded-xl border border-rose-200 p-5">

            <p class="text-sm text-rose-600">
                Stok Kritis
            </p>

            <h2 class="text-3xl font-bold text-rose-700 mt-2">

                <?php echo hitungTotalStokKritis($katalogProduk); ?>

            </h2>

            <p class="text-xs text-rose-500 mt-1">
                Produk dengan stok &lt; 3
            </p>

        </div>

    </div>


    <!-- ================================ -->
    <!-- SEARCH -->
    <!-- ================================ -->

    <div class="bg-white rounded-xl border border-slate-200 p-5 mb-6">

        <form method="GET" class="flex flex-col md:flex-row gap-3">

            <input
                type="text"
                name="cari"
                value="<?php echo htmlspecialchars($kataKunci); ?>"
                placeholder="Cari berdasarkan ID, nama, atau kategori..."
                class="flex-1 border border-slate-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-300"
            >

            <button
                type="submit"
                class="bg-sky-600 text-white px-5 py-2.5 rounded-lg hover:bg-sky-700"
            >
                Cari
            </button>

            <a
                href="index.php"
                class="text-center bg-slate-200 text-slate-700 px-5 py-2.5 rounded-lg hover:bg-slate-300"
            >
                Reset
            </a>

        </form>

    </div>


    <!-- ================================ -->
    <!-- PRODUCT TABLE -->
    <!-- ================================ -->

    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden">

        <div class="px-6 py-5 border-b border-slate-200">

            <h2 class="text-lg font-semibold text-slate-800">
                Daftar Produk
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Informasi produk dan monitoring kondisi stok
            </p>

        </div>


        <div class="overflow-x-auto">

            <table class="w-full text-sm">


                <!-- TABLE HEADER -->

                <thead class="bg-slate-50">

                    <tr class="border-b border-slate-200">

                        <th class="text-left px-6 py-4 font-semibold text-slate-600">
                            ID
                        </th>

                        <th class="text-left px-6 py-4 font-semibold text-slate-600">
                            Nama Produk
                        </th>

                        <th class="text-left px-6 py-4 font-semibold text-slate-600">
                            Kategori
                        </th>

                        <th class="text-left px-6 py-4 font-semibold text-slate-600">
                            Harga
                        </th>

                        <th class="text-left px-6 py-4 font-semibold text-slate-600">
                            Stok
                        </th>

                        <th class="text-left px-6 py-4 font-semibold text-slate-600">
                            Status
                        </th>

                        <th class="text-left px-6 py-4 font-semibold text-slate-600">
                            Deskripsi
                        </th>

                    </tr>

                </thead>


                <!-- TABLE BODY -->

                <tbody>

                    <?php if (count($produkTampil) > 0): ?>

                        <?php foreach ($produkTampil as $produk): ?>


                            <?php

                            // Mengecek kondisi stok
                            $isKritis = cekStokKritis($produk['stok']);

                            // Warna baris berdasarkan kondisi stok
                            $rowClass = $isKritis
                                ? "bg-rose-50 hover:bg-rose-100"
                                : "hover:bg-sky-50";

                            ?>


                            <tr class="<?php echo $rowClass; ?> border-b border-slate-100">


                                <!-- ID -->

                                <td class="px-6 py-4 font-medium text-slate-700">

                                    <?php
                                    echo htmlspecialchars($produk['id']);
                                    ?>

                                </td>


                                <!-- NAMA -->

                                <td class="px-6 py-4">

                                    <span class="font-medium text-slate-800">

                                        <?php
                                        echo htmlspecialchars($produk['nama']);
                                        ?>

                                    </span>

                                </td>


                                <!-- KATEGORI -->

                                <td class="px-6 py-4">

                                    <span class="bg-sky-100 text-sky-800 text-xs px-2.5 py-1 rounded-full font-medium">

                                        <?php
                                        echo htmlspecialchars($produk['kategori']);
                                        ?>

                                    </span>

                                </td>


                                <!-- HARGA -->

                                <td class="px-6 py-4 text-slate-700">

                                    <?php
                                    echo formatRupiah($produk['harga']);
                                    ?>

                                </td>


                                <!-- STOK -->

                                <td class="px-6 py-4 font-semibold text-slate-700">

                                    <?php
                                    echo $produk['stok'];
                                    ?>

                                </td>


                                <!-- STATUS -->

                                <td class="px-6 py-4">

                                    <?php if ($isKritis): ?>

                                        <span class="bg-rose-200 text-rose-800 text-xs px-2.5 py-1 rounded-full font-semibold">

                                            Stok Kritis

                                        </span>

                                    <?php else: ?>

                                        <span class="bg-emerald-100 text-emerald-700 text-xs px-2.5 py-1 rounded-full font-semibold">

                                            Stok Aman

                                        </span>

                                    <?php endif; ?>

                                </td>


                                <!-- DESKRIPSI -->

                                <td class="px-6 py-4 text-slate-500">

                                    <?php
                                    echo htmlspecialchars($produk['deskripsi']);
                                    ?>

                                </td>


                            </tr>


                        <?php endforeach; ?>


                    <?php else: ?>


                        <!-- JIKA DATA TIDAK DITEMUKAN -->

                        <tr>

                            <td
                                colspan="7"
                                class="px-6 py-10 text-center text-slate-500"
                            >

                                Produk tidak ditemukan.

                            </td>

                        </tr>


                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>


</main>


</body>

</html>
