function addForm() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#modal-form').modal('show');
    $('#modal-form #form-account')[0].reset();
    $("#modal-form #form-account").find('.help-block').remove();
    $("#modal-form #form-account").find('.form-group').removeClass('has-error');
    $('.modal-title').text('Thêm mới');
    $('.btn-save').text('Thêm mới');
}
function refresh(){
    $('#accounts-table').DataTable().ajax.reload();
}
function editForm(id) {
    save_method = "edit";
    $("#modal-form #form-account").find('.help-block').remove();
    $("#modal-form #form-account").find('.form-group').removeClass('has-error');
    $('#modal-form #form-account')[0].reset();
    $('input[name=_method]').val('PATCH');
    $('.btn-save').text('Chỉnh sửa');
    $.ajax({
        type: "get",
        url: base_url + "/admin/account/" + id + "/edit",
        data: $("#modal-form #form-account").serialize(),
        dataType: "json",
        success: function (data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Chỉnh sửa');
            $("#id").val(data.id);
            $("#name").val(data.name);
            $("#email").val(data.email);
            $("#phone").val(data.phone);
            $("#address").val(data.address);
        },
        error: function (data) {
            alert("Error!!!");
        }
    });
}
$(document).ready(function () {
    $("#modal-form #form-account").submit(function (e) {
        e.preventDefault();

        $(this).find('.help-block').remove();
        $(this).find('.form-group').removeClass('has-error');

        var id = $("#id").val();
        if (save_method == 'add') {
            url = base_url + "/admin/account";
        }else{
            url = base_url+ "/admin/account/" + id;
        }

        $.ajax({
            type: "post",
            url: url,
            data: $(this).serialize(),
            success: function (data) {
                users_table.draw(false);
                $("#modal-form").modal("hide");
                toastr.success(data)
            },
            error: function (xhr) {
                var res = xhr.responseJSON;
                if ($.isEmptyObject(res) == false) {
                    $.each(res.errors,function (key,value) {
                        $("#"+key).closest(".form-group")
                                    .addClass("has-error")
                                    .append('<span class="help-block with-errors">'+value+'</span>');
                    })
                }
            },
        });
    });
});

function deleteData(id) {
    var csrf_token = $("meta[name='csrf-token']").attr('content');
    if (confirm('Bạn có chắc là muốn xóa?')) {
        $.ajax({
            type: "post",
            url: base_url+ "/admin/account/" + id ,
            data: {
                '_method' : "DELETE",
                '_token' : csrf_token
            },
            success: function (data) {
                toastr.success(data);
                users_table.draw(false);
            }
        });
    }else{
        return false;
    }
}
