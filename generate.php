<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'qr_lib/qrlib.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['text'])) {
    $text = $_POST['text'];
    $size = isset($_POST['size']) ? (int)$_POST['size'] : 200;
    $ecc = $_POST['ecc'] ?? 'L';

    $filename = 'qr_output/' . md5($text . time()) . '.png';
    QRcode::png($text, $filename, $ecc, $size / 25);

    header("Location: index.php?img=$filename");
    exit;
} else {
    header("Location: index.php");
    exit;
}
