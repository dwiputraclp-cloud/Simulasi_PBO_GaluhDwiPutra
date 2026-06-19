<?php

require_once "Pendaftaran.php";

class PendaftaranKedinasan extends Pendaftaran
{
    protected $skIkatanDinas;
    protected $instansiSponsor;

    public function __construct(
        $id_pendaftaran,
        $nama_calon,
        $asal_sekolah,
        $nilai_ujian,
        $biaya_pendaftaran_dasar,
        $sk_ikatan_dinas,
        $instansi_sponsor
    ) {
        parent::__construct(
            $id_pendaftaran,
            $nama_calon,
            $asal_sekolah,
            $nilai_ujian,
            $biaya_pendaftaran_dasar
        );

        $this->skIkatanDinas = $sk_ikatan_dinas;
        $this->instansiSponsor = $instansi_sponsor;
    }

    public function hitungTotalBiaya()
    {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur()
    {
        return "Jalur Kedinasan - SK Ikatan Dinas: " . $this->skIkatanDinas . 
               ", Instansi Sponsor: " . $this->instansiSponsor;
    }

    public static function getDaftarKedinasan($db)
    {
        $query = "SELECT * FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Kedinasan'";

        $stmt = $db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>