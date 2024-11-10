<?php
  //import session
  include_once('lib/session.php');
  // Import connectDB
  include_once('lib/connect.php');
  // Header
  require_once("inc/header.php");

  // require 'model/book.php';
  require 'model/category.php';
  // Content
  if (isset($_GET['page']) && $_GET['page'] != '') {
    $page = $_GET['page'];
    //Main page
    switch ($page) {
      case 'home':
        require_once('view/home.php');
        break;

      case 'signIn':
        require_once('view/signIn.php');
        break;

      case 'signUp':
        require_once('controller/signUp.php');
        break;

      case 'signOut':
        require_once('controller/signOut.php');
        break;

      case 'forgotPassword':
        break;

      case 'customerInfo':
        require_once("view/customerInfo.php");
        require_once('controller/customerInfo.php');
        break;
      case 'cart':
        break;
        
      case 'productDetail':
        require "controller/productDetail.php";
        break;

    }
  } else {
    header("Location:index.php?page=home");
  }
  // Footer
  require_once("inc/footer.php");

?>
