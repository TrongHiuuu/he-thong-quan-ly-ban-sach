<?php

    function updateFullname($fullname):object {
        $sql = "UPDATE taikhoan
            SET
                tenTK = '$fullname'
            WHERE
                idTK = '".$_SESSION['user']['id']."'
        ";
        edit($sql);

        return (object) [
            'success' => true,
            'message' => 'Thay đổi họ và tên thành công'
        ];
    }

    function updateEmail($email):object {
        $sql = "UPDATE taikhoan
            SET
                email = '$email'
            WHERE
                idTK = '".$_SESSION['user']['id']."'
        ";
        edit($sql);

        return (object) [
            'success' => true,
            'message' => 'Thay đổi email thành công'
        ];
    }

    function updatePhoneNumber($phoneNumber):object {
        $sql = "UPDATE taikhoan
            SET
                dienthoai = '$phoneNumber'
            WHERE
                idTK = '".$_SESSION['user']['id']."'
        ";
        edit($sql);

        return (object) [
            'success' => true,
            'message' => 'Thay đổi số điện thoại thành công'
        ];
    }

    function updatePassword($newPassword): object {
        $hashedPassword = password_hash($newPassword, algo: PASSWORD_DEFAULT);

        $sql = "UPDATE taikhoan 
            SET
                matkhau = '$hashedPassword'
            WHERE
                idTK = '".$_SESSION['user']['id']."'
        ";
        edit($sql);

        return (object)[
            'success' => true, 
            'message' => "Thay đổi mật khẩu thành công"
        ];
    }

    function checkCurrentPassword($currentPassword): object {
        $result = (object) ['success', 'message'];

        $sql = "SELECT matkhau FROM taikhoan WHERE id = '".$_SESSION['user']['id']."'";
        $accountCurrentPassword = getOne($sql);

        if ($currentPassword === $accountCurrentPassword) {
            $result->success = true;
            $result->message = "Mật khẩu hiện tại chính xác";
        } else {
            $result->success = false;
            $result->message = "Mật khẩu hiện tại không đúng";
        }

        return $result;
    }

    function updateInfo($fullname, $email, $phoneNumber): object {
        $sql = "UPDATE taikhoan
            SET
                tenTK = '$fullname',
                email = '$email',
                dienthoai = '$phoneNumber',
            WHERE
                id = '".$_SESSION['user']['id']."'
        ";
        insert($sql);
        return (object)[
            'success' => true, 
            'message' => "Cập nhật lại thông tin cá nhân thành công"
        ];
    }


    
?>