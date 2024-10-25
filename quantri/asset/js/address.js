$(document).ready(function () {
    function populateSelect(selector, defaultText, data, keyId, keyName) {
        const $element = $(selector);
        $element.empty();
        $element.append($('<option>', {
            value: '',
            text: defaultText
        }));
        $.each(data, function(i, item) {
            $element.append($('<option>', {
                value: item[keyId],
                text: item[keyName]
            }));
        });
    }
    
    
    function fetchData(url, params, onSuccess) {
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            data: params,
            success: onSuccess,
            error: function(xhr, textStatus, errorThrown) {
                console.error(`Error fetching data from ${url}:`, errorThrown);
                if (textStatus === 'parsererror') {
                    console.error('Failed to parse JSON response');
                    alert('Có lỗi xảy ra khi phân tích cú pháp dữ liệu JSON từ server.');
                } else {
                    alert(`Có lỗi xảy ra khi lấy dữ liệu từ ${url}: ${textStatus}`);
                }
            }
        });
    }
    
    
    $('#supplier-city').on('change', function() {
        const provinceId = $(this).val();
        populateSelect('#supplier-district', 'Chọn Quận/Huyện', [], 'id', 'name');
        populateSelect('#supplier-ward', 'Chọn Phường/Xã', [], 'id', 'name');

        if (provinceId || provinceId !== '') {
            fetchData('../../api/getDistricts.php', { province_id: provinceId }, function(data) {
                populateSelect('#supplier-district', 'Chọn Quận/Huyện', data, 'id', 'name');
            });
        }
    });

    $('#supplier-district').on('change', function() {
        const districtId = $(this).val();
        populateSelect('#supplier-ward', 'Phường/Xã', [], 'id', 'name');

        if (districtId || districtId !== '') {
            fetchData('../../api/getWards.php', { district_id: districtId }, function(data) {
                populateSelect('#supplier-ward', 'Phường/Xã', data, 'id', 'name');
            });
        }
    });


 





















