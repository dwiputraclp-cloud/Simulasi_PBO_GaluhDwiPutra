<?php
// Memanggil semua file yang dibutuhkan
require_once "koneksi.php";
require_once "Pendaftaran.php";
require_once "PendaftaranReguler.php";
require_once "PendaftaranPrestasi.php";
require_once "PendaftaranKedinasan.php";

// Inisialisasi Koneksi Database
$database = new Database();
$db = $database->getKoneksi();

// Mengambil data spesifik per jalur memanfaatkan metode statis dari masing-masing kelas anak
$dataReguler = PendaftaranReguler::getDaftarReguler($db);
$dataPrestasi = PendaftaranPrestasi::getDaftarPrestasi($db);
$dataKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);

// Fungsi pembantu untuk memformat mata uang Rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi PBO - Pendaftaran Mahasiswa Baru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Daftar Pendaftaran Mahasiswa Baru</h1>
        <p class="text-muted">Sistem Simulasi PBO - Kelompok Data Berdasarkan Jalur Masuk (Kolom Atribut Spesifik)</p>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0 fw-semibold">Jalur Reguler</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">Nama Calon</th>
                            <th width="15%">Asal Sekolah</th>
                            <th width="10%" class="text-center">Nilai Ujian</th>
                            <th width="20%">Pilihan Prodi</th>
                            <th width="15%">Lokasi Kampus</th>
                            <th width="15%" class="text-end">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($dataReguler)): ?>
                            <tr><td colspan="7" class="text-center text-muted py-3">Tidak ada data pendaftaran reguler.</td></tr>
                        <?php else: ?>
                            <?php foreach ($dataReguler as $row): 
                                // Instansiasi objek untuk kalkulasi biaya secara polimorfik
                                $mhs = new PendaftaranReguler(
                                    $row['id_pendaftaran'],
                                    $row['nama_calon'],
                                    $row['asal_sekolah'],
                                    $row['nilai_ujian'],
                                    $row['biaya_pendaftaran_dasar'],
                                    $row['pilihan_prodi'],
                                    $row['lokasi_kampus']
                                );
                            ?>
                                <tr>
                                    <td><?= $row['id_pendaftaran']; ?></td>
                                    <td class="fw-bold"><?= htmlspecialchars($row['nama_calon']); ?></td>
                                    <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                                    <td class="text-center"><span class="badge bg-secondary"><?= $row['nilai_ujian']; ?></span></td>
                                    <td><?= htmlspecialchars($row['pilihan_prodi']); ?></td>
                                    <td><?= htmlspecialchars($row['lokasi_kampus']); ?></td>
                                    <td class="text-end fw-bold text-success"><?= formatRupiah($mhs->hitungTotalBiaya()); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="card shadow-sm mb-5">
        <div class="card-header bg-warning text-dark">
            <h5 class="card-title mb-0 fw-semibold">Jalur Prestasi (Potongan Rp50.000)</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">Nama Calon</th>
                            <th width="15%">Asal Sekolah</th>
                            <th width="10%" class="text-center">Nilai Ujian</th>
                            <th width="20%">Jenis Prestasi</th>
                            <th width="15%">Tingkat Prestasi</th>
                            <th width="15%" class="text-end">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($dataPrestasi)): ?>
                            <tr><td colspan="7" class="text-center text-muted py-3">Tidak ada data pendaftaran prestasi.</td></tr>
                        <?php else: ?>
                            <?php foreach ($dataPrestasi as $row): 
                                // Instansiasi objek untuk kalkulasi biaya secara polimorfik
                                $mhs = new PendaftaranPrestasi(
                                    $row['id_pendaftaran'],
                                    $row['nama_calon'],
                                    $row['asal_sekolah'],
                                    $row['nilai_ujian'],
                                    $row['biaya_pendaftaran_dasar'],
                                    $row['jenis_prestasi'],
                                    $row['tingkat_prestasi']
                                );
                            ?>
                                <tr>
                                    <td><?= $row['id_pendaftaran']; ?></td>
                                    <td class="fw-bold"><?= htmlspecialchars($row['nama_calon']); ?></td>
                                    <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                                    <td class="text-center"><span class="badge bg-secondary"><?= $row['nilai_ujian']; ?></span></td>
                                    <td><?= htmlspecialchars($row['jenis_prestasi']); ?></td>
                                    <td><span class="badge bg-info text-dark"><?= htmlspecialchars($row['tingkat_prestasi']); ?></span></td>
                                    <td class="text-end fw-bold text-success">
                                        <del class="text-danger small fw-normal d-block" style="font-size: 11px;"><?= formatRupiah($row['biaya_pendaftaran_dasar']); ?></del>
                                        <?= formatRupiah($mhs->hitungTotalBiaya()); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="card shadow-sm mb-5">
        <div class="card-header bg-danger text-white">
            <h5 class="card-title mb-0 fw-semibold">Jalur Kedinasan (Surcharge 25%)</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">ID</th>
                            <th width="20%">Nama Calon</th>
                            <th width="15%">Asal Sekolah</th>
                            <th width="10%" class="text-center">Nilai Ujian</th>
                            <th width="20%">SK Ikatan Dinas</th>
                            <th width="15%">Instansi Sponsor</th>
                            <th width="15%" class="text-end">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($dataKedinasan)): ?>
                            <tr><td colspan="7" class="text-center text-muted py-3">Tidak ada data pendaftaran kedinasan.</td></tr>
                        <?php else: ?>
                            <?php foreach ($dataKedinasan as $row): 
                                // Instansiasi objek untuk kalkulasi biaya secara polimorfik
                                $mhs = new PendaftaranKedinasan(
                                    $row['id_pendaftaran'],
                                    $row['nama_calon'],
                                    $row['asal_sekolah'],
                                    $row['nilai_ujian'],
                                    $row['biaya_pendaftaran_dasar'],
                                    $row['sk_ikatan_dinas'],
                                    $row['instansi_sponsor']
                                );
                            ?>
                                <tr>
                                    <td><?= $row['id_pendaftaran']; ?></td>
                                    <td class="fw-bold"><?= htmlspecialchars($row['nama_calon']); ?></td>
                                    <td><?= htmlspecialchars($row['asal_sekolah']); ?></td>
                                    <td class="text-center"><span class="badge bg-secondary"><?= $row['nilai_ujian']; ?></span></td>
                                    <td><code><?= htmlspecialchars($row['sk_ikatan_dinas']); ?></code></td>
                                    <td><?= htmlspecialchars($row['instansi_sponsor']); ?></td>
                                    <td class="text-end fw-bold text-success">
                                        <span class="text-muted small fw-normal d-block" style="font-size: 11px;">Dasar: <?= formatRupiah($row['biaya_pendaftaran_dasar']); ?></span>
                                        <?= formatRupiah($mhs->hitungTotalBiaya()); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bundle.min.js"></script>
</body>
</html>