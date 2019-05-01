function deleteReport(id) {
    var csrf_token = $("meta[name='csrf-token']").attr('content');
    if (confirm('Bạn có chắc là muốn xóa?')) {
        $.ajax({
            type: "post",
            url: base_url + "/admin/reports/"+ id ,
            data: {
                '_method' : "DELETE",
                '_token' : csrf_token
            },
            success: function (data) {
                toastr.success('Xóa thành công');
                reports_table.draw(false);
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


function showReport(id) {
    $.ajax({
        type: "get",
        url: base_url + "/admin/reports/" + id,
        dataType: "json",
        success: function (data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Detail');
            $("#reason").html(data.reason.toUpperCase());
            $("#email").html(data.email);
            $("#message").html(data.message);
            $("#dateTime").html(data.created_at);
            $("#post").html(data.post.title);
            $("#post").attr('href',data.post.url);
        }
    });
}
