function loadPrice() {
    if ($(".diff-date").val() && $(".price").val()) {
        let price = $(".diff-date").val() * $(".price").val();
        let price_format = $.number(price);
        $("#pricePost").html(price_format + " đồng");

        let vat = $(".diff-date").val() * $(".price").val() / 10;
        let vat_format = $.number(vat);
        $("#vat").html(vat_format + " đồng");

        let total_price = vat + price;
        let total_format = $.number(total_price);
        $("#totalPrice").html(total_format + " đồng");
    }else{
        return false;
    }
}
$(document).ready(function () {
    $("[name='type_id']").on('change',function(){
        loadPostType($(this).val());
    });
    if ($("[name='type_id']").val()) {
        var type_id = $("[name='type_id']").val();
        loadPostType(type_id);
    }
    function loadPostType(type) {
        $.ajax({
            type: "get",
            url: base_url + "/ajax/post-type",
            data: {
                "type" : type
            },
            dataType: "json",
            success: function (data) {
                $("#type-name").html(data.name);
                $("#type-description").html(data.description);
                $(".price").val(data.price);
                let number_format = $.number(data.price);
                $("#type-price").html(number_format + " đồng / Ngày");
                loadPrice();
            }
        });
    }
});
