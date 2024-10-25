<?php
    
//Kiểm tra dữ liệu lấy TỈnh
    function getProvinces() {
    $sql = "SELECT * FROM tinh";
    $result = mysqli_query($GLOBALS['conn'], $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = array(
            "id" => $row["idTinh"],
            "name" => $row["tenTinh"]
        );
    }
    return $data;
}

// Kiểm tra dữ liệu lấy QUận, Huyện



function getDistricts($provinceId) {
    $sql = "SELECT idQuan,tenQuan FROM `quan` WHERE idTinh = ? ORDER BY tenQuan ASC  " ;
    $stmt = $GLOBALS['conn']->prepare($sql);
    
    if ($stmt === false) {
        die("Lỗi chuẩn bị câu lệnh SQL: " . $GLOBALS['conn']->error);
    }
    
    $stmt->bind_param('i', $provinceId);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['idQuan'],
            'name' => $row['tenQuan']
        ];
    }
    
    return $data;
}

// Kiểm tra dữ liệu Lấy xã


function getWards($districtId) {
    $sql = "SELECT idXa,tenXa FROM `xa` WHERE idQuan = ? ORDER BY tenXa ASC";
    $stmt = $GLOBALS['conn']->prepare($sql);
    
    if ($stmt === false) {
        die("Lỗi chuẩn bị câu lệnh SQL: " . $GLOBALS['conn']->error);
    }
    
    $stmt->bind_param('i', $districtId);
    $stmt->execute();

    $result = $stmt->get_result();
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'id' => $row['idXa'], // Đảm bảo cột này tồn tại trong bảng
            'name' => $row['tenXa'] // Đảm bảo cột này tồn tại trong bảng
        ];
    }
    return $data;
}

// Kiểm tra dữ liệu


function getProvinceNameById($provinceId) {
    $sql = "SELECT * FROM `tinh` WHERE `idTinh` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $provinceId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row["tenTinh"];
}

function getDistrictNameById($districtId) {
    $sql = "SELECT * FROM `quan` WHERE `idQuan` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $districtId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row["tenQuan"];
}
function getWardNameById($wardId) {
    $sql = "SELECT * FROM `xa` WHERE `idXa` = ?";
    $stmt = $GLOBALS['conn']->prepare($sql);
    $stmt->bind_param('i', $wardId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row["tenXa"];
}
// $provinceId = 1;
// $districtId = 1;
// $wardId = 1;

// $provinceName = getProvinceNameById($provinceId);
// $districtName = getDistrictNameById($districtId);
// $wardName = getWardNameById($wardId);

// echo "Tên tỉnh: " . $provinceName . " Tên huyện: " . $districtName . " Tên xã: " . $wardName;