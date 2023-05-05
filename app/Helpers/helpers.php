<?php

function convertBulanTahun($bulanTahun)
{
    $split = explode('-', $bulanTahun);

    // simpan bulan dan tahun ke dalam variabel terpisah
    $bulan = $split[0];
    $tahun = $split[1];

    // daftar nama bulan dalam bahasa Indonesia
    $daftar_bulan = array(
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );

    // ambil nama bulan dari array daftar_bulan menggunakan index bulan-1
    $nama_bulan = $daftar_bulan[$bulan - 1];

    // gabungkan nama bulan dan tahun menggunakan fungsi sprintf
    $bulan_tahun_baru = sprintf('%s %s', $nama_bulan, $tahun);

    // kembalikan nilai bulan_tahun_baru
    return $bulan_tahun_baru;
}
