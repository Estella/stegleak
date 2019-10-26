<?php
// error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
set_time_limit(0);
include "class_facesteg.php";

header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$detector = new Face_Steg('detection.dat',5);
$detector->face_detect('Estella_01.png');
$detector->toPNG();
exit;
