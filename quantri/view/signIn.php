<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--đổi title khi nhấn registerLink-->
    <title class="title">Đăng nhập</title>
    <link rel="stylesheet" href="asset/css/style_LoginAdmin.css">
    <script src="../asset/js/"></script>
</head>
<body>
    <img src="asset/img/logo.png" alt="vinabook">
    <div class="wrapper">
        <div class=" form-box login">
            <h1>Đăng nhập</h1>
            <form  id="signIn-form" method="POST" enctype="multipart/form-data">
                <input type="email" name="email" placeholder="Email" required> 
                <input type="password" name="password" placeholder="Mật khẩu" required>
                <div class="alert"></div>
                <input type="hidden" name="sign_in">
                <button type="submit" name="sign_in">ĐĂNG NHẬP</button>
                <div>Bạn đã <a href="?page=forgotPassword1">quên mật khẩu</a> ?</div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="asset/js/script_signIn.js"></script>
</body>
</html>
