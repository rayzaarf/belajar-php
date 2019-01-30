<?php 

/**
 * Setter dan Getter tanpa menggunakan Magic methond __set()
 * dan __get(). 
 */

class Produk {
    private $judul = "judul",
            $penulis = "penulis",
            $penerbit = "penerbit",
            $harga = 0;
            
    protected $diskon = 0;
        
    public function __construct($judul, $penulis, $penerbit, $harga) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

/**
 * Memanfaat method setXXXX untuk melakukan perubahan pada suatu properti.
 * Kemudian apabila ingin menampilkan nilai dari suatu properti, cukup 
 * panggil dengan menggunakan methon getXXXX.
 */

    public function setJudul($judul) {      // Bila ingin merubah $judul produk, cukup panggil method $setJudul(judulBaru)
        $this->judul = $judul;
    }

    public function getJudul() {            // Memanggil property $judul dan menampilkannya pada layar
        return $this->judul;
    }

    public function setPenulis() {
        $this->penulis = $penulis;          // merubah $penulis
    }

    public function getPenulis() {
        return $this->penulis;              // memanggil properti $penulis
    }

    public function setPenerbit() {
        $this->penerbit = $penerbit;        // Merubah $penerbit
    }

    public function getPenerbit() {
        return $this->penerbit;             // Memanggil properti $penerbit
    }

    public function getHarga() {
        return $this->harga - ($this->harga * $this->diskon /100);
    }
    
    public function getDiskon() {
        return $this->diskon."%";
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

echo $produk1->getInfoProduk();     
echo $produk1->setJudul("Boruto");
echo "<hr>".$produk1->getJudul();
echo "<hr>".$produk1->getInfoProduk();     

/**
 * Instansiasi objek Komik yang merupakan 'child' dari objek Produk
 * dengan tambahan property $jmlHalaman.
 */

// Komik : Naruto | Masashi Kishimoto, Shonen Jump (Rp30000) - 100 Halaman
// Game : Uncharted | Neil Druckmann, Sony Computer (Rp250000) ~ 50 Jam

$komik1 = new Komik("One Piece", "Eichiro Oda", "Shonen Jump", 30000, 70);
$game1 = new Game("Metal Gear Solid", "Hideo Kojima", "Konami", 270000, 76);

echo "<hr>".$komik1->getInfoProduk();

echo "<hr>".$game1->getInfoProduk()." (sebelum diskon)";	// Harga sebelum didiskon
$game1->setDiskon(19);										// Menentukan nilai diskon yang diberikan
echo "<hr>".$game1->getInfoProduk()." (setelah dison 19%)";	// Harga setelah didiskon

echo "<hr>";


