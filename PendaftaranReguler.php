<?php

require_once "Pendaftaran.php";

class PendaftaranReguler extends Pendaftaran
{
    protected $pilihanProdi;
    protected $lokasiKampus;

    public function __construct(
        $id_pendaftaran,
        $nama_calon,
        $asal_sekolah,
        $nilai_ujian,
        $biaya_pendaftaran_dasar,
        $pilihan_prodi,
        $lokasi_kampus
    ) {
        parent::__construct(
            $id_pendaftaran,
            $nama_calon,
            $asal_sekolah,
            $nilai_ujian,
            $biaya_pendaftaran_dasar
        );

        $this->pilihanProdi = $pilihan_prodi;
        $this->lokasiKampus = $lokasi_kampus;
    }

    public function hitungTotalBiaya()
    {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur()
    {
        return "Jalur Reguler - Prodi: " . $this->pilihanProdi . 
               ", Lokasi Kampus: " . $this->lokasiKampus;
    }

    public static function getDaftarReguler($db)
    {
        $query = "SELECT * FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Reguler'";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>