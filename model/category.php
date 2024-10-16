<?php
function getAllCategories(){
    $sql = 'SELECT * FROM theloai';
    return getAll($sql);
}
?>