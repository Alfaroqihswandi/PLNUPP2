// Tambahkan kode ini di dalam file logout.php
<?php
session_start();

// Hapus session yang terkait dengan pengguna
session_unset();
session_destroy();

// Arahkan pengguna ke halaman tes.php
header('Location: tes.php');
exit;
?>