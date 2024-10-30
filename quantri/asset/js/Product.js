// Reset
document.getElementById('openSelectAuthorModalBtn').addEventListener('click', function(e) {
    var selectAuthorModal = new bootstrap.Modal(document.getElementById('selectAuthorModal'));
    selectAuthorModal.show(); // Hiển thị modal chọn tác giả
});

document.getElementById('productModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('productForm').reset();
    let textMessage = document.querySelectorAll('.text-message');
    textMessage.forEach(element => {
        element.textContent = '';
    });
    location.reload();
});

$(document).ready(function() {
    $('#upload-img').on('change', function(event) {
        let url = URL.createObjectURL(event.target.files[0]);
        $('#img-preview').attr('src', url);
    });

    const modalTitle = document.getElementById('productModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');
    $('.open_add_form').click(function() {
        modalTitle.textContent = 'Thêm sản phẩm';
        modalSaveBtn.textContent = 'Thêm sản phẩm';
        submit_btn.setAttribute('name', 'submit_btn_add');
        document.getElementById('productForm').querySelectorAll('.edit').forEach(element => {
            element.style.display = 'none';
        })
    });

    $('.open_edit_form').click(function () { 
        modalTitle.textContent = 'Chỉnh sửa sản phẩm';
        modalSaveBtn.textContent = 'Lưu thay đổi';
        submit_btn.setAttribute('name', 'submit_btn_update');
    });
});