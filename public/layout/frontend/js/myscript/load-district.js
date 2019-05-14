$(document).ready(function () {
    $('select[name="city_id"]').change(function () {
        $('select[name="district_id"]').select2('val',"");
        var city_id = $(this).val();
        getDistrict(city_id);
    });
    if($('select[name="city_id"]').val()) {
        var city_id = $('select[name="city_id"]').val();
        getDistrict(city_id,district_id);
    }
});
function getDistrict(city_id,district_id = null){
    $.ajax({
        type : 'get',
        url : base_url + "/ajax/districts",
        data : { city_id : city_id },
        success : function (data) {
            var options = '';
            options += '<option value="" selected> Chọn Quận/huyện </option>';
            if (data.length > 0) {
                $.each(data, function (key, value) {
                    options += "<option value='" + value.id + "'>" + value.name + "</option>";
                });
                $('select[name="district_id"]').html(options);
                $('select[name="district_id"]').select2();
                $('select[name="district_id"]').val(district_id).change();
            }else {
                $('select[name="district_id"]').html(options);
                $('select[name="district_id"]').select2();
            }
        }
    });
}
