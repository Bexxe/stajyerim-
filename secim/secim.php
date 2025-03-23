<?php
session_start();

if (isset($_SESSION['rol'])) {
    $userRole = $_SESSION['rol'];

    // Kullanıcı tipine göre farklı sayfaları gösterme
    if ($userRole === 'firma') {
        // Firma Sahibi kullanıcılar için sayfa
        include "firma.php";
    } elseif ($userRole === 'stajyer') {
        // Normal kullanıcılar için sayfa
        include "oturumacik.php";
    } else {
    }
} else {
    // Oturum açılmamış, giriş sayfasını göster
    include "oturumkapali.php";
}
?>
