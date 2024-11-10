<?php
    function getAccount($email): array|bool|null {
        $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
        $result = getOne($sql);
        return $result;
    }

    function checkLogin($email, $password): object {
        $result = (object) ['success', 'status', 'message'];
        $account = getAccount($email);
        // Kiểm tra xem có tồn tại không?
        if (!empty($account)) {
            $db_password = $account['matkhau'];

            // So sánh mật khẩu nhập vào với mật khẩu trong cơ sở dữ liệu
            if (password_verify(password: $password, hash: $db_password)) {
                if ($account['trangthai'] == 1) {
                    $result->success = true;
                    $result->status = $account["trangthai"];
                    $result->success = "Đăng nhập thành công!";
                } else {
                    $result->success = false;
                    $result->status = $account["trangthai"];
                    $result->success = "Tài khoản của bạn đã bị khoá!";
                }
            } else {
                $result->success = false;
                $result->status = null;
                $result->success = "Mật khẩu không chính xác!";
            }
        } else {
            $result->success = false;
            $result->status = null;
            $result->success = "Tài khoản không tồn tại!";
        }

        return $result;
    }
?>