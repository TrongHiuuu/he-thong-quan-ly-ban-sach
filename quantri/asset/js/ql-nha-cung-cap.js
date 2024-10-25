document.getElementById('supplierModal').addEventListener('hidden.bs.modal', function () {
    document.getElementById('supplierForm').reset();
});

function openModal(e, action) {
    e.preventDefault(); // Ngăn chặn hành vi mặc định của sự kiện

    const modalTitle = document.getElementById('supplierModalLabel');
    const modalSaveBtn = document.getElementById('modalSaveBtn');
    const inputs = document.querySelectorAll('.modal-body input, .modal-body select');
    const editElements = document.querySelectorAll('.edit-element'); // Giả sử bạn có các phần tử cần hiển thị khi chỉnh sửa
    const statusForm = document.getElementById('statusForm'); 

    inputs.forEach(input => input.disabled = false); // Reset

    if (action === 'add') {
        modalTitle.textContent = 'Thêm nhà cung cấp';
        modalSaveBtn.textContent = 'Thêm nhà cung cấp';
        editElements.forEach(el => el.style.display = 'none');
        modalSaveBtn.classList.remove('d-none');
        
        statusForm.style.display = 'none'; 

        // Gắn sự kiện click cho nút lưu
        modalSaveBtn.onclick = function() {
            // Validate form
            var ten = $('#supplierForm input[name="supplier-name"]').val();
            var email = $('#supplierForm input[name="supplier-email"]').val();
            var dienthoai = $('#supplierForm input[name="supplier-phone"]').val();
            var diachi = $('#supplierForm input[name="supplier-address"]').val();
            var alert = formValidateSupplier(ten, email, dienthoai, diachi);

            if (alert === '') {
                // Serialize form data
                var formData = new FormData($('#supplierForm')[0]);
                formData.append('supplierForm', true);

                // AJAX request to handle form submission
                $.ajax({
                    url: '../controller/ql-nha-cung-cap.php', // URL to handle form submission
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response.success) {
                            $('.alert').html('<span class="green">Thêm thành công</span>');
                            $('#supplierModal').modal('hide'); // Hides the modal
                            $('#supplierForm')[0].reset(); // Reset the form after hiding
                            $('#supplierModal .alert').html("");
                        } else {
                            $('.alert').html('<span class="red">Nhà cung cấp này đã tồn tại do trùng tên, email hoặc số điện thoại</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        $('.alert').html('<span class="red">Có lỗi xảy ra. Vui lòng thử lại sau.</span>');
                    }
                });
            } else {
                $('.alert').html(alert);
            }
        };
    }
else if (action === 'view') {
        modalTitle.textContent = 'Thông tin nhà cung cấp';
        modalSaveBtn.classList.add('d-none');
        inputs.forEach(input => input.disabled = true);
    
        var supplier_id = $(e.target).closest('tr').find('.supplier_id').text();
        
        $.ajax({
            url: '../controller/ql-nha-cung-cap.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'view_data_supplier': true,
                'supplier_id': supplier_id,
            },
            success: function(response) {
                $('#supplierForm input[name="supplier-name"]').val(response.tenNCC);
                $('#supplierForm input[name="supplier-email"]').val(response.email);
                $('#supplierForm input[name="supplier-phone"]').val(response.dienthoai);
                $('#supplierForm input[name="supplier-address"]').val(response.diachi);
    
                // Hide province, district, and ward fields in view mode
                $('#supplierForm select[name="supplier-city"]').parent().hide();
                $('#supplierForm select[name="supplier-district"]').parent().hide();
                $('#supplierForm select[name="supplier-ward"]').parent().hide();
    
                // Handle status
                if (response.trangthai == 1) {
                    $('#userstatus').prop('checked', true);
                    $('#switch-label').text('Đang hoạt động');
                } else {
                    $('#userstatus').prop('checked', false);
                    $('#switch-label').text('Bị khóa');
                }
    
                $('#supplierModal').show(); // Show modal
            },
        });
    }else if (action === 'edit') {
        modalTitle.textContent = 'Chỉnh sửa nhà cung cấp';
        modalSaveBtn.textContent = 'Cập nhật';
        editElements.forEach(el => el.style.display = 'block');
        modalSaveBtn.classList.remove('d-none');
        statusForm.style.display = 'block'; 

        var supplier_id = $(e.target).closest('tr').find('.supplier_id').text();
        
        $.ajax({
            url: '../controller/ql-nha-cung-cap.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'view_data_supplier': true,
                'supplier_id': supplier_id,
            },
            success: function(response) {
                $('#supplierForm input[name="supplier-name"]').val(response.tenNCC);
                $('#supplierForm input[name="supplier-email"]').val(response.email);
                $('#supplierForm input[name="supplier-phone"]').val(response.dienthoai);
                $('#supplierForm input[name="supplier-address"]').val(response.diachi);
                $('#supplierForm select[name="supplier-city"]').val(response.city);
                $('#supplierForm select[name="supplier-district"]').val(response.district);
                $('#supplierForm select[name="supplier-ward"]').val(response.ward);
    
                // Handle status
                if (response.trangthai == 1) {
                    $('#userstatus').prop('checked', true);
                    $('#switch-label').text('Đang hoạt động');
                } else {
                    $('#userstatus').prop('checked', false);
                    $('#switch-label').text('Bị khóa');
                }
    
                $('#supplierModal').show(); // Show modal
            },
        });

        // Gắn sự kiện click cho nút cập nhật
        modalSaveBtn.onclick = function() {
            var ten = $('#supplierForm input[name="supplier-name"]').val();
            var email = $('#supplierForm input[name="supplier-email"]').val();
            var dienthoai = $('#supplierForm input[name="supplier-phone"]').val();
            var diachi = $('#supplierForm input[name="supplier-address"]').val();
            var city = $('#supplierForm select[name="supplier-city"]').val();
            var district = $('#supplierForm select[name="supplier-district"]').val();
            var ward = $('#supplierForm select[name="supplier-ward"]').val();
            var alert = formValidateSupplier(ten, email, dienthoai, diachi);
        
            if (alert === '') {
                var formData = new FormData($('#supplierForm')[0]);
                formData.append('supplierForm', true);
                formData.append('supplier_id', supplier_id);
        
                $.ajax({
                    url: '../controller/ql-nha-cung-cap.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            $('.alert').html('<span class="green">Cập nhật thành công</span>');
                            $('#supplierModal').modal('hide');
                            $('#supplierForm')[0].reset();
                        } else {
                            $('.alert').html('<span class="red">Có lỗi xảy ra. Vui lòng thử lại sau.</span>');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.alert').html('<span class="red">Có lỗi xảy ra. Vui lòng thử lại sau.</span>');
                    }
                });
            } else {
                $('.alert').html(alert);
            }
        };
    }
}
function formValidateSupplier(ten, email, dienthoai, diachi) {
    //Kiểm tra hợp lệ
    let alert = '';
    let phoneRegex = /^0[0-9]{9}$/;
    let emailRegex = /^[\w-]+(?:\.[\w-]+)*@(?:[\w-]+\.)+[a-zA-Z]{2,7}$/;

    //Fullname
    if(ten === '') {   //nếu tên rỗng
        alert = "<span class='red'>Vui lòng nhập họ tên.</span>";
        return alert;
    }
    else if(ten.length < 3){
        alert = "<span class='red'>Vui lòng nhập họ tên nhiều hơn 3 ký tự.</span>";
        return alert;
    }

    //Email
    if(email === ''){
        alert = "<span class='red'>Vui lòng nhập email.</span>";
        return alert;
    }
    else if(!emailRegex.test(email)){
        alert = "<span class='red'>Email không hợp lệ.</span>";
        return alert;
    }

    //Phone number
    if(dienthoai === ''){
        alert = "<span class='red'>Vui lòng nhập số điện thoại.</span>";
        return alert;
    }
    else if (dienthoai.length !== 10 || !phoneRegex.test(dienthoai)){
        alert = "<span class='red'>Sai định dạng số điện thoại.</span>";
        return alert;
    }

    //diachi
    if(diachi === ''){
        alert = "<span class='red'>Vui lòng nhập địa chỉ.</span>";
        return alert;
    }
    
    return alert;
}

/* function validate supplier form */

