<?php

// Jualan 2 produk yang berbeda, yaitu komik dan game
class Produk {
    public $judul = '', 
           $penulis = '', 
           $penerbit = '', 
           $harga = 0;

    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }
}

$produk1 = new Produk();
$produk1->judul = 'Naruto';
var_dump($produk1->judul);

$produk2 = new Produk();
$produk2->judul = 'Uncharted';

// Menambah property baru ketika visibility-nya public
$produk2->tambahProp = 'tambah';
var_dump($produk2->tambahProp);

$produk3 = new Produk();
$produk3->judul = 'Naruto';
$produk3->penulis = 'Masashi Kishimoto';
$produk3->penerbit = 'Shonen Jump';
$produk3->harga = 30000;

echo "<hr>";
echo "Komik: $produk3->penulis, $produk3->penerbit";
echo "<hr>";
echo $produk3->getLabel();
?>