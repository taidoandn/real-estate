function addRoleForm() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#modal-form').modal('show');
    $('#modal-form #form-role')[0].reset();
    $("#modal-form #form-role").find('.help-block').remove();
    $("#modal-form #form-role").find('.form-group').removeClass('has-error');
    $("#modal-form #form-role").find('input[name="permission[]"]').attr('checked',false);
    $('.modal-title').text('Thêm mới');
    $('.btn-save').text('Thêm mới');
}
function refresh() {
    roles_table.ajax.reload();
}

function editRoleForm(id) {
    save_method = "edit";
    $('#modal-form #form-role')[0].reset();
    $("#modal-form #form-role").find('.help-block').remove();
    $("#modal-form #form-role").find('.form-group').removeClass('has-error');
    $("#modal-form #form-role").find('input[name="permission[]"]').attr('checked',false);
    $('input[name=_method]').val('PATCH');
    $('.btn-save').text('Chỉnh sửa');
    $.ajax({
        type: "get",
        url: window.location.href + "/" + id + "/edit",
        data: $("#modal-form #form-role").serialize(),
        dataType: "json",
        success: function (data) {
            $('#modal-form').modal('show');
            if ($.isEmptyObject(data.permission) === false) {
                $.each(data.permission,function (key,value) {
                    $("#"+value.name).attr("checked",true);
                })
            }
            $('.modal-title').text('Chỉnh sửa');
            $("#id").val(data.role.id);
            $("#name").val(data.role.name);
        },
        error: function (data) {
            console.log(data);
        }
    });
}
$(document).ready(function () {
    $("#modal-form #form-role").submit(function (e) {
        e.preventDefault();

        $(this).find('.help-block').remove();
        $(this).find('.form-group').removeClass('has-error');

        var id = $("#id").val();
        if (save_method == 'add') {
            url = window.location.href;
        }else{
            url = window.location.href + "/" + id;
        }

        $.ajax({
            type: "post",
            url: url,
            data: $(this).serialize(),
            success: function (data) {
                roles_table.draw(false);
                $("#modal-form").modal("hide");
                toastr.success(data)
            },
            error: function (xhr) {
                var res = xhr.responseJSON;
                if ($.isEmptyObject(res) === false) {
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

function deleteRoleData(id) {
    var csrf_token = $("meta[name='csrf-token']").attr('content');
    if (confirm('Bạn có chắc là muốn xóa?')) {
        $.ajax({
            type: "post",
            url: window.location.href + "/"+ id ,
            data: {
                '_method' : "DELETE",
                '_token' : csrf_token
            },
            success: function (data) {
                toastr.success(data);
                roles_table.draw(false);
            }
        });
    }else{
        return false;
    }
}
