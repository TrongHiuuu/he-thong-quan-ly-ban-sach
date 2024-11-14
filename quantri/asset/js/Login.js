$(document).ready(function(){
    // Cái này để test toast messgae thôi nha mấy ní!!!
    $('#login-form').on('submit', function(e) {
        e.preventDefault();
        if (validateFormDangNhap()) {
            var formData = new FormData($('#login-form')[0]);
            $.ajax({
              url: "controller/Login.php",
              type: "POST",
              data: formData,
              processData: false,
              contentType: false,
              success: function(response) {
                console.log(response);
                const obj = JSON.parse(response);
                if(obj.success){
                  toast({
                    title: 'Thành công',
                    message: 'Đăng nhập thành công',
                    type: 'success',
                    duration: 3000
                  });
                  window.location.href='index.php?page=home';
                }else{
                  toast({
                    title: 'Lỗi',
                    message: obj.msg,
                    type: 'error',
                    duration: 3000
                  });
                }
              },
            });
        }
    });
});
