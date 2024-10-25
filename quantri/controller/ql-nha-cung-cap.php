
<?php
include '../../model/location.php';
include '../../lib/connect.php';
require '../model/ql-nha-cung-cap.php';
// require "../../model/location.php";

/* add-data */
if(isset($_POST['supplierForm'])){
    $ten = $_POST['supplier-name'];
    $email = $_POST['supplier-email'];
    $dienthoai = $_POST['supplier-phone'];
    $tinh = getProvinceNameById($_POST['supplier-city']);

    // Truy vấn để lấy tên của quận/huyện dựa trên huyen_id
    $quan = getDistrictNameById($_POST['supplier-district']);

    // Truy vấn để lấy tên của xã/phường dựa trên xa_id
    $xaphuong = getWardNameById($_POST['supplier-ward']);


    $commaPos = strpos($_POST['supplier-address'], ',');

    if ($commaPos !== false) {
        $substring = substr($_POST['supplier-address'], 0, $commaPos);
    } else {
        // If no comma is found, return the entire string
        $substring = $_POST['supplier-address'];
    }
    $diachi = $substring.','.$xaphuong.','.$quan.','.$tinh;
    if(!isSupplierExist($ten, $email, $dienthoai, $diachi)){
        addSupplier($ten, $email, $dienthoai, $diachi);
        echo json_encode(array('success'=> 'true'));
    }
    else echo json_encode(array('success'=> 'false'));
}

/* view-data */
if(isset($_POST['view_data_supplier'])){
    $result = getSupplierByID($_POST['supplier_id']);
    echo json_encode($result,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
}
/* view-data */
