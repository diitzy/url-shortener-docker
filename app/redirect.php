<?php
$data = json_decode(file_get_contents("data.json"), true);
$code = $_GET['c'] ?? '';

if (isset($data[$code])) {
    header("Location: " . $data[$code]);
    exit;
}

echo "URL tidak ditemukan";
