function addForm() {
    save_method = "add";
    $('input[name=_method]').val('POST');
    $('#modal-form').modal('show');
    $('#modal-form #form-user')[0].reset();
    $("#modal-form #form-user").find('.help-block').remove();
    $("#modal-form #form-user").find('.form-group').removeClass('has-error');
    $('.modal-title').text('Thêm mới');
    $('.btn-save').text('Thêm mới');
}
function refresh(){
    $('#users-table').DataTable().ajax.reload();
}
function editForm(id) {
    save_method = "edit";
    $("#modal-form #form-user").find('.help-block').remove();
    $("#modal-form #form-user").find('.form-group').removeClass('has-error');
    $("#modal-form #form-user").find('input[name="role[]"]').attr('checked',false);
    $('#modal-form #form-user')[0].reset();
    $('input[name=_method]').val('PATCH');
    $('.btn-save').text('Chỉnh sửa');
    $.ajax({
        type: "get",
        url: base_url + "/admin/users/" + id + "/edit",
        data: $("#modal-form #form-user").serialize(),
        dataType: "json",
        success: function (data) {
            if ($.isEmptyObject(data.role) === false) {
                $.each(data.role,function (key,value) {
                    $("#"+value.name).attr("checked",true);
                })
            }
            $('#modal-form').modal('show');
            $('.modal-title').text('Chỉnh sửa');
            $("#id").val(data.user.id);
            $("#name").val(data.user.name);
            $("#email").val(data.user.email);
            $("#phone").val(data.user.phone);
            $("#address").val(data.user.address);
        },
        error: function (xhr) {
            var res = xhr.responseJSON;
            if (res.message) {
                alert(res.message);
            }else{
                alert("Error!!")
            }
        }
    });
}
$(document).ready(function () {
    $("#modal-form #form-user").submit(function (e) {
        e.preventDefault();

        $(this).find('.help-block').remove();
        $(this).find('.form-group').removeClass('has-error');

        var id = $("#id").val();
        if (save_method == 'add') {
            url = base_url + "/admin/users";
        }else{
            url = base_url+ "/admin/users/" + id;
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
                                    .append('<strong class="help-block with-errors">'+value+'</strong>');
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
            url: base_url+ "/admin/users/" + id ,
            data: {
                '_method' : "DELETE",
                '_token' : csrf_token
            },
            success: function (data) {
                toastr.success(data);
                users_table.draw(false);
            }, error: function (xhr) {
                var res = xhr.responseJSON;
                if (res.message) {
                    alert(res.message);
                }else{
                    alert("Error!!")
                }
            }
        });
    }else{
        return false;
    }
}
