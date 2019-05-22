function deleteContact(id) {
    var csrf_token = $("meta[name='csrf-token']").attr('content');
    if (confirm('Bạn có chắc là muốn xóa?')) {
        $.ajax({
            type: "post",
            url: base_url + "/admin/contacts/"+ id ,
            data: {
                '_method' : "DELETE",
                '_token' : csrf_token
            },
            success: function (data) {
                toastr.success('Xóa thành công');
                contacts_table.draw(false);
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
    }else{
        return false;
    }
}


function showContact(id) {
    $.ajax({
        type: "get",
        url: base_url + "/admin/contacts/" + id,
        dataType: "json",
        success: function (data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Detail');
            $("#email").html(data.email);
            $("#name").html(data.name);
            $("#message").html(data.message);
            $("#dateTime").html(data.created_at);
        }
    });
}
