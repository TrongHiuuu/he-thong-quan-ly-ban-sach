<?php
function getAllBooks(){
    $sql='SELECT * FROM sach WHERE 1';
    $sql.=' AND tonkho > 0';
    $sql.=' AND trangthai = 1';
    $sql.=' ORDER BY luotban DESC';
    return getAll($sql);
}

function getAllBestSellers(){
    $sql='SELECT * FROM sach WHERE 1';
    $sql.=' AND tonkho > 0';
    $sql.=' AND luotban > 0';
    $sql.=' AND trangthai = 1';
    $sql.=' ORDER BY luotban DESC';
    return getAll($sql);
}

?>