<?php

// class ContohStatic {
//     public static $angka = 1;

//     public static function halo() {
//         return "Halo ".self::$angka." kali";
//     }
// }

// echo ContohStatic::$angka;
// echo "<br>";
// echo ContohStatic::halo();
// echo "<hr>";
// echo ContohStatic::halo();

class Contoh {
    public static $angka = 1;

    public function halo() {                     
        return "Halo ".self::$angka++." kali. <br>";    // Pendeklarasian properti static dengan self::$Properti
    }
}

$obj = new Contoh;

//echo $obj->angka;             // Akan menyebabkan eror ketika memanggil properti static
echo $obj::$angka."<br>";       // Cara yang benar untuk memanggil static properti
echo Contoh::$angka."<br>";     // Cara lain untuk memanggil static properti tanpa instansiasi objek

/**
 * Output yang ditampilkan pada layar adalah
 *      Halo 1 kali
 *      Halo 2 kali
 *      Halo 3 kali
 */

echo $obj->halo();
echo $obj->halo();
echo $obj->halo();
echo "<hr>";

/**
 * Apabila tidak menggunakan properti static, output yang diberikan
 * nantinya adalah,
 *      Halo 1 kali
 *      Halo 2 kali
 *      Halo 3 kali
 * 
 * Ketika menggunakan properti static, nilai dari property $angka
 * akan dilanjutkan dari terakhir kali method halo() dipanggil
 * sehingga outputnya adalah
 *      Halo 4 kali
 *      Halo 5 kali
 *      Halo 6 kali
 */

$obj2 = new Contoh;
echo $obj2->halo();
echo $obj2->halo();
echo $obj2->halo();

echo "<hr>";

echo Contoh::$angka;
echo "<br>".Contoh::halo();
echo Contoh::$angka;
echo "<br>".Contoh::halo();
echo Contoh::$angka;
echo "<br>".Contoh::halo();
echo Contoh::$angka;
echo "<br>".Contoh::halo();
