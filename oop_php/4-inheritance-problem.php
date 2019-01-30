<?php 

/**
 * Pembahasan konsep Inheritance secara sederhana
 */

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
        return "$this->penulis, $this->penerbit ".__METHOD__;
    }

    public function getInfoProduk() {
        return "{$this->judul} | {$this->getLabel()}, (Rp{$this->harga})";
    }

}

/**
 * Gunakan keyword 'extends' agar dapat mewarisi property
 * dan method milik kelas Parent. Dengan begitu, nama kelas
 * yang melakukan inheritance dikenal sebagai kelas Child
 */

class Komik extends Produk {
    public $jmlHalaman = 0;

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman) {
        parent :: __construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoKomik() {
        return "Komik : {$this->getInfoProduk()} - {$this->jmlHalaman} Halaman";
    }

}

class Game extends Produk {
    public $waktuMain = 0;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain) {
        parent :: __construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfoGame() {
        return "Game : {$this->getInfoProduk()} ~ {$this->waktuMain} Jam";
    }
}

class CetakInfoProduk {
    public function cetak(Produk $produk) {
       return $str = "{$produk->judul} | {$produk->getLabel()} (Rp{$produk->harga})";
    }
}

/**
 *  Instansiasi objek Produk dengan produk1 untuk komik dan
 *  produk2 untuk game.
 */

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$produk2 = new Produk("Uncharted", "Neil Druckman", "Sony Computer", 250000);

echo $produk1->getLabel();      
echo $produk1->judul;

$infoProduk1 = new CetakInfoProduk();
echo "<hr>".$infoProduk1->cetak($produk1);

/**
 * Instansiasi objek Komik yang merupakan 'child' dari objek Produk
 * dengan tambahan property $jmlHalaman.
 */

// Komik : Naruto | Masashi Kishimoto, Shonen Jump (Rp30000) - 100 Halaman
// Game : Uncharted | Neil Druckmann, Sony Computer (Rp250000) ~ 50 Jam

$komik1 = new Komik("One Piece", "Eichiro Oda", "Shonen Jump", 30000, 70);
$game1 = new Game("Metal Gear Solid", "Hideo Kojima", "Konami", 270000, 76);
echo "<hr>".$komik1->getInfoKomik();
echo "<hr>".$game1->getInfoGame();