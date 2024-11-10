<?php

    // Kiểm tra nếu có dữ liệu được gửi từ Ajax
    if (isset($_POST['email']) && isset($_POST['password'])) {
        include_once('../lib/connect.php');
        include_once('../model/signIn.php');
        include_once('../lib/session.php');

        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Kiểm tra thông tin đăng nhập
        $loginResult = checkLogin($email, $password);
        if ($loginResult->success) {
            $account = getAccount($email);
            login_session($account['idTK'], $account['email'], $account['tenTK'], $account['idNQ']);
        }
        echo json_encode(value: $loginResult);
        exit;
    }

    require_once("view/signIn.php")
?>