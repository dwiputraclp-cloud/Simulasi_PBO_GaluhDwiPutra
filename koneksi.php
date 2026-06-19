<?php

class Database
{
    private $host = "localhost";
    private $dbname = "db_simulasi_pbo_trpl1a_galuhdwiputra";
    private $username = "root";
    private $password = "";
    private $koneksi;

    public function __construct()
    {
        try {
            $this->koneksi = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4",
                $this->username,
                $this->password
            );

            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }

    public function getKoneksi()
    {
        return $this->koneksi;
    }
}
?>