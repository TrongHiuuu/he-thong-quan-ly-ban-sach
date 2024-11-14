// Reset
document.getElementById('permissionModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('permissionForm').reset();
    let textMessage = document.querySelectorAll('.text-message');
    textMessage.forEach(element => {
        element.textContent = '';
    });
    location.reload();
});

$(document).ready(function() {
    const modalTitle = document.getElementById('permissionModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');
    // open add form
    $('.open_add_form').click(function() {
        modalTitle.textContent = 'Thêm nhóm quyền';
        modalSaveBtn.textContent = 'Thêm nhóm quyền';
        submit_btn.setAttribute('name', 'submit_btn_add');
        document.getElementById('permissionForm').querySelector('.edit').style.display = 'none';
    });
    $('.open_view_form').click(function() {
        modalTitle.textContent = 'Chi tiết nhóm quyền';
        modalSaveBtn.style.display = 'none';
        var role_id = $(this).closest('tr').find('.role_id').text();
        $.ajax({
            url: 'controller/Role.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'view_data': true,
                'role_id': role_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                var role = obj.role;
                var role_detail = obj.role_detail;
                //Display role name
                $('#permissionGroupName').val(role.tenNQ);

                //Display permission
                for(var i=0; i<role_detail.length; i++)
                    $('#permissionForm input[name="'+role_detail[i].tenCN+'"]').prop('checked', true);
                
                //Disable all input field
                var inputs = document.querySelectorAll('#permissionForm input');
                inputs.forEach(input => {
                    input.setAttribute('disabled', true);
                });
            },
        });
    });
   // open edit form
   $('.open_edit_form').click(function(e) {
        e.preventDefault();
        modalTitle.textContent = 'Chỉnh sửa nhóm quyền';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'submit_btn_update');
        var role_id = $(this).closest('tr').find('.role_id').text();
        $.ajax({
            url: 'controller/Role.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'view_data': true,
                'role_id': role_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                var role = obj.role;
                var role_detail = obj.role_detail;
                //Display role name
                $('#permissionGroupName').val(role.tenNQ);
                $('#idNQ').val(role.idNQ);

                //Display permission
                for(var i=0; i<role_detail.length; i++)
                    $('#permissionForm input[name="'+role_detail[i].tenCN+'"]').prop('checked', true);
            },
        });
    });

    $('#permissionForm').submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // validate form
        var tenNQ = $('#permissionGroupName').val();
        if(tenNQ != ''){
            // Serialize form data
            var formData = new FormData( $('#permissionForm')[0]);
            // AJAX request to handle form submission
            $.ajax({
                url: 'controller/Role.php', // URL to handle form submission
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    const obj = JSON.parse(response);
                    if(obj.success){
                        if(obj.btn == 'add') {
                            toast({
                                title: 'Thành công',
                                message: 'Thêm nhóm quyền thành công',
                                type: 'success',
                                duration: 3000
                            });
                        } else {
                            toast({
                                title: 'Thành công',
                                message: 'Cập nhật nhóm quyền thành công',
                                type: 'success',
                                duration: 3000
                            });
                        }
                    }
                    else toast({
                        title: 'Lỗi',
                        message: 'Nhóm quyền đã tồn tại',
                        type: 'error',
                        duration: 3000
                    });
                },
            });
        }
        else {
            $('.text-message.role-name-msg').text('Tên nhóm quyền không được để trống');
        }
    });

    // lock-role
    $('.lock_role').click(function(e) {
        e.preventDefault();
        var role_id = $(this).closest('tr').find('.role_id').text();
        $.ajax({
            url: 'controller/Role.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'lock_role': true,
                'role_id': role_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                if(obj.success)
                toast({
                    title: 'Thành công',
                    message: 'Khoá nhóm quyền thành công',
                    type: 'success',
                    duration: 3000
                });
            },
        });
    });

    // unlock-role
    $('.unlock_role').click(function(e) {
        e.preventDefault();
        var role_id = $(this).closest('tr').find('.role_id').text();
        $.ajax({
            url: 'controller/Role.php', // Replace with the actual PHP endpoint to fetch user details
            type: 'POST',
            data: {
                'lock_role': true,
                'role_id': role_id,
            },
            success: function(response){
                const obj = JSON.parse(response);
                if(obj.success)
                toast({
                    title: 'Thành công',
                    message: 'Mở khoá nhóm quyền thành công',
                    type: 'success',
                    duration: 3000
                });
            },
        });
    });
});