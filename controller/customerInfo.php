<?php

    //Chỉ thay đổi các trường thông tin khi chúng không được để trống (dòng chứa lệnh !empty)
    if (isset($_POST['fullname'])) {
        if (!empty($_POST['fullname'])) {
            include_once('../lib/connect.php');
            include_once('../model/customerinfo.php');
            include_once('../lib/session.php');

            $fullname = $_POST['fullname'];
            $result = updateFullname($fullname);

            //Cập nhật lại session sau khi thay đổi thông tin thành công
            if ($result->success) {
                login_session_setFullName($fullname);
            }

            //echo json_encode($result);
        }
    }
    
    if (isset($_POST['email'])) {
        if (!empty($_POST['email'])) {
            include_once('../lib/connect.php');
            include_once('../model/customerinfo.php');
            include_once('../lib/session.php');

            $email = $_POST['email'];
            $result = updateEmail($email);

            //Cập nhật lại session sau khi thay đổi thông tin thành công
            if ($result->success) {
                login_session_setEmail($email);
            }

            //echo json_encode($result);
        }
    }

    if (isset($_POST['phoneNumber'])) {
        if (!empty($_POST['phoneNumber'])) {
            include_once('../lib/connect.php');
            include_once('../model/customerinfo.php');
            include_once('../lib/session.php');

            $phoneNumber = $_POST['phoneNumber'];
            $result = updatePhoneNumber($phoneNumber);
            //echo json_encode($result);
        }
    }

    if (isset($_POST['changePassword']) && $_POST['changePassword'] === true) {
        if (isset($_POST['currentPassword']) && isset($_POST['newPassword'])) {
        include_once('../lib/connect.php');
        include_once('../model/customerinfo.php');
        include_once('../lib/session.php');

            $currentPassword = $_POST['currentPassword'];
            $newPassword = $_POST['newPassword'];

            $checkCurrentPasswordResult = checkCurrentPassword($currentPassword);
            if ($checkCurrentPasswordResult->success === true) {
                $updatePasswordResult = updatePassword($newPassword);
                //echo json_encode($updatePasswordResult);
            } 
            // else {
            //     //echo json_encode($kiemTraMatkhauHienTaiResult);
            // }
        }
    }
   
    
?>