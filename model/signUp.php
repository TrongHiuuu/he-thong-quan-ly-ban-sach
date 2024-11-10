<?php
    function checkEmailIsExist($email): object {
        $result = (object) ['isExist', 'message'];
        $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
        $emailIsExist = getOne($sql);

        if($emailIsExist == null) {
            $result->isExist = false;
            $result->message = "Email khả dụng";
        } else {
            $result->isExist = true;
            $result->message = "Email đã tồn tại";
        }

        return $result;
    } 

    function insertNewAccount($fullname, $email, $phoneNumber, $password): object {
        $result = (object) ['success' , 'message'];
        $hashedPassword = password_hash($password, algo: PASSWORD_DEFAULT);
        $sql = "INSERT INTO taikhoan (tenTK, email, dienthoai, password, trangthai, idNQ)
            VALUES ('$fullname', '$email', '$phoneNumber', '$hashedPassword', 1, 1)";
        insert($sql);

        $result->success = true;
        $result->message = "Đăng ký thành công";

        return $result;
    }

    function registerAccount($fullname, $email, $phoneNumber, $password): object {
        $result = (object) ['success', 'message'];
        $checkEmailIsExist = checkEmailIsExist($email);

        if ($checkEmailIsExist->isExist === false) {
            $insertAccount = insertNewAccount($fullname, $email, $phoneNumber, $password);

            $result->success = true;
            $result->message = $insertAccount->message;
        } else {
            $result->success = false;
            $result->message = $checkEmailIsExist->message;
        } 

        return $result;
    }
?>