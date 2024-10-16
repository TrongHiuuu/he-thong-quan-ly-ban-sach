<?php
include '../lib/connect.php';

include 'inc/header.php';
if(isset($_GET['page'])&&($_GET['page']!=="")){
    switch(trim($_GET['page'])){
        /* supplier */
        // case 'supplier':
        //     $result = getAllSupplier();
        //     $pageTitle = "supplier";
        //     require_once '../view/supplier.php';
        //     break;

        // case 'searchSupplier':
        //     // $action = 'search';
        //     $pageTitle = "searchSupplier";
        //     if(isset($_POST['admin-controller-supplier'])){
        //         require_once '../controller/filterSupplier.php';
        //     }
        //     else $result = $_SESSION['searchResult'];
        //     require_once '../view/supplier.php';
        //     break; 
        /* supplier */
        
        
            
        default: /* mục đầu tiên trong nav bar*/
        //require homepage
        // $result = getAllSupplier();
        // $pageTitle = "supplier";
        require_once 'view/ql-nha-cung-cap.php';
        break;
    }
}
else{ /* mục đầu tiên trong nav bar*/
    //require homepage
    // $result = getAllSupplier();
    // $pageTitle = "supplier";
    require_once 'view/ql-nha-cung-cap.php';
}
?>