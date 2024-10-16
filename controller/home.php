<?php
$bestSellers = getAllBestSellers();
$categories = getAllCategories();
$result = getAllBooks();


require 'view/trangChu.php';
?>