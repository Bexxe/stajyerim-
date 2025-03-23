
<?php
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 0);
session_start();

if (isset($_SESSION['rol'])) {
    $userRole = $_SESSION['rol'];

    // Kullanıcı tipine göre farklı sayfaları gösterme
    if ($userRole === 'firma') {
        // Admin kullanıcılar için sayfa
        include "firma.php";
    } elseif ($userRole === 'stajyer') {
        // Normal kullanıcılar için sayfa
        include "../ilan/ilan.php";
    } else {
    }
} else {
    // Oturum açılmamış, giriş sayfasını göster
    include "../ilan/ilan.php";
}
?>
