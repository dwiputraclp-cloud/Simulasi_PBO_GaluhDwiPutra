<?php

require_once "Pendaftaran.php";

class PendaftaranPrestasi extends Pendaftaran
{
    protected $jenisPrestasi;
    protected $tingkatPrestasi;

    public function __construct(
        $id_pendaftaran,
        $nama_calon,
        $asal_sekolah,
        $nilai_ujian,
        $biaya_pendaftaran_dasar,
        $jenis_prestasi,
        $tingkat_prestasi
    ) {
        parent::__construct(
            $id_pendaftaran,
            $nama_calon,
            $asal_sekolah,
            $nilai_ujian,
            $biaya_pendaftaran_dasar
        );

        $this->jenisPrestasi = $jenis_prestasi;
        $this->tingkatPrestasi = $tingkat_prestasi;
    }

    // Overriding method untuk Jalur Prestasi (Potongan Rp50.000)
    public function hitungTotalBiaya()
    {
        return $this->biayaPendaftaranDasar - 50000;
    }

    public function tampilkanInfoJalur()
    {
        return "Jalur Prestasi - Jenis Prestasi: " . $this->jenisPrestasi . 
               ", Tingkat Prestasi: " . $this->tingkatPrestasi;
    }

    public static function getDaftarPrestasi($db)
    {
        $query = "SELECT * FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Prestasi'";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>