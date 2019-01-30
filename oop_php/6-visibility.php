<?php 

/**
 * Pembahasan konsep visibility secara sederhana. Terdapat 
 * 3 macam visibility pada PHP yaitu Public, Private, dan 
 * Protected. Public memungkinkan suatu property dapat diakses
 * dimana saja. Private memungkinkan property hanya dapat 
 * diakses oleh kelas yang mendeklarasikan propertinya saja.
 * Sedangkan protected memungkinkan kelas turunannya (kelas
 * child) juga dapat mengakses properti yang bersangkutan.
 */

class Produk {
    public $judul = "judul",
           $penulis = "penulis",
           $penerbit = "penerbit";
           
    protected $diskon = 0;		// property $diskon dapat diakses oleh kelas Produk beserta turunannya
    private $harga = 0;			// Menghalangi perubahan value terhadap properti $harga sehingga digunakan private
        
    public function __construct($judul, $penulis, $penerbit, $harga) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon /100);
    }

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    public function getInfoProduk() {
        return "{$this->judul} | {$this->getLabel()}, (Rp{$this->getHarga()})";
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
        // Melakukan override terhadap method construct milik kelas Parent
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk() {
        // Memanggil method getInfoProduk() dari kelas Parent dengan cara Overriding
        return "Komik :  ".parent::getInfoProduk()." - {$this->jmlHalaman} Halaman";
    }

}

class Game extends Produk {
    public $waktuMain = 0;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain) {
        // Melakukan override terhadap method construct milik kelas Parent
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }
    
    public function setDiskon($diskon) {	// Memberikan $diskon kepada produk Game
        $this->diskon = $diskon;
    }

    public function getInfoProduk() {
        // Memanggil method getInfoProduk() dari kelas Parent dengan cara Overriding
        return "Game : ".parent::getInfoProduk()." ~ {$this->waktuMain} Jam";
    }
}

/**
 *  Instansiasi objek Produk dengan produk1 untuk komik dan
 *  produk2 untuk game.
 */

$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shonen Jump", 30000);
$produk2 = new Produk("Uncharted", "Neil Druckman", "Sony Computer", 250000);

echo $produk1->getLabel();     
echo "<hr>".$produk2->getHarga();

/**
 * Instansiasi objek Komik yang merupakan 'child' dari objek Produk
 * dengan tambahan property $jmlHalaman.
 */

// Komik : Naruto | Masashi Kishimoto, Shonen Jump (Rp30000) - 100 Halaman
// Game : Uncharted | Neil Druckmann, Sony Computer (Rp250000) ~ 50 Jam

$komik1 = new Komik("One Piece", "Eichiro Oda", "Shonen Jump", 30000, 70);
$game1 = new Game("Metal Gear Solid", "Hideo Kojima", "Konami", 270000, 76);

echo "<hr>".$komik1->getHarga();
echo "<hr>".$komik1->getInfoProduk();

echo "<hr>".$game1->getInfoProduk()." (sebelum diskon)";	// Harga sebelum didiskon
$game1->setDiskon(19);										// Menentukan nilai diskon yang diberikan
echo "<hr>".$game1->getInfoProduk()." (setelah dison 19%)";	// Harga setelah didiskon

