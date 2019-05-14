$(document).ready(function () {
    $("[name='purpose']").on('change', function () {
        if ($(this).val() == 'sale') {
            loadUnit('sale');
        } else if ($(this).val() == 'rent') {
            loadUnit('rent');
        }else{
            $('select[name="unit"]').html('');
        }
    });

    if($('select[name="purpose"]').val()) {
        var purpose = $('select[name="purpose"]').val();
        loadUnit(purpose);
    }

    function loadUnit(purpose) {
        if (purpose == 'sale') {
            var options = "<option value='total_area'>Tổng diện tích</option><option value='m2'>Mét vuông</option>";
            $('select[name="unit"]').html(options);
        }else{
            var options = "<option value='month'>Tháng</option><option value='year'>Năm</option>";
            $('select[name="unit"]').html(options);
        }

        if(old_purpose == purpose && old_unit) {
            $('select[name="unit"]').val(old_unit);
        }
    }
});
