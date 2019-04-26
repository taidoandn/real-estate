$(document).ready(function () {
    $("div.progress").hide();
    $("#fImages").on("change", function() {
        var form_data = new FormData();
        form_data.append('id', $('form#form-data').data('id'));
        form_data.append('_token', $('meta[name="csrf-token"]').attr('content'));
        form_data.append('file', $('#fImages').prop('files')[0]);
        $.ajax({
            type: "post",
            url: base_url + "/ajax/upload-image",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            xhr : function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress',function (e) {
                if (e.lengthComputable) {
                    console.log("Bytes load :" +e.loaded);
                    console.log("Total size :" +e.total);
                    console.log("Percent upload :" + (e.loaded/e.total));
                    var percent = Math.round((e.loaded/e.total)*100);
                    $("div.progress").show();
                    $("#progressBar").attr("aria-valuenow",percent).css("width",percent+"%").text(percent + "%");
                }
                });
                return xhr;
            },
            success: function (data) {
                $("#uploaded-ads-image-wrap").append(data);
                toastr.success("Thêm ảnh thành công");
                $(".progress").hide("slow");
                $("#progressBar").attr("aria-valuenow",0).css("width",0+"%").text(0 + "%");
            },
            error: function (xhr) {
                var res = xhr.responseJSON;
                console.log(res);
                if ($.isEmptyObject(res) == false) {
                    $.each(res.errors,function (key,value) {
                        toastr.error("Error : " + value);
                    })
                    $(".progress").hide("slow");
                    $("#progressBar").attr("aria-valuenow",0).css("width",0+"%").text(0 + "%");
                }
            },
        });
    });
    $(document).on("click",".imgDeleteBtn",function () {
        if (confirm("Bạn có chắc là muốn xóa ảnh này?")) {
            var id = $(this).attr("id");
            $.ajax({
                type: "get",
                url: base_url+ "/ajax/delete-image",
                data: { id : id },
                success: function (data) {
                    $("#image-"+id).remove();
                    toastr.success(data);
                }
            });
        }

    });
});



