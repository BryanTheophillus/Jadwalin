<?php
$kegiatan   = $_POST['kegiatan'];
$mulai      = $_POST['mulai'];
$selesai    = $_POST['selesai'];
$color      = $_POST['color'];

$koneksi = mysqli_connect('localhost', 'root', '', 'new_jadwalin');

mysqli_query($koneksi, "insert into event set kegiatan='$kegiatan', mulai='$mulai', selesai='$selesai', color='$color'");

header("dash.php");

?>