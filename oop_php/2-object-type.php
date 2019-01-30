<?php 

class Produk {
    public $judul = "judul",
           $penulis = "penulis",
           $penerbit = "penerbit",
           $harga = 0;
           
    public function __construct($judul, $penulis, $penerbit, $harga) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }
}

class CetakInfoProduk {
    public function cetak(Produk $produk) {
       return $str = "{$produk->judul} | {$produk->getLabel()} (Rp{$produk->harga})";
    }
}

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
echo $produk1->getLabel();

$infoProduk1 = new CetakInfoProduk();
echo "<hr>".$infoProduk1->cetak($produk1);
echo "<hr>";
gettype($infoProduk1);