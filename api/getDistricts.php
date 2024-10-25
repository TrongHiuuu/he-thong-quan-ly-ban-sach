
<?php
require_once "../lib/connect.php";
require_once "../model/location.php";
if (isset($_GET['province_id']) && is_numeric($_GET['province_id'])) {
    $provinceId = (int)$_GET['province_id'];

    $data = getDistricts($provinceId);

    header('Content-Type: application/json');
    echo json_encode($data);

} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid province_id']);
}