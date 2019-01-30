<?php 

/**
 * Object Oriented Programming dengan memanfaatkan kelas abstract. Kelas abstract tidak
 * bisa diinstansiasi menjadi objek. Bila ingin melakukan instansiasi, dapat dilakukan
 * pada kelas child.
 */

abstract class Produk {
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

    public function setHarga() {
        return $this->harga;
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

    /**
     * Deklarasi method abstract dengan menambahkan kata abstract. Method abstract
     * tidak boleh memiliki body. Method getInfoProduk() nantinya dapat digunakan
     * dan ditambahkan body-nya oleh kelas child (kelas Komik dan kelas Game).
     */ 

    abstract public function getInfoProduk(); 
    
    public function getInfo() {
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
        return "Komik :  ".$this->getInfo()." - {$this->jmlHalaman} Halaman";
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
        return "Game : ".$this->getInfo()." ~ {$this->waktuMain} Jam";
    }
}

class CetakInfoProduk {
    public $daftarProduk = [];

    public function tambahProduk(Produk $produk) {      // Method untuk menambahkan produk ke dalam daftar produk
        $this->daftarProduk[] = $produk;
    }

    public function cetak() {               // Memungkinkan untuk mencetak semua produk ke dalam layar
        $str = "DAFTAR PRODUK: <br>";

        foreach($this->daftarProduk as $p) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }

        return $str;
    }
}

/**
 * Instansiasi objek Komik yang merupakan 'child' dari objek Produk
 * dengan tambahan property $jmlHalaman.
 */

// Komik : Naruto | Masashi Kishimoto, Shonen Jump (Rp30000) - 100 Halaman
// Game : Uncharted | Neil Druckmann, Sony Computer (Rp250000) ~ 50 Jam

$produk1 = new Komik("One Piece", "Eichiro Oda", "Shonen Jump", 30000, 70);
$produk2 = new Game("Metal Gear Solid", "Hideo Kojima", "Konami", 270000, 76);

$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk($produk1);
$cetakProduk->tambahProduk($produk2);
echo $cetakProduk->cetak();