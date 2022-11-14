<?php 
$path = $_GET["path"];
$out = array();
foreach (glob($path.'/*.webp') as $filename) {
    $p = pathinfo($filename);
    $out[] = $p['filename'];
}
echo json_encode($out); 
?>