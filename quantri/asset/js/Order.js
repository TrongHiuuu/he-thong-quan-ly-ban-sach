// Reset
const modal = document.getElementById('orderModal');

document.getElementById('orderModal').addEventListener('hidden.bs.modal', function() {
    document.getElementById('orderForm').reset();
    // Chỉ reload khi mở edit-modal
    if (!modal.classList.contains('view-modal')) {
        location.reload();
    }
});

$(document).ready(function() {
    const modalTitle = document.getElementById('orderModalLabel');
    const modalSaveBtn = document.getElementById('saveModalBtn');
    var submit_btn = document.getElementById('submit_btn');

    $('.open_view_form').click(function(e) {
        e.preventDefault();

        modal.classList.add('view-modal');
        modalTitle.textContent = 'Xem chi tiết đơn hàng';

        $('#orderForm').find('.not-edit').show();
        document.getElementById('orderForm').querySelectorAll('.edit').forEach(e => {
            e.style.setProperty('display', 'none', 'important');
        })
    });

    $('.open_edit_form').click(function(e) {
        e.preventDefault();
        
        modal.classList.remove('view-modal');
        modalTitle.textContent = 'Chỉnh sửa đơn hàng';
        submit_btn.setAttribute('name', 'submit_btn_update');

        $('#orderForm').find('.edit').show();
        document.getElementById('orderForm').querySelectorAll('.not-edit').forEach(e => {
            e.style.setProperty('display', 'none', 'important');
        })
    });
});