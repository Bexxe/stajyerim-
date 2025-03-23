<?php
session_start();

// Kullanıcının oturumunu sonlandırma
session_destroy();

// Kullanıcıyı başka bir sayfaya yönlendirme
header('Location: anasayfa/index.php');
exit;
?>
