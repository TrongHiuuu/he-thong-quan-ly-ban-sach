$(document).ready(function () {
    const modal = document.getElementById('grnModal');

    document.getElementById('grnModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('grnForm').reset();
        location.reload();
    });


    $('#add-row-btn').on('click', function () {
        let newRow = $('.grn-row-template').clone().removeClass('grn-row-template');
        let newRowNumber = $('#grnForm table tbody tr:not(.grn-row-template)').length + 1;
        newRow.find('td:first').text(newRowNumber);
        $('#grnForm table tbody').append(newRow);
        updateRowCount();   //Bỏ dòng này nếu không có row-count
    });

    $(document).on('click', '.delete-row', function () {
        $(this).closest('tr').remove();
        updateRowNumber();
        updateRowCount();   //Bỏ dòng này nếu không có row-count
    });

    function updateRowNumber() {
        $('#grnForm table tbody tr:not(.grn-row-template)').each((index, row) => {
            $(row).find('td:first').text(index + 1);
        });
    }

    //Bỏ hàm này nếu không có row-count
    function updateRowCount() {
        let rowCount = $('#grnForm table tbody tr:not(.grn-row-template)').length;
        $('.row-count span').text(rowCount);
    }
});