<?php
require_once "../lib/connect.php";
require_once '../model/location.php';

$data = getProvinces();
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
