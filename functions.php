<?php

// functions.php - Processing Layer & Helper Bisnis

// Format angka menjadi Rupiah
function formatRupiah($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Menghitung jumlah jenis produk
function hitungTotalProduk($data)
{
    return count($data);
}

// Menghitung total seluruh stok produk
function hitungTotalStok($data)
{
    $totalStok = 0;

    foreach ($data as $item) {
        $totalStok += $item['stok'];
    }

    return $totalStok;
}

// Menghitung total nilai aset stok
// Harga × Stok setiap produk
function hitungTotalNilaiStok($data)
{
    $nilaiTotal = 0;

    foreach ($data as $item) {
        $nilaiTotal += $item['harga'] * $item['stok'];
    }

    return $nilaiTotal;
}

// Mengecek apakah stok termasuk kritis
// Stok kritis jika kurang dari 3
function cekStokKritis($stok)
{
    return $stok < 3;
}

// Menghitung jumlah produk yang stoknya kritis
function hitungTotalStokKritis($data)
{
    $totalKritis = 0;

    foreach ($data as $item) {
        if (cekStokKritis($item['stok'])) {
            $totalKritis++;
        }
    }

    return $totalKritis;
}
?>
